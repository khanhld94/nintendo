<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;


class static_pages_controller extends Controller
{
    public function home() {
    	$games = Game::all();
		$top_games = Game::limit(7)->get();
	    return view('home',compact('games','top_games','systems','categories'));
    }
}
