<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $timestamp = true;

    public function game(){
        return $this->belongsTo('\App\Game');
    }
    public function user(){
        return $this->belongsTo('\App\User');
    }
}
