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
        Schema::create('clothes', function (Blueprint $table) {
            $table->id('clothes_id')->comment('衣類ID');
            $table->unsignedBigInteger('brand_id')->comment('ブランドID');
            $table->string('name', 255)->unique()->comment('名前');
            $table->integer('purchase_place')->comment('購入場所');
            $table->integer('type')->comment('服のタイプ');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')->references('brand_id')->on('brand');

            $table->comment('衣類マスタ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothing');
    }
};
