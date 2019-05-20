<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bookmark;

class BookmarksController extends Controller
{
    public function bookmark(Request $request) {
    	$bookmark = Bookmark::where('user_id', Auth::user()->id)
    	                           ->where('game_id', $request->game_id)->get();
    	if ($bookmark->count() == 0) {
    		$new_bookmark = new Bookmark();
	    	$new_bookmark->user_id = Auth::user()->id;
	    	$new_bookmark->game_id = $request->game_id;
	    	$new_bookmark->save();
	    	return $new_bookmark;
    	}
    	else {
    		$bookmark->first()->delete();
    	}
    }
}
