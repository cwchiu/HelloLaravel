<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // 標題
            $table->unsignedInteger('type')->nullable(); // fk, 文章類型
            $table->text('content')->nullable(); // 內容
            $table->unsignedInteger('user_id'); // fk, 所屬用戶編號
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('user_id');
            $table->string('content');
            $table->timestamps();
        });

        Schema::create('blog_post_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 名稱
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_types');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('blog_posts');
    }
}
