<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Webpatser\Uuid\Uuid;

class HttpBinController extends Controller
{
    public function index()
    {
        return view('httpbin.index');
    }

    public function ip(Request $req)
    {

        return ['origin' => $req->ip()];
    }

    public function uuid()
    {
        return ['uuid' => (string) Uuid::generate()];
    }

    public function useragent(Request $req)
    {
        return ['user-agent' => $req->header('user-agent')];
    }

    public function headers(Request $req)
    {
        $headers = [];
        foreach ($req->header() as $k => $v) {
            $headers[$k] = $v[0];
        }
        return ['headers' => $headers];
    }

    public function get(Request $req)
    {
        return $this->headers($req) + $this->ip($req) + [
            'args' => $req->query(),
            'url' => $req->url(),
        ];
    }

    public function anything(Request $req)
    {

        return $this->post($req) + [
            'method' => $req->method(),
        ];
    }

    public function post(Request $req)
    {

        return $this->get($req) + [
            'data' => [],
            'files' => $req->allFiles(),
            'form' => $req->input(),
            'json' => $req->json(),
        ];
    }

    public function status()
    {
        return response()->make('418', 418);
    }

    public function xml()
    {
        return response()->file(storage_path() . '/test.xml', [
            'Content-Type' => 'text/xml',
        ]);
    }

    public function redirectToUrl(Request $req)
    {
        $url = $req->input('url');
        $status_code = (int) $req->input('status_code');
        if ($status_code == 0) {
            $status_code = 302;
        }
        return response()->redirectTo($url, $status_code);
    }

    public function responseHeader(Request $req)
    {
        $ret = [
            'Content-Type' => "application/json",
        ];

        foreach ($req->input() as $key => $v) {
            if (array_key_exists($key, $ret)) {
                if (!is_array($ret[$key])) {
                    $ret[$key] = [$ret[$key]];
                }
                $ret[$key][] = $v;
            } else {
                $ret[$key] = $v;
            }
        }
        return response()->json($ret, 200, $req->input());
    }

    public function imageWebp()
    {
        return response()
            ->file(public_path() . '/images/image.webp', ['Content-Type' => 'image/webp']);
    }

    public function imageJpeg()
    {
        return response()
            ->file(public_path() . '/images/jpeg.jpg', ['Content-Type' => 'image/jpeg']);
    }

    public function imagePng()
    {
        return response()
            ->file(public_path() . '/images/png.png', ['Content-Type' => 'image/png']);
    }

    public function imageSvg()
    {
        return response()
            ->file(public_path() . '/images/test.svg', ['Content-Type' => 'image/svg+xml']);
    }

    public function html()
    {
        return view('httpbin.html');
    }

    public function robots()
    {
        return response()->file(public_path() . '/robots.txt', ['Content-Type' => 'text/plain']);
    }

    public function showPostForm()
    {
        return view('httpbin.post');
    }

    public function gzip(Request $req)
    {

        $d = json_encode($this->headers($req) + $this->ip($req) + [
            'gzipped' => true,
            'method' => $req->method(),
        ]);
        $d = gzencode($d, 5);
        return response()->make($d, 200, [
            'Content-Type' => 'application/json',
            'Content-Encoding' => 'gzip',
            'Content-Length' => strlen($d),
        ]);
    }

    public function brotli(Request $req)
    {
        // TODO
        return $this->headers($req) + $this->ip($req) + [
            'brotli' => false,
            'method' => $req->method(),
        ];
    }

    public function deflate(Request $req)
    {
        $d = json_encode($this->headers($req) + $this->ip($req) + [
            'deflated' => true,
            'method' => $req->method(),
        ]);
        $d = gzdeflate($d, 5);
        return response()->make($d, 200, [
            'Content-Type' => 'application/json',
            'Content-Encoding' => 'deflate',
            'Content-Length' => strlen($d),
        ]);
    }

    public function base64Decode($value)
    {
        return base64_decode($value);
    }

    public function utf8()
    {
        return view('httpbin.utf8');
    }

    // 刪除 Cookie
    public function cookiesDelete(Request $req)
    {
        $resp = response()->redirectTo('httpbin/cookies');
        foreach ($req->all() as $k => $v) {
            $resp->withCookie(Cookie::forget($k));
        }
        return $resp;
    }

    // 設定 Cookie
    public function cookiesSet(Request $req)
    {
        $resp = response()->redirectTo('httpbin/cookies');
        // $resp = response('hello Response Object', 200);
        foreach ($req->all() as $k => $v) {
            $resp->withCookie(Cookie::make($k, $v));
            // $resp->cookie(Cookie::make($k, $v));
        }
        // $resp->header('Content-Type', 'text/plain');
        // return $resp;
        return $resp;
    }

    // 取得 Client Cookie
    public function cookies(Request $req)
    {
        return response()
            ->json([
                'cookies' => Cookie::get(),
            ]);
    }

}