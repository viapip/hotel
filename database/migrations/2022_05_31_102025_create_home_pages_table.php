<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->text('banner')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_subtitle')->nullable();
            $table->text('about_text')->nullable();
            $table->string('about_button')->nullable();
            $table->string('about_button_link')->nullable();
            $table->string('about_image')->nullable();
            $table->string('rooms_title')->nullable();
            $table->text('rooms_text')->nullable();
            $table->string('rooms_items')->nullable();
            $table->string('location_image')->nullable();
            $table->string('location_title')->nullable();
            $table->text('location_text')->nullable();
            $table->string('quality_title')->nullable();
            $table->text('quality_text')->nullable();
            $table->string('quality_button')->nullable();
            $table->text('quality_link')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('home_pages');
    }
}
