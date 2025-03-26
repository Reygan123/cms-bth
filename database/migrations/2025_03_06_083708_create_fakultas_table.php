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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->string('yt_id')->nullable();
            $table->unsignedBigInteger('ourteam_id')->nullable();
            $table->string('title1')->nullable();
            $table->text('description1')->nullable();
            $table->string('statistik1')->nullable();
            $table->string('statistik2')->nullable();
            $table->string('statistik3')->nullable();
            $table->string('statistik4')->nullable();
            $table->string('tt')->nullable();
            $table->string('ig')->nullable();
            $table->string('fb')->nullable();
            $table->string('yt')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('map')->nullable();
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->string('title3')->nullable();
            $table->text('description3')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('link_fakultas')->nullable();
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
        Schema::dropIfExists('fakultas');
    }
};
