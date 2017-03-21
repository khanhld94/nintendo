<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public $timestamps = true;

    public function games() {
    	return $this->hasMany('\App\Game');
    }
}
