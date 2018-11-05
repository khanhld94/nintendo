<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function index() {
    	$categories = Category::all();
    	return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request) {
    	$category = new Category();

    	$category->name = $request->name;
    	$category->save();

    	return redirect()->route('admin.category.index')->with('flash_message','Category created succesful');
    }
}
