<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function __invoke($locale)
    {
        Session::put('default_locale', $locale);
        
        return redirect()->back();
    }
}
