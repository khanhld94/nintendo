<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class LanguageController extends Controller
{
    public function index(){
        Session::put('locale', Input::get('locale'));
    	return redirect()->back();
    }
}
