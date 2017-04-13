<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function likes(){
        return $this->hasMany('\App\Vote', 'id', 'item_id');
    }
}
