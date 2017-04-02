<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use App\Game;

class SystemsController extends Controller
{
    public function show ($id) {
    	$system = System::find($id);
    	$games = $system->games()->paginate(12);
    	$top_games = Game::limit(7)->get();
    	return view('systems.show',compact('system','top_games','games'));
    }
}
