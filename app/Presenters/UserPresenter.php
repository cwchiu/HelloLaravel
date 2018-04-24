<?php
namespace App\Presenters;
use App\User;

class UserPresenter {
    public function conv(User $user){
        return "**{$user->name}**";
    }
}