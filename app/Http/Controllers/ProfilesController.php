<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ProfilesController extends Controller
{	
	public function show($id){
       $user = User::find($id);
       return view('users.show',compact('user'));

	}
	public function edit($id){
		$user = User::find($id);
		return view('users.edit',compact('user'));
	}
    public function update(Request $request, $id){
    	$user = User::find($id);
    	$user->name = $request->name;
    	$avatar = $user->id . '-' . $request->file('avatar')->getClientOriginalName();
    	$user->avatar = $avatar;
    	$request->file('avatar')->move('resource/upload/user_avatar/',$avatar);
    	$user->save();
    	return redirect()->route('users.show',$user->id);
    }
}
