<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use URL;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function favorites(){
        return $this->belongsToMany(Post::class, 'favorites');
    }
    
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
    
    public function isAdmin(){
        return ($this->type == 1);
    }

    public function getAvatarUrl(){
        if(empty($this->avatar)){
            return URL::asset('images/avatar/default.png');
        }else{
            if(!preg_match("/^[a-zA-z]+:\/\//", $this->avatar)){
                return URL::asset($this->avatar);
            }else{
                return $this->avatar;
            }
        }
    }
}
