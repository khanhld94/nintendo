<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System;
use File;

class SystemsController extends Controller
{
    public function create() {
    	return view('admin.system.add');
    }
    public function store(Request $request) {

    	$this->validate($request,[
    		'name' => 'required',
    		'description' => 'required|min:6'
    	]);
    	$file_name = $request->file('fImages')->getClientOriginalName();
    	$system = new System();
    	$system->name = $request->name;
        $system->fullname = $request->fullname;
    	$system->description = $request->description;
    	$system->image = $file_name;
    	$request->file('fImages')->move('resource/upload/system_image/',$file_name);
    	$system->save();
    	return redirect()->route('admin.system.index')->with('flash_message','Created Successfully');


    }
    public function index() {
    	$systems = System::all();
    	return view('admin.system.list',compact('systems'));
    }
    public function edit() {
    	return view('admin.system.edit');
    }
    public function destroy($id) {
    	$system = System::find($id);
    	File::delete('resource/upload/system_image/'.$system->image);
    	$system->delete($id);
    	return redirect()->route('admin.system.index')->with('flash_message','System Have Been Deleted');
    }
}
