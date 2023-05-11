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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id')->comment('ユーザID');
            $table->string('name', 255)->comment('名前');
            $table->string('email', 255)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メール送信機能');
            $table->string('password', 20)->comment('パスワード');
            $table->rememberToken()->comment('トークン');
            $table->timestamps();

            $table->comment('ユーザマスタ');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
