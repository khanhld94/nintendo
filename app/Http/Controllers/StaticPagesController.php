<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;


class StaticPagesController extends Controller
{
    public function home() {
    	$games = Game::paginate(18);
		$top_games = Game::limit(7)->get();
	    return view('home',compact('games','top_games','systems','categories'));
    }
}
