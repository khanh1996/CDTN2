<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name')->nullable()->comment('Tên của bản tin');
            $table->tinyInteger('status')->default(0)->comment('Trạng thái của bản tin');
            $table->longText('content')->nullable()->comment('Nội dung của bài viết');
            /*$table->integer('startday')->default(0);*/
            $table->string('image')->nullable()->comment('ảnh của bài viết');

            $table->integer('users_id')->default(0)->comment('Khóa ngoại của bảng tài khoản');
            $table->softDeletes();
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
        Schema::dropIfExists('new');
    }
}
