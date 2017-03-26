<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Game;

class GamesController extends Controller
{
    public function show($id){
    	$game = Game::find($id);
    	return view('games.show',compact('game'));
    }
}
