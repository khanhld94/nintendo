<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Bookmark;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments(){
        return $this->hasMany('\App\Comment');
    }

    public function votes(){
        return $this->hasMany('\App\Vote');
    }

    public function bookmarks(){
        return $this->hasMany('\App\Bookmark');
    }
    public function check_bookmarked($game_id){
        $bookmark = Bookmark::where('user_id', $this->id)->where('game_id', $game_id);
        if ($bookmark->count() == 0) {
            return 0;
        }
        else {
            return 1;
        }
    }
}
