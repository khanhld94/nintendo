<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use App\Game;

class SystemsController extends Controller
{
    public function show (Request $request,$id) {
    	$system = System::find($id);
    	$games = $system->games()->paginate(12);
    	$top_games = $system->games()->limit(7)->get();
    	if ($request->ajax()) {
            return view('layouts.games', ['games' => $games])->render();  
        }
    	return view('systems.show',compact('system','top_games','games'));
    }
}
