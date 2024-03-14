<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->orWhere('en_slug', $slug)->first();
        if ($product) {
            $locale = app()->getLocale();
            if ($product->status) {
                $images = explode(",", $product->image);
                $similars = Product::where('category_id', $product->category_id)
                    ->inRandomOrder()
                    ->take(12)
                    ->get();

                if ($locale === "fr") {
                    return view('details', compact('product', 'images', 'similars'));
                } else {
                    $view = $locale . ".details";
                    return view($view, compact('product', 'images', 'similars'));
                }
            } else {
                if ($locale === "fr") {
                    return redirect()->route("category.show", $product->category->slug);
                } else {
                    return redirect()->route("en.category.show", $product->category->en_slug);
                }
            }
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
