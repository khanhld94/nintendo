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
    public function destroy($id) {
        $category = Category::find($id);
        $category->delete($id);
        return redirect()->route('admin.category.index')->with('flash_message','Category Deleted');
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
                'name' => 'required',
                'japanese_name' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->japanese_name = $request->japanese_name;
        $category->save();
        return redirect()->route('admin.category.index')->with('flash_message','Category Edited');
    }
    public function edit($id) {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'japanese_name' => 'required',
    ]);
	$category = new Category();

	$category->name = $request->name;
    $category->japanese_name = $request->japanese_name;
	$category->save();

	return redirect()->route('admin.category.index')->with('flash_message','Category created succesful');
    }
}
