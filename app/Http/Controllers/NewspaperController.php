<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newspapers = Newspaper::orderBy("newspaper_date", "DESC")->paginate(4);
        $latest_newspapers = Newspaper::orderBy("newspaper_date", "DESC")->limit(5)->get();
        $locale = app()->getLocale();
        if ($locale === "fr") {
            return view("newspapers", compact("newspapers", "latest_newspapers"));
        } else {
            $view = $locale . ".newspapers";
            return view($view, compact("newspapers", "latest_newspapers"));
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
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function show(Newspaper $newspaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Newspaper $newspaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newspaper $newspaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newspaper  $newspaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newspaper $newspaper)
    {
        //
    }
}
