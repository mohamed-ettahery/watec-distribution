<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
  public function index()
  {
    $categories = Category::with([
      'products' => function ($query) {
        $query->where('status', 1);
      },
      'children.products' => function ($query) {
        $query->where('status', 1);
      },
      'children.children.products' => function ($query) {
        $query->where('status', 1);
      },
    ])->orderByRaw("ISNULL(ordering), ordering")->get();

    $finalProducts = collect();

    foreach ($categories as $category) {
      $products = $category->products;

      $childProducts = $category->children->flatMap(function ($child) {
        return $child->products;
      });

      $allProducts = $products->merge($childProducts);

      $finalProducts = $finalProducts->merge($allProducts);
    }

    $finalProducts = $finalProducts->unique('id')->values(); // Ensure uniqueness

    //   // Paginate the products
    $perPage = 9; // Number of products to show per page
    $currentPage = request()->query('page', 1); // Get the current page from the query string
    $offset = ($currentPage - 1) * $perPage;
    $paginatedProducts = new LengthAwarePaginator(
      $finalProducts->slice($offset, $perPage),
      $finalProducts->count(),
      $perPage,
      $currentPage,
      [
        'path' => url()->current(),
        'query' => request()->query()
      ]
    );

    // Retrieve a random promoted product with promotion set to 1
    $promotedProduct = Product::where('promotion', 1)->inRandomOrder()->first();

    $locale = app()->getLocale();
    if ($locale === "fr") {
      return view('products', ['products' => $paginatedProducts, 'categoryName' => $category->name, 'promotedProduct' => $promotedProduct]);
    } else {
      $view = $locale . ".products";
      $categoryName = $locale . "_name";
      return view($view, ['products' => $paginatedProducts, 'categoryName' => $category->$categoryName, 'promotedProduct' => $promotedProduct]);
    }
  }
}
