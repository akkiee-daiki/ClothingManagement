<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_clothing', function (Blueprint $table) {
            $table->unsignedBigInteger('clothing_id')->comment('衣類ID');
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->timestamp('purchase_date')->comment('購入日時');
            $table->timestamp('throw_date')->nullable()->default(null)->comment('廃棄日時');
            $table->timestamps();

            $table->foreign('clothing_id')->references('clothing_id')->on('clothing');
            $table->foreign('user_id')->references('user_id')->on('user');

            $table->comment('ユーザ衣料品');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_clothing');
    }
};
