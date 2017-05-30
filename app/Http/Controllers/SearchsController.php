<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class SearchsController extends Controller
{
    public function search (Request $request){
    	$keyword = $request->search;
    	$top_games = \App\Game::limit(7)->get();
    	if ($keyword == null) {
    		$search_results = null; 
    	}
    	else {
    		$search_results = Game::where('name', 'LIKE', '%'.$keyword.'%')
                               ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')->get();
    	}
    	return view('searchs.search',compact('search_results','top_games'));
}
    public function show () {
        $search_results = Game::paginate(8);
        $top_games = \App\Game::limit(7)->get();
        return view('searchs.search',compact('search_results','top_games'));
    }
}