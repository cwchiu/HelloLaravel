/* 載入 Elixir */
const elixir = require('laravel-elixir');

/* 載入編譯 vue 2.x 需要的 webpack loader */
require('laravel-elixir-vue-2');

/* 定義編譯流程 */
elixir(mix => {
    mix.sass('app.scss') /* 編譯Sass */
       .webpack('app.js'); /* 編譯js */
       
    mix.webpack('app2.js');
});
