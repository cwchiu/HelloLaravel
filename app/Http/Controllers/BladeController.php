<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Exception;

class BladeController extends Controller
{
    public function hello() {
        return view('blade/hello', ['type'=>1, 'data'=> ['one', 'two', 'three']]);
    }
    
    public function inject(){
        $user = User::findOrFail(1);
        return view('blade/inject', ['user'=>$user]);
    }
    
    public function error(){

    }
}
