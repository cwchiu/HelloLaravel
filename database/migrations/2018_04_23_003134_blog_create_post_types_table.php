<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCreatePostTypesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_post_types', function(Blueprint $table){
            $table->increments('id'); // pk
            $table->string('name'); // ¦WºÙ
        });
    }

    public function down()
    {
        Schema::drop('blog_post_types');
    }
}
