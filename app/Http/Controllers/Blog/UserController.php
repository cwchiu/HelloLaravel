<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Auth;
use File;
use Illuminate\Http\Request;
use Redirect;
use View;
use \Carbon\Carbon as Carbon;

class UserController extends Controller
{
    public function getAvatar()
    {
        return View::make('blog.user.avatar');
    }

    public function postAvatar(Request $request)
    {
        if (!$request->hasFile('avatar')) {
            // die('#');
            return Redirect::route('post.index');
        }
        $file = $request->file('avatar');
        // var_dump($file);
        // var_dump($request->all());
        // var_dump($request->file());
        // die('#');
        $destinationPath = 'uploads/avatar';
        if (!file_exists(public_path() . '/' . $destinationPath)) {
            File::makeDirectory(public_path() . '/' . $destinationPath, 0755, true);
        }
        $ext = $file->getClientOriginalExtension();
        $fileName = (Carbon::now()->timestamp) . '.' . $ext;
        $file->move(public_path() . '/' . $destinationPath, $fileName);
        $user = Auth::user();
        $user->avatar = $destinationPath . '/' . $fileName;
        $user->save();
        return Redirect::route('post.index');
    }
}
