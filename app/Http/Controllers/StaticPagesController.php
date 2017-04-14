<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\TotalVote;


class StaticPagesController extends Controller
{
    public function home(Request $request) {
    	$games = Game::paginate(12);
		$top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
		if ($request->ajax()) {
            return view('layouts.allgame', ['games' => $games])->render();  
        }
    return view('home',compact('games','top_vote_games','systems','categories'));
    }
}
