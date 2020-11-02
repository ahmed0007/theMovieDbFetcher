<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('theMovieDb.db.table', 'movies'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('movieDb_Id')->index();
            $table->float('popularity');
            $table->bigInteger('vote_count');
            $table->boolean('video');
            $table->boolean('adult');
            $table->string('poster_path', 255)->nullable();
            $table->string('backdrop_path', 255)->nullable();
            $table->string('original_language', 2)->nullable();
            $table->string('original_title', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->float('vote_average');
            $table->text('overview')->nullable();
            $table->string('belongs_to_collection')->nullable();
            $table->string('homepage', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->bigInteger('imdb_id')->nullable();
            $table->integer('budget')->nullable();
            $table->integer('revenue')->nullable();
            $table->bigInteger('runtime')->nullable();

            $table->timestamps();
        });

        Schema::create(config('theMovieDb.db.relation_table', 'genre_movie'), function (Blueprint $table) {
            $table->bigInteger('genre_id')->index();
            $table->bigInteger('movie_id')->index();
            $table->primary(['genre_id', 'movie_id']);
            $table->foreign('genre_id')->references('movieDb_id')->on('genres');
            $table->foreign('movie_id')->references('movieDb_Id')->on(config('theMovieDb.table', 'movies'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('theMovieDb.db.table', 'movies'));
    }
}
