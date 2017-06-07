<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('admin.user.index',compact('users'));
    }
    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete($id);
    	return redirect()->route('admin.user.index')->with('flash_message','User Have Been Deleted');
    }
}
