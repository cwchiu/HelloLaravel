<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCreatePostTable extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function(Blueprint $table){
            $table->increments('id'); // pk
            $table->string('title'); // 標題
            $table->unsignedInteger('type')->nullable(); // fk, 文章類型
            $table->text('content')->nullable(); // 內容0
            $table->unsignedInteger('user_id'); // fk, 所屬用戶編號
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('blog_posts');
    }
}
