<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtsTable extends Migration
{
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('slider_caption')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('year')->nullable();
            $table->string('materials')->nullable();
            $table->string('size')->nullable();
            $table->string('edition')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('series')->nullable();
            $table->unsignedBigInteger('artist_id')->nullable();
            $table->foreign('artist_id')->references('id')->on('artists');
            
            $table->boolean('availability')->default(false);
            $table->boolean('featured')->default(false);
            $table->integer('sort_number')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('hidden')->default(false);
            $table->string('banner_image')->nullable();
            $table->string('thumb_image')->nullable();
            $table->string('seo_image')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_meta')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arts');
    }
}
