<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Game extends Model
{
    public $timestamps = true;

    public function categories(){
    	return $this->belongsToMany('\App\Category');
    }

    public function system(){
    	return $this->belongsTo('\App\System');
    }
    public function comments(){
    	return $this->hasMany('\App\Comment');
    }
    public function votes(){
        return $this->hasMany('\App\Vote','item_id');
    }
    public function total_vote(){
        return $this->hasOne('\App\TotalVote','item_id');
    }
    public function feedback(){
        return $this->hasMany('\App\Feedback');
    }
}
