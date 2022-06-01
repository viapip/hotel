<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('special_offer')->default(0);
            $table->string('title')->nullable();
            $table->text('preview_image')->nullable();
            $table->text('images')->nullable();
            $table->string('meters')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('link')->nullable();
            $table->text('other_rooms')->nullable();
            $table->string('title_seo')->nullable();
            $table->text('description_seo')->nullable();
            $table->text('slug')->nullable();
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
        Schema::drop('rooms');
    }
}
