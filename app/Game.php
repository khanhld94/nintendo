<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = true;

    public function categories(){
    	return $this->belongsToMany('\App\Category');
    }
}
