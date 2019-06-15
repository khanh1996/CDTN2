<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersResearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_researchs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('users_id')->default(0)->comment('Khóa ngoại của bảng tài khoản');
            $table->integer('researchs_id')->default(0)->comment('Khóa ngoại của bảng nghiên cứu');
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
        Schema::dropIfExists('users_researchs');
    }
}
