<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsAccessTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users_details_access', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('user_id')->nullable();
            // $table->integer('company_id')->nullable();
            $table->biginteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->biginteger('assets_id')->unsigned()->nullable();
            // $table->foreign('assets_id')->references('id')->on('assets')->onUpdate('cascade')->onDelete('cascade');
            $table->string('assets_id')->nullable();
            $table->enum('accept_status', ['0', '1', '2'])->default(0)->comment = '0 = pending / 1 = accept_status is true / 2 = accept_status is reject';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_details_access');
    }
}
