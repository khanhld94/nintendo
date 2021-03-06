<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\System;
use App\User;
use App\Feedback;

class HomeController extends Controller
{
    public function home(){
    	$game_count = Game::all()->count();
    	$system_count = System::all()->count();
    	$user_count = User::all()->count();
    	$feedback_count = Feedback::all()->count();
    	return view('admin.home',compact('game_count','system_count','user_count','feedback_count'));
    }
}
