<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	protected $table = 'laravellikecomment_likes';

	public function user(){
        return $this->belongsTo('App\User',  'user_id', 'id');
    }
    public function game(){
    	return $this->belongsTo('App\Game',  'item_id', 'id');
    }
}
