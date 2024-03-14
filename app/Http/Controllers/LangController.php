<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    // public function setLocale($locale, $path)
    // {
    //     // $SessionLocale = Session::get('locale');
    //     session("locale", $locale);
    //     // app()->setLocale($locale);
    //     if ($locale === "fr") {
    //         return redirect($path);
    //     } else {
    //         return redirect()->to($locale . "/" . $path);
    //     }
    //     // $currentLocale = app()->getLocale();

    //     // if ($currentLocale === 'en') {
    //     //     return view('en.about');
    //     // } else {
    //     //     return view('fr.about');
    //     // }
    // }
    public function setLocale($locale)
    {
        // session(["locale" => $locale]);
        if ($locale === "fr") {
            return redirect()->route("home");
        } else {
            $route = $locale . ".home";
            return redirect()->route($route);
        }
    }
}
