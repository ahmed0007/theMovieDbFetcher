<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTopRatedPageTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_top_rated_page_tracker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page');
            $table->integer('perpage');
            $table->integer('total_pages');
            $table->integer('total_results');
            $table->timestamp('croned_at');
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
        Schema::dropIfExists('movie_top_rated_page_tracker');
    }
}
