<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable()->comment( 'Mã giáo viên or Mã Sinh Viên' );
            $table->char('name')->nullable()->comment('Ten Tai Khoan');
            $table->integer('birthday')->default(0);
            $table->string('password')->nullable()->comment('mật khẩu');
            $table->tinyInteger('gender')->default(0)->comment('Giới tính');
            $table->string('image')->nullable()->comment('ảnh của tài khoản');
            $table->string('email')->nullable()->comment('email của tài khoản');
            $table->string('phone')->nullable()->comment('số điện thoại của tài khoản');
            $table->tinyInteger('level')->default(0)->comment('quyền của tài khoản');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
