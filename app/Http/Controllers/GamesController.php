<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Game;
use \App\Comment;
use Auth;

class GamesController extends Controller
{	
    public function show(Request $request, $id){
    	$game = Game::find($id);
        $comments = $game->comments()->orderBy('created_at', 'desc')
                ->paginate(5);
        if ($request->ajax()) {
            return view('layouts.comment', ['game' => $game ,'comments' => $comments])->render();  
        }
    	$games = Game::all();
    	$top_games = \App\Game::limit(7)->get();
    	return view('games.show',compact('game','top_games','games','comments'));
    }

    public function comment(Request $request, $id){
    	$game = Game::find($id);
    	$comment = new Comment();
    	$comment->user_id = Auth::user()->id;
    	$comment->game_id = $request->game_id;
    	$comment->body = $request->body;
    	$comment->save();
        return $comment;
    }

    public function delete_comment(Request $request, $id, $comment_id) {
        $game = Game::find($id);
        $comment = Comment::find($comment_id);
        if (Auth::user()->id != $comment->user->id )
        {
            return redirect()->route('home')->with('flash_message','You dont have permission');
        }else {
            $comment->delete();
            return redirect()->route('games.show',$game->id);
        }
    }
}
