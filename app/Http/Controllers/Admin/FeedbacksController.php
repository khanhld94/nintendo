<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;
use App\Game;

class FeedbacksController extends Controller
{
    public function index(){
    	$feedbacks = Feedback::all();
    	return view('admin.feedbacks.index', compact('feedbacks'));
    }
}
