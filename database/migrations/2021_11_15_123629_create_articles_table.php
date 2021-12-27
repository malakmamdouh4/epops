<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('conclusion');
            $table->string('link');
            $table->string('media')->nullable();
            $table->string('title');
            $table->string('publish_date');
            $table->string('updated_date')->nullable();
            $table->unsignedBigInteger('newspaper_id');
            $table->foreign('newspaper_id')->references('id')->on('newspapers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('articles');
    }
}
