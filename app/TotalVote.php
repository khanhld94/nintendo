<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalVote extends Model
{
    protected $table = 'laravellikecomment_total_likes';

    public function game(){
    	return $this->belongsTo('\App\Game',  'item_id', 'id');
    }
}
