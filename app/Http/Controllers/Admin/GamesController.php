<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\System;
use App\Category;

class GamesController extends Controller
{
    public function create(){
    	$systems = System::all();
        $categories = Category::all();
    	return view('admin.game.add',compact('systems','categories'));
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'description' => 'required',
    		'system_id' => 'required'
    		]);
    	$file_image = $request->file('fImages')->getClientOriginalName();
    	$file_resource = $request->file('gResource')->getClientOriginalName();
    	$game = new Game();
    	$game->name = $request->name;
    	$game->content = $request->content;
    	$game->description = $request->description;
    	$game->system_id = $request->system_id;
    	$game->image = $file_image;
    	$request->file('fImages')->move('resource/upload/game_image/',$file_image);
    	$game->resource = $file_resource;
    	$request->file('gResource')->move('roms/',$file_resource);
        $game->save();
        $game->categories()->attach($request->categories);
    	return redirect()->route('admin.game.index')->with('flash_message','Create Successfully');

    }
    public function index(){
    	$games = Game::all();
    	return view('admin.game.list',compact('games'));
    }
    public function edit($id){
        $systems = System::all();
        $game = Game::find($id);
        return view('admin.game.edit',compact('game','systems'));
    }
    public function update(){

    }
    public function destroy(){

    }
}
