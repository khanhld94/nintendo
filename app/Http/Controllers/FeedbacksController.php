<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Auth;

class FeedbacksController extends Controller
{
    public function feedback(Request $request, $id)
    {
    	$feedback = new Feedback();
    	$feedback->user_id = Auth::user()->id;
    	$feedback->game_id = $request->game_id;
    	$feedback->content = $request->content;
    	$feedback->save();
    	return $feedback;
    }
}
