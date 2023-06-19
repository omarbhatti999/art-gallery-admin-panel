<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->text('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_meta')->nullable();
            $table->string('seo_image')->nullable();
            $table->string('icon_image')->nullable();
            $table->integer('sort_number')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('category_tag', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->primary(['category_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_tag');
        Schema::dropIfExists('categories');
    }
}
