<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\TotalVote;

class CategoriesController extends Controller
{
    public function show (Request $request,$id) {
    	$category = Category::find($id);
    	$games = $category->games()->paginate(12);
    	$top_vote_games = TotalVote::orderBy('total_like', 'esc')->limit(7)->get();
    	if ($request->ajax()) {
            return view('layouts.games', ['games' => $games])->render();  
        }
    	return view('categories.show',compact('category','top_vote_games','games'));
    }
}
