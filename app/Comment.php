<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{	

	public $timestamps = true;
	
    public function game(){
    	return $this->belongsTo('\App\Game');
    }
    public function user(){
    	return $this->belongsTo('\App\User');
    }
}
