<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\System;
use App\Category;
use App\TotalVote;

class SearchsController extends Controller
{
    public function search (Request $request){
    	$keyword = $request->search;
        $systems = System::all();
        $categories = Category::all();
    	$top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
    	if ($keyword == null) {
    		$search_results = null; 
    	}
    	else {
    		$search_results = Game::where('name', 'LIKE', '%'.$keyword.'%')
                               ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')->paginate(8);
    	}
    	return view('searchs.search',compact('search_results','top_vote_games', 'systems', 'categories'));
}
    public function show () {
        $search_results = null;
        $systems = System::all();
        $categories = Category::all();
        $top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
        return view('searchs.search',compact('search_results','top_vote_games', 'systems', 'categories'));
    }

    public function advancedsearchshow() {
        $search_results = null;
        $systems = System::all();
        $categories = Category::all();
        $top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
        return view('searchs.search',compact('search_results','top_vote_games', 'systems', 'categories'));
    }

    public function advancedsearch (Request $request){
        $systems = System::all();
        $categories = Category::all();
        $top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
        $keyword = $request->keyword;
        $category = $request->category;
        $system = $request->system;
        $old_system =$system;
        $old_category = $category;
        if ($keyword == '' && $category == '' && $system == '' ) {
            $search_results = null;
        }
        elseif ($keyword !== '' && $category == '' && $system == '') {
            $search_results = Game::where('name', 'LIKE', '%'.$keyword.'%')
                               ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')->paginate(8);
        }
        elseif ($keyword !== '' && $category !== '' && $system == ''){
            $search_results = Category::find($category)->games()
              ->where('name', 'LIKE', '%'.$keyword.'%')
              ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')
              ->get();
        }
        elseif ($keyword !== '' && $category == '' && $system !== '') {
            $search_results = System::find($system)->games()
              ->where('name', 'LIKE', '%'.$keyword.'%')
              ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')
              ->get();
        }
        elseif ($keyword == '' && $category !== '' && $system !== '') {
            $search_results = System::find($system)->games()->whereHas('categories', function($q) use ($category){
                $q->where('category_id', $category);
            })->get();
        }
        elseif ($keyword == '' && $category !== '' && $system =='') {
            $search_results = Category::find($category)->games()->get();
        }
        elseif ($keyword !== '' && $category !== '' && $system !== '')
        {
            $search_results = System::find($system)->games()
              ->where('name', 'LIKE', '%'.$keyword.'%')
              ->orWhere('japanese_name', 'LIKE', '%'.$keyword.'%')
              ->whereHas('categories', function($q) use ($category){
                $q->where('category_id', $category);
            })->get();
        }
        else {
            $search_results = Game::all();
        }
        return view('searchs.search',compact('search_results','top_vote_games', 'systems', 'categories','keyword','old_system','old_category'));
    }
}