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
        Schema::create('brand', function (Blueprint $table) {
            $table->id('brand_id')->comment('ブランドID');
            $table->string('name', 255)->unique()->comment('名前');
            $table->string('Japanese_name', 255)->nullable()->comment('日本語名');
            $table->timestamps();
            $table->softDeletes();

            $table->comment('ブランドマスタ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
};
