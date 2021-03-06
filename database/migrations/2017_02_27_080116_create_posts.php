<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->string('front_cover', 100)->default('');
            $table->string('desc', 1000);
            $table->text('content');
            $table->unsignedTinyInteger('is_show')->comment('是否显示，1=是 0=否');
            $table->unsignedInteger('click_num')->comment('点击数')->default(0);
            $table->unsignedInteger('like_num')->comment('点赞数')->default(0);
            $table->unsignedInteger('comment_num')->comment('评论数')->default(0);
            $table->unsignedInteger('collect_num')->comment('收藏数')->default(0);
            $table->unsignedInteger('share_num')->comment('分享数')->default(0);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
