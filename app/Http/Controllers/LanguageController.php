<?php

namespace App\Http\Controllers;
use Cookie;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke($lang){


    	Cookie::queue('locale', $lang, 100);

    	return \Redirect::back();
    }
}
