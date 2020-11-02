<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];

    public function genres()
    {
        return $this->belongsToMany(
                config('movieDb.genre.model'),
                config('movieDb.relation_table'),
                config('movieDb.foreign_pivot_key', 'movie_id'),
                config('promocodes.related_pivot_key', 'genre_id'));
    }


    public function scopeFilter($query, $filters){
        return $filters->apply($query);
    }

    public function attachGenres($payload){
        $formatted = $this->format($payload['genre_ids']);
        \DB::table('genre_movie')->insert($formatted); // Query Builder approach
    }

    public function format($data){
        return collect($data)->map(function($genreId){
            return [
                'movie_id' =>  $this->movieDb_Id,
                'genre_id' => $genreId
            ];
        })->toArray();
    }



}
