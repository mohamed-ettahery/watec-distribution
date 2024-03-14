<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     $term = $request->input('term');

    //     $categories = Category::where('name', 'like', "%$term%")
    //     ->orWhere('en_name', 'like', "%$term%")
    //         ->get();

    //     $categoryIds = $categories->pluck('id')->toArray();

    //     // Get all the child categories of the matching categories
    //     foreach ($categories as $category) {
    //         $categoryIds = array_merge($categoryIds, $this->getChildCategoryIds($category));
    //     }

    //     $products = Product::where([
    //     ['name', 'like', "%$term%"],
    //     ['status', '=', 1]])
    //         ->orWhere('en_name', 'like', "%$term%")
    //         ->orWhereIn('category_id', $categoryIds)
    //         ->orWhereHas('mark', function ($query) use ($term) {
    //             $query->where('name', 'like', "%$term%");
    //         })
    //         ->paginate(10)
    //         ->appends(['term' => $term]);

    //     $productCount = $products->total();

    //     $locale = app()->getLocale();
    //     if ($locale === "fr") {
    //         return view('search', compact('products', 'term', 'productCount'));
    //     } else {
    //         $view = $locale . ".search";
    //         return view($view, compact('products', 'term', 'productCount'));
    //     }
    // }
    public function search(Request $request)
    {
        $term = $request->input('term');

        $categories = Category::where('name', 'like', "%$term%")
            ->orWhere('en_name', 'like', "%$term%")
            ->get();

        $categoryIds = $categories->pluck('id')->toArray();

        // Get all the child categories of the matching categories
        foreach ($categories as $category) {
            $categoryIds = array_merge($categoryIds, $this->getChildCategoryIds($category));
        }

        $products = Product::where(function ($query) use ($term, $categoryIds) {
            $query->where([
                ['name', 'like', "%$term%"],
                ['status', '=', 1]
            ]);
        })
            ->orWhere(function ($query) use ($term) {
                $query->where('en_name', 'like', "%$term%");
            })
            ->orWhereIn('category_id', $categoryIds)
            ->orWhereHas('mark', function ($query) use ($term) {
                $query->where('name', 'like', "%$term%");
            })
            ->get();

        $filteredProducts = $products->where('status', '=', 1);

        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $filteredProducts->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage(), 10),
            $filteredProducts->count(),
            10,
            \Illuminate\Pagination\Paginator::resolveCurrentPage()
        );

        $products->withPath(route('search', ['term' => $term]));

        $productCount = $products->total();

        $locale = app()->getLocale();
        if ($locale === "fr") {
            return view('search', compact('products', 'term', 'productCount'));
        } else {
            $view = $locale . ".search";
            return view($view, compact('products', 'term', 'productCount'));
        }
    }

    private function getChildCategoryIds($category, $ids = [])
    {
        $ids[] = $category->id;

        foreach ($category->children as $child) {
            $ids = $this->getChildCategoryIds($child, $ids);
        }

        return $ids;
    }
}
