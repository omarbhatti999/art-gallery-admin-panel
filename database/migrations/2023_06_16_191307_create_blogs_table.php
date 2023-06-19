<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('long_description');
            $table->enum('type', ['Exhibition', 'Events', 'News', 'Company Events']);
            $table->boolean('active')->default(false);
            $table->string('seo_title')->nullable();
            $table->text('seo_meta')->nullable();
            $table->string('seo_image')->nullable();
            $table->string('video_link')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
