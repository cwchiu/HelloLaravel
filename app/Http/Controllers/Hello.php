<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Article;
use Carbon\Carbon;
use App;

class Hello extends Controller
{
    public function lang(){
        App::setLocale('zh-tw');
        return view('lang', ['name'=>'Arick']);
    }
    
    public function carbon(){
        Carbon::setLocale('zh-tw');
        $tw_now = Carbon::now();
        $ja_now = Carbon::now('Asia/Tokyo');
        $next_year = Carbon::create($tw_now->year+1, 1, 1, 0);
        $day_str = ['日', '一', '二', '三', '四', '五', '六'];
        $next_year_day = $day_str[$next_year->dayOfWeek ];
        return view('carbon', [
            'tw_now' => $tw_now,
            'ja_now' =>$ja_now,
            'next_year_day' => $next_year_day,
            'next_year' => $next_year
        ]);
    }
    
    public function Index(){
        return redirect('hello/Hello');
    }
    
    public function Welcome(){
        return response()->view('welcome', [], 200);
    }
    
    public function Hello(){
        return 'Hello';
    }
    
    // 直接輸出 Array 返回 json
    public function JsonArray(){
        return [1,2,3, 'arick'];
    }
    
    // 直接返回 Object 輸出 json
    public function JsonObject(){
        return [
            'id' => 1,
            'name' => 'arick',
            'data' => [1,2,3]
        ];
    }
    
    // 明確使用 ->json()
    public function JsonWithResponse(){
        return response()->json([
            'id' => 1,
            'name' => 'arick',
            'data' => [1,2,3]
        ]);
    }
    
    // 檔案下載
    public function FileDownload(){
        return response()->download(__DIR__ . '/Hello.php', 'hello.txt', [
            'Content-Type' => 'text/plain'
        ]);
    }
    
    public function OutputFile(){
        // $url = Storage::url('test.jpg');
        // die($url);
        return response()->file(__DIR__ . '/../../../public/test.jpg', [
            'Content-Type' => 'image/jpeg'
        ]);
    }
    
    public function ResponseObject(){
        return response('hello Response Object', 200)
                ->cookie('level', 9, 99)
                ->cookie('debug', 'aaa', 9)
                ->header('x-Author', 'Chui-Wen Chiu')
                ->header('Content-Type', 'text/plain');
    }
    
    
    // 檔案上傳
    public function showUpload(){
        return view('upload');
    }
    
    public function upload(Request $request){
        // $request->validate([

            // 'uploadFile' => 'required',

        // ]);



        foreach ($request->file('uploadFile') as $key => $value) {

            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();

            $value->move(public_path('images'), $imageName);

        }



        return response()->json(['success'=>'Images Uploaded Successfully.']);
    
    }
    
    public function db(){
        return response()->stream(function(){
            $users = DB::table('user')->get();
            foreach ($users as $user)
            {
                var_dump($user->first_name);
            }
            var_dump( DB::table('user')->where('first_name', 'arick')->first());
            
        }, 200,  ['Content-Type' => 'text/html']);
    }
    
    public function deleteArticle($id) {  
        Article::find($id)->delete();

        return 204;
    }

    public function updateArticle(Request $request, $id){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function createArticle(Request $request){
        return Article::create($request->all());
    }
    
    public function getArticleById($id){
        return Article::find($id);
    }
    
    public function listArticles(){
        return Article::all();
    }
}
