<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='content-type' value='text/html;charset=utf8'>
  <meta name='generator' value='Ronn/v0.7.3 (http://github.com/rtomayko/ronn/tree/0.7.3)'>
  <title>httpbin(1): HTTP Client Testing Service</title>
  <style type='text/css' media='all'>
  /* style: man */
  body#manpage {margin:0}
  .mp {max-width:100ex;padding:0 9ex 1ex 4ex}
  .mp p,.mp pre,.mp ul,.mp ol,.mp dl {margin:0 0 20px 0}
  .mp h2 {margin:10px 0 0 0}
  .mp > p,.mp > pre,.mp > ul,.mp > ol,.mp > dl {margin-left:8ex}
  .mp h3 {margin:0 0 0 4ex}
  .mp dt {margin:0;clear:left}
  .mp dt.flush {float:left;width:8ex}
  .mp dd {margin:0 0 0 9ex}
  .mp h1,.mp h2,.mp h3,.mp h4 {clear:left}
  .mp pre {margin-bottom:20px}
  .mp pre+h2,.mp pre+h3 {margin-top:22px}
  .mp h2+pre,.mp h3+pre {margin-top:5px}
  .mp img {display:block;margin:auto}
  .mp h1.man-title {display:none}
  .mp,.mp code,.mp pre,.mp tt,.mp kbd,.mp samp,.mp h3,.mp h4 {font-family:monospace;font-size:14px;line-height:1.42857142857143}
  .mp h2 {font-size:16px;line-height:1.25}
  .mp h1 {font-size:20px;line-height:2}
  .mp {text-align:justify;background:#fff}
  .mp,.mp code,.mp pre,.mp pre code,.mp tt,.mp kbd,.mp samp {color:#131211}
  .mp h1,.mp h2,.mp h3,.mp h4 {color:#030201}
  .mp u {text-decoration:underline}
  .mp code,.mp strong,.mp b {font-weight:bold;color:#131211}
  .mp em,.mp var {font-style:italic;color:#232221;text-decoration:none}
  .mp a,.mp a:link,.mp a:hover,.mp a code,.mp a pre,.mp a tt,.mp a kbd,.mp a samp {color:#0000ff}
  .mp b.man-ref {font-weight:normal;color:#434241}
  .mp pre {padding:0 4ex}
  .mp pre code {font-weight:normal;color:#434241}
  .mp h2+pre,h3+pre {padding-left:0}
  ol.man-decor,ol.man-decor li {margin:3px 0 10px 0;padding:0;float:left;width:33%;list-style-type:none;text-transform:uppercase;color:#999;letter-spacing:1px}
  ol.man-decor {width:100%}
  ol.man-decor li.tl {text-align:left}
  ol.man-decor li.tc {text-align:center;letter-spacing:4px}
  ol.man-decor li.tr {text-align:right;float:right}
  </style>
  <style type='text/css' media='all'>
  /* style: 80c */
  .mp {max-width:86ex}
  ul {list-style: None; margin-left: 1em!important}
  .man-navigation {left:101ex}
  </style>
</head>

<body id='manpage'>
<a href="http://github.com/kennethreitz/httpbin"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>



<div class='mp'>
<h1>httpbin(1): HTTP Request &amp; Response Service</h1>
<p>Freely hosted in <a href="http://httpbin.org">HTTP</a>, <a href="https://httpbin.org">HTTPS</a>, &amp; <a href="http://eu.httpbin.org/">EU</a> flavors by <a href="http://kennethreitz.org/bitcoin">Kenneth Reitz</a> &amp; <a href="https://www.runscope.com/">Runscope</a>.</p>

<h2 id="BONUSPOINTS">BONUSPOINTS</h2>

<ul>
<li><a href="https://now.httpbin.org/" data-bare-link="true"><code>now.httpbin.org</code></a> The current time, in a variety of formats.</li>
</ul>

<h2 id="ENDPOINTS">ENDPOINTS</h2>

<ul>
<li><a href="/api/httpbin/" data-bare-link="true"><code>/</code></a> This page.</li>
<li><a href="/api/httpbin/ip" data-bare-link="true"><code>/ip</code></a> Returns Origin IP.</li>
<li><a href="/api/httpbin/uuid" data-bare-link="true"><code>/uuid</code></a> Returns UUID4.</li>
<li><a href="/api/httpbin/user-agent" data-bare-link="true"><code>/user-agent</code></a> Returns user-agent.</li>
<li><a href="/api/httpbin/headers" data-bare-link="true"><code>/headers</code></a> Returns header dict.</li>
<li><a href="/api/httpbin/get" data-bare-link="true"><code>/get</code></a> Returns GET data.</li>
<li><code>/post</code> Returns POST data.</li>
<li><code>/patch</code> Returns PATCH data.</li>
<li><code>/put</code> Returns PUT data.</li>
<li><code>/delete</code> Returns DELETE data</li>
<li><a href="/api/httpbin/anything" data-bare-link="true"><code>/anything</code></a> Returns request data, including method used.</li>
<li><code>/anything/:anything</code> Returns request data, including the URL.</li>
<li><a href="/api/httpbin/base64/aGVsbG8gd29ybGQNCg%3D%3D"><code>/base64/:value</code></a> Decodes base64url-encoded string.</li>
<li><a href="/api/httpbin/encoding/utf8"><code>/encoding/utf8</code></a> Returns page containing UTF-8 data.</li>
<li><a href="/api/httpbin/gzip" data-bare-link="true"><code>/gzip</code></a> Returns gzip-encoded data.</li>
<li><a href="/api/httpbin/deflate" data-bare-link="true"><code>/deflate</code></a> Returns deflate-encoded data.</li>
<li><a href="/api/httpbin/brotli" data-bare-link="true"><code>/brotli</code></a> Returns brotli-encoded data.</li>
<li><a href="/api/httpbin/status/418"><code>/status/:code</code></a> Returns given HTTP Status code.</li>
<li><a href="/api/httpbin/response-headers?Server=httpbin&amp;Content-Type=text%2Fplain%3B+charset%3DUTF-8"><code>/response-headers?key=val</code></a> Returns given response headers.</li>
<li><a href="/api/httpbin/redirect/6"><code>/redirect/:n</code></a> 302 Redirects <em>n</em> times.</li>
<li><a href="/api/httpbin/redirect-to?url=http%3A%2F%2Fexample.com%2F"><code>/redirect-to?url=foo</code></a> 302 Redirects to the <em>foo</em> URL.</li>
<li><a href="/api/httpbin/redirect-to?status_code=307&amp;url=http%3A%2F%2Fexample.com%2F"><code>/redirect-to?url=foo&status_code=307</code></a> 307 Redirects to the <em>foo</em> URL.</li>
<li><a href="/api/httpbin/relative-redirect/6"><code>/relative-redirect/:n</code></a> 302 Relative redirects <em>n</em> times.</li>
<li><a href="/api/httpbin/absolute-redirect/6"><code>/absolute-redirect/:n</code></a> 302 Absolute redirects <em>n</em> times.</li>
<li><a href="/api/httpbin/cookies" data-bare-link="true"><code>/cookies</code></a> Returns cookie data.</li>
<li><a href="/api/httpbin/cookies/set?k1=v1&amp;k2=v2"><code>/cookies/set?name=value</code></a> Sets one or more simple cookies.</li>
<li><a href="/api/httpbin/cookies/delete?k1=&amp;k2="><code>/cookies/delete?name</code></a> Deletes one or more simple cookies.</li>
<li><a href="/api/httpbin/basic-auth/user/passwd"><code>/basic-auth/:user/:passwd</code></a> Challenges HTTPBasic Auth.</li>
<li><a href="/api/httpbin/hidden-basic-auth/user/passwd"><code>/hidden-basic-auth/:user/:passwd</code></a> 404'd BasicAuth.</li>
<li><a href="/api/httpbin/digest-auth/auth/user/passwd/MD5/never"><code>/digest-auth/:qop/:user/:passwd/:algorithm</code></a> Challenges HTTP Digest Auth.</li>
<li><a href="/api/httpbin/digest-auth/auth/user/passwd/MD5/never"><code>/digest-auth/:qop/:user/:passwd</code></a> Challenges HTTP Digest Auth.</li>
<li><a href="/api/httpbin/stream/20"><code>/stream/:n</code></a> Streams <em>min(n, 100)</em> lines.</li>
<li><a href="/api/httpbin/delay/3"><code>/delay/:n</code></a> Delays responding for <em>min(n, 10)</em> seconds.</li>
<li><a href="/api/httpbin/drip?code=200&amp;numbytes=5&amp;duration=5"><code>/drip?numbytes=n&amp;duration=s&amp;delay=s&amp;code=code</code></a> Drips data over a duration after an optional initial delay, then (optionally) returns with the given status code.</li>
<li><a href="/api/httpbin/range/1024"><code>/range/1024?duration=s&amp;chunk_size=code</code></a> Streams <em>n</em> bytes, and allows specifying a <em>Range</em> header to select a subset of the data. Accepts a <em>chunk_size</em> and request <em>duration</em> parameter.</li>
<li><a href="/api/httpbin/html" data-bare-link="true"><code>/html</code></a> Renders an HTML Page.</li>
<li><a href="/api/httpbin/robots.txt" data-bare-link="true"><code>/robots.txt</code></a> Returns some robots.txt rules.</li>
<li><a href="/api/httpbin/deny" data-bare-link="true"><code>/deny</code></a> Denied by robots.txt file.</li>
<li><a href="/api/httpbin/cache" data-bare-link="true"><code>/cache</code></a> Returns 200 unless an If-Modified-Since or If-None-Match header is provided, when it returns a 304.</li>
<li><a href="/api/httpbin/etag/etag"><code>/etag/:etag</code></a> Assumes the resource has the given etag and responds to If-None-Match header with a 200 or 304 and If-Match with a 200 or 412 as appropriate.</li>
<li><a href="/api/httpbin/cache/60"><code>/cache/:n</code></a> Sets a Cache-Control header for <em>n</em> seconds.</li>
<li><a href="/api/httpbin/bytes/1024"><code>/bytes/:n</code></a> Generates <em>n</em> random bytes of binary data, accepts optional <em>seed</em> integer parameter.</li>
<li><a href="/api/httpbin/stream-bytes/1024"><code>/stream-bytes/:n</code></a> Streams <em>n</em> random bytes of binary data in chunked encoding, accepts optional <em>seed</em> and <em>chunk_size</em> integer parameters.</li>
<li><a href="/api/httpbin/links/10"><code>/links/:n</code></a> Returns page containing <em>n</em> HTML links.</li>
<li><a href="/api/httpbin/image"><code>/image</code></a> Returns page containing an image based on sent Accept header.</li>
<li><a href="/api/httpbin/image/png"><code>/image/png</code></a> Returns a PNG image.</li>
<li><a href="/api/httpbin/image/jpeg"><code>/image/jpeg</code></a> Returns a JPEG image.</li>
<li><a href="/api/httpbin/image/webp"><code>/image/webp</code></a> Returns a WEBP image.</li>
<li><a href="/api/httpbin/image/svg"><code>/image/svg</code></a> Returns a SVG image.</li>
<li><a href="/api/httpbin/forms/post" data-bare-link="true"><code>/forms/post</code></a> HTML form that submits to <em>/post</em></li>
<li><a href="/api/httpbin/xml" data-bare-link="true"><code>/xml</code></a> Returns some XML</li>
</ul>

<h2 id="DESCRIPTION">DESCRIPTION</h2>

<p>Testing an HTTP Library can become difficult sometimes. <a href="http://requestb.in">RequestBin</a> is fantastic for testing POST requests, but doesn't let you control the response. This exists to cover all kinds of HTTP scenarios. Additional endpoints are being considered.</p>

<p>All endpoint responses are JSON-encoded.</p>

<h2 id="EXAMPLES">EXAMPLES</h2>

<h3 id="-curl-http-httpbin-org-ip">$ curl http://httpbin.org/ip</h3>

<pre><code>{"origin": "24.127.96.129"}
</code></pre>

<h3 id="-curl-http-httpbin-org-user-agent">$ curl http://httpbin.org/user-agent</h3>

<pre><code>{"user-agent": "curl/7.19.7 (universal-apple-darwin10.0) libcurl/7.19.7 OpenSSL/0.9.8l zlib/1.2.3"}
</code></pre>

<h3 id="-curl-http-httpbin-org-get">$ curl http://httpbin.org/get</h3>

<pre><code>{
   "args": {},
   "headers": {
      "Accept": "*/*",
      "Connection": "close",
      "Content-Length": "",
      "Content-Type": "",
      "Host": "httpbin.org",
      "User-Agent": "curl/7.19.7 (universal-apple-darwin10.0) libcurl/7.19.7 OpenSSL/0.9.8l zlib/1.2.3"
   },
   "origin": "24.127.96.129",
   "url": "http://httpbin.org/get"
}
</code></pre>

<h3 id="-curl-I-http-httpbin-org-status-418">$ curl -I http://httpbin.org/status/418</h3>

<pre><code>HTTP/1.1 418 I'M A TEAPOT
Server: nginx/0.7.67
Date: Mon, 13 Jun 2011 04:25:38 GMT
Connection: close
x-more-info: http://tools.ietf.org/html/rfc2324
Content-Length: 135
</code></pre>

<h3 id="-curl-https-httpbin-org-get-show_env-1">$ curl https://httpbin.org/get?show_env=1</h3>

<pre><code>{
  "headers": {
    "Content-Length": "",
    "Accept-Language": "en-US,en;q=0.8",
    "Accept-Encoding": "gzip,deflate,sdch",
    "X-Forwarded-Port": "443",
    "X-Forwarded-For": "109.60.101.240",
    "Host": "httpbin.org",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "User-Agent": "Mozilla/5.0 (X11; Linux i686) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.83 Safari/535.11",
    "X-Request-Start": "1350053933441",
    "Accept-Charset": "ISO-8859-1,utf-8;q=0.7,*;q=0.3",
    "Connection": "keep-alive",
    "X-Forwarded-Proto": "https",
    "Cookie": "_gauges_unique_day=1; _gauges_unique_month=1; _gauges_unique_year=1; _gauges_unique=1; _gauges_unique_hour=1",
    "Content-Type": ""
  },
  "args": {
    "show_env": "1"
  },
  "origin": "109.60.101.240",
  "url": "http://httpbin.org/get?show_env=1"
}
</code></pre>

<h2 id="Installing-and-running-from-PyPI">Installing and running from PyPI</h2>

<p>You can install httpbin as a library from PyPI and run it as a WSGI app.  For example, using Gunicorn:</p>

<pre><code class="bash">$ pip install httpbin
$ gunicorn httpbin:app
</code></pre>


<h2 id="AUTHOR">AUTHOR</h2>

<p>A <a href="http://kennethreitz.com/">Kenneth Reitz</a> project.</p>
<p>BTC: <a href="https://www.kennethreitz.org/bitcoin"><code>1Me2iXTJ91FYZhrGvaGaRDCBtnZ4KdxCug</code></a></p>

<h2 id="SEE-ALSO">SEE ALSO</h2>

<p><a href="https://www.hurl.it">Hurl.it</a> - Make HTTP requests.</p>
<p><a href="http://requestb.in">RequestBin</a> - Inspect HTTP requests.</p>
<p><a href="http://python-requests.org" data-bare-link="true">http://python-requests.org</a></p>

</div>


    
<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    _pa.productId = "httpbin";
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/5226171f87bc6890da0000a0.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>

<script type="text/javascript">
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.type  = 'text/javascript';
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '58cb2e71c88d9043ac01d000');
    t.setAttribute('data-track-path', 'https://track.gaug.es/track.gif');
    t.src = 'https://d36ee2fcip1434.cloudfront.net/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>


</body>
</html>