<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Game;

class GamesController extends Controller
{
    public function show($id){
    	$game = Game::find($id);
    	$games = Game::all();
    	$top_games = \App\Game::limit(7)->get();
    	return view('games.show',compact('game','top_games','games'));
    }

    public function comment($id){
    	$game = Game::find($id);
    }
}
