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
            $table->string('title'); // ���D
            $table->unsignedInteger('type')->nullable(); // fk, �峹����
            $table->text('content')->nullable(); // ���e0
            $table->unsignedInteger('user_id'); // fk, ���ݥΤ�s��
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('blog_posts');
    }
}
