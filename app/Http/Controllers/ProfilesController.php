<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Auth;

class ProfilesController extends Controller
{	

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function show(Request $request,$id){
       $user = User::find($id);
       $user_votes = $user->votes()->where('vote',1)->paginate(8);
       $bookmarks = $user->bookmarks()->paginate(8);
       if ($request->ajax()) {
            return view('layouts.profilegamelist', ['user_votes' => $user_votes, 'bookmarks' => 'bookmarks'])->render();  
       }
       return view('users.show',compact('user','user_votes','bookmarks'));

	}
	public function edit($id){
		$user = User::find($id);
        if (Auth::user()->id != $user->id ) {
            return redirect()->route('home')->with('flash_message','You dont have permission');
        }
        else {
		    return view('users.edit',compact('user'));
        }
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
