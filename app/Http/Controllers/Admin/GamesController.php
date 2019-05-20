<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\System;
use App\Category;
use File;
use Illuminate\Support\Facades\Input;

class GamesController extends Controller
{
    public function create(){
    	$systems = System::all();
        $categories = Category::all();
    	return view('admin.game.create',compact('systems','categories'));
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
            'japanese_name' => 'required',
    		'description' => 'required',
            'japanese_description' => 'required',
    		'system_id' => 'required',
            'fImages' => 'required',
            'gResource' => 'required'
    		]);
    	$file_image = time() . '-' .$request->file('fImages')->getClientOriginalName();
    	$file_resource = time() . '-' .$request->file('gResource')->getClientOriginalName();
    	$game = new Game();
    	$game->name = $request->name;
        $game->japanese_name = $request->japanese_name;
    	$game->description = $request->description;
        $game->japanese_description = $request->japanese_description;
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
        $systems = System::all();
    	$games = Game::all();
    	return view('admin.game.index',compact('games','systems'));
    }
    public function edit($id){
        $systems = System::all();
        $categories = Category::all();
        $game = Game::find($id);
        return view('admin.game.edit',compact('game','systems','categories'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'japanese_name' => 'required',
            'description' => 'required',
            'japanese_description' => 'required'
            ]);
        $game = Game::find($id);
        $game->name = $request->name;
        $game->japanese_name = $request->japanese_name;
        $game->description = $request->description;
        $game->japanese_description = $request->japanese_description;
        $game->system_id = $request->system_id;
        if (Input::hasFile('fImages')) {
            $file_image = time() . '-' .$request->file('fImages')->getClientOriginalName();
            $game->image = $file_image;
            $request->file('fImages')->move('resource/upload/game_image/',$file_image);
        }
        if (Input::hasFile('gResource')){
            $file_resource = time() . '-' .$request->file('gResource')->getClientOriginalName();
            $game->resource = $file_resource;
            $request->file('gResource')->move('roms/',$file_resource);
        }
        $game->save();
        $game->categories()->detach();
        $game->categories()->attach($request->categories);
        return redirect()->route('admin.game.index')->with('flash_message','Edit Successfully');

    }
    public function destroy($id){
        $game = Game::find($id);
        File::delete('resource/upload/game_image/'.$game->image);
        File::delete('roms/'.$game->resource);
        $game->categories()->detach();
        $game->delete();
        return redirect()->route('admin.game.index')->with('flash_message','Game have been deleted');
    }
}
