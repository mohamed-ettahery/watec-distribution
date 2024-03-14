<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $appends = ['getMainCategories', 'getChildsCategories'];
    public function index()
    {
        return view('categories');
    }
    // public function show(Category $category)
    // {
    //     return $category->getCurrentLocale();
    // }
    public function show(Category $category)
    {
        // Retrieve products of the given category with the latest first
        $products = $category->products()->where('status', 1)->orderBy('created_at', 'desc')->get();

        // Retrieve child products of the given category with the latest first
        $childProducts = $category->children()
            ->with(['products' => function ($query) {
                $query->where('status', 1)->orderBy('created_at', 'desc');
            }])
            ->get()
            ->pluck('products')
            ->flatten();

        // Recursively get sub-categories of sub-categories
        $subCategories = collect();
        $getSubCategories = function ($category) use (&$getSubCategories, $subCategories) {
            foreach ($category->children()->orderByRaw("CASE WHEN ordering IS NULL THEN 1 ELSE 0 END, ordering")->get() as $childCategory) {
                $subCategories->push($childCategory);
                $getSubCategories($childCategory);
            }
        };
        $getSubCategories($category);
        $subCategoryProducts = $subCategories->pluck('products')->flatten()->where('status', 1);

        // Merge all products while preserving the latest order
        $allProducts = $products->merge($childProducts)->merge($subCategoryProducts);

        // Paginate the products
        $perPage = 9; // Number of products to show per page
        $currentPage = request()->query('page', 1); // Get the current page from the query string
        $offset = ($currentPage - 1) * $perPage;
        $paginatedProducts = new LengthAwarePaginator(
            $allProducts->slice($offset, $perPage),
            $allProducts->count(),
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


    public static function getMainCategories()
    {
        // $mainCategories = Category::whereNull('parent_id')->OrderByDesc('id')->get();
        // $mainCategories = Category::whereNull('parent_id')->get();
        $mainCategories = Category::whereNull('parent_id')
            ->orderByRaw("CASE WHEN ordering IS NULL THEN 1 ELSE 0 END, ordering")
            ->get();

        return $mainCategories;
    }
    public static function getChildsCategories($parent_id)
    {
        $categories = Category::where('parent_id', $parent_id)->get();
        return $categories;
    }
}
