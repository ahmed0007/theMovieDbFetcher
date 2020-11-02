<?php

return [

    'api_key' => '276acd1bebcfb5c2a5ed2e93c3e12786',
    'db' => [
        'table' => 'movies',
        'relation_table' => 'genre_movie',
    ],
    'genre' => [
        'model'    => \App\Models\Genre::class,
        'endPoint' => 'https://api.themoviedb.org/3/genre/movie/list',
    ],
    'movie' => [
        'endPoint' => 'https://api.themoviedb.org/3/movie/top_rated',
    ],

    'relation_table' => 'genre_movie',

      /**
     * Foreign pivot key for many to many relationship
     * of promocode and user model
     */
    'foreign_pivot_key' => 'movie_id',

    /**
     * Related pivot key for many to many relationship
     * of promocode and user model
     */
    'related_pivot_key' => 'genre_id',


];
