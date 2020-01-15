<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_title')->comment('网站标题');
            $table->string('keywords')->comment('关键字');
            $table->string('bg_img')->comment('背景图');
            $table->string('title')->comment('文章标题');
            $table->string('trip')->comment('出行时长');
            $table->string('method')->comment('最佳月份');
            $table->string('cost')->comment('费用');
            $table->string('type')->comment('类型');
            $table->string('content')->comment('内容');
            $table->string('tag')->comment('标签');
            $table->string('read_count')->default(10)->comment('阅读量');
            $table->string('uid')->comment('客服id');
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
        Schema::dropIfExists('articles');
    }
}
