<?php

namespace App\Filters;
use App\Models\Genre;
use App\Models\GenreMovie;

class MovieFilters extends Filters {


    protected $filters = ['category_id', 'popular', 'rated'];

	/**
	 * Filter a Movie by genre_id
	 *
	 * @return QueryBuilder
	 * @author ATH
	 **/
	protected function category_id($catId){

        $moviesIds= GenreMovie::where('genre_id', $catId)->get()->map(function($item){
            return $item->movie_id;
        })->toArray();

        $data = $this->builder->whereIn('movieDb_Id', $moviesIds)->latest();

        return $data;

	}

	/**
	 * Filter A Movies by popular
	 *
	 * @return void
	 * @author ATH
	 **/

	protected function popular($direction = 'desc'){
        // To-Do
        // stop ordered clearing to allow more ordering filter
        $this->builder->getQuery()->orders = [];
		return $this->builder->orderBy('popularity', $direction);
	}


	protected function rated($direction = 'desc'){
        $this->builder->getQuery()->orders = [];
		return $this->builder->orderBy('vote_average', $direction);
	}


}


?>
