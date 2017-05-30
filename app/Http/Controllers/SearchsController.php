<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\System;
use App\Category;

class SearchsController extends Controller
{
    public function search (Request $request){
    	$keyword = $request->search;
        $systems = System::all();
        $categories = Category::all();
    	$top_games = \App\Game::limit(7)->get();
    	if ($keyword == null) {
    		$search_results = null; 
    	}
    	else {
    		$search_results = Game::where('name', 'LIKE', '%'.$keyword.'%')
                               ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')->paginate(8);
    	}
    	return view('searchs.search',compact('search_results','top_games', 'systems', 'categories'));
}
    public function show () {
        $search_results = Game::paginate(8);
        $systems = System::all();
        $categories = Category::all();
        $top_games = \App\Game::limit(7)->get();
        return view('searchs.search',compact('search_results','top_games', 'systems', 'categories'));
    }
}