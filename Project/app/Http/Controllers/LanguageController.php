<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    // protected $lang;

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}

    // public function setLang($lang)
    // {
    //     switch ($lang) {
    //         case 'vi':
    //             // dd('vi');
    //             App::setLocale(session('vi', config('app.vi')));
    //             return redirect()->back();
    //             break;
    //         case 'en':
    //             // dd('en');
    //             App::setLocale(session('en', config('app.en')));
    //             return redirect()->back();
    //             break;
            
    //         default:
    //         // dd('default');
    //         App::setLocale('en');
    //         // return redirect()->back();
    //             break;

    //     }
    // }

