<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name')->nullable()->comment('Tên đề tài');
            $table->longText('content')->nullable()->comment('Nội dung đề tài');
            $table->integer('starttime')->default(0)->comment('Thời gian bắt đầu cho đăng kí');
            $table->integer('endtime')->default(0)->comment('Thời gian kết thúc đăng kí đề tài');
            $table->integer('quantily')->default(0)->comment('Quản lý số lượng người trong đề tài');
            $table->tinyInteger('status')->default(0)->comment('Trạng thái đề tài');

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
        Schema::dropIfExists('researchs');
    }
}
