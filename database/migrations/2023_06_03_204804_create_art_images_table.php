<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtImagesTable extends Migration
{
    public function up()
    {
        Schema::create('art_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('art_id');
            $table->foreign('art_id')->references('id')->on('arts')->onDelete('cascade');
            $table->string('image_path');
            $table->tinyInteger('featured_image')->default(0);
            $table->enum('image_type', ['VERTICLE', 'HORIZONTAL']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('art_images');
    }
}
