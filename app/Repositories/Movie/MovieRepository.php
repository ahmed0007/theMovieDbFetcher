<?php

namespace App\Repositories\Movie;

use App\Repositories\Movie\MovieRepositoryContract;
use App\Models\Movie;
use App\Models\MovieTopRatedPageTracker;
use App\Traits\ApiFeedable;

class MovieRepository implements MovieRepositoryContract
{
    use ApiFeedable;

    protected $endPoint;
    protected $movie;

    public function __construct()
    {
        $this->endPoint = config('movieDb.movie.endPoint');
        $this->movie    = new Movie;
        $this->pageTracker = new MovieTopRatedPageTracker;
        $this->apiPayload = [
            'api_key'  =>  config('movieDb.api_key'),
            'page'     => $this->whichPage(),
            'language' => 'en-US'
        ];
    }

    protected function whichPage(){

        $lastPageCroned = $this->pageTracker->latest()->first();
        if($lastPageCroned && $lastPageCroned->total_pages <= $lastPageCroned->page) return false;
        return  $lastPageCroned ?  $lastPageCroned->page +1 : 1;

    }

    public function all(){
        return $this->movie->with('genres')->get();
        // To-Do
        // Return all Movies stored in our dabases.

    }

    public function filter($movieFilters){
        return $this->movie->filter($movieFilters)->with('genres')->get();
    }


    public function findById(){

    }

    public function create($payload){

        // Simple validation to prevent duplication
        if( $this->movie->where('movieDb_Id', $payload['id'])->first() ) return;

        $movie = $this->movie->create([
            "popularity"        => $payload['popularity'],
            "vote_count"        => $payload['vote_count'],
            "video"             => $payload['video'],
            "poster_path"       => $payload['poster_path'],
            "movieDb_Id"        => $payload['id'],
            "adult"             => $payload['adult'],
            "backdrop_path"     => $payload['backdrop_path'],
            "original_language" => $payload['original_language'],
            "original_title"    => $payload['original_title'],
            "title"             => $payload['title'],
            "vote_average"      => $payload['vote_average'],
            "overview"          => $payload['overview'],
            "release_date"      => $payload['release_date'],
        ]);

        $movie->attachGenres($payload);




    }

    protected function savePageCronedDetails($payload){

        $this->pageTracker->create([
            'page'    => $payload['page'],
            'total_results' => $payload['total_results'],
            'total_pages'   => $payload['total_pages'],
            'perpage'       => collect($payload['results'])->count(),
            'croned_at'     => date("Y-m-d H:i:s")
        ]);
    }





    public function update(){

    }

    public function delete(){

    }

    public function dbSeed(){
        // Simple validation

        \Log::info('movie here');
        if( !$this->whichPage()) return;

        $data = $this->feed();


        collect($data['results'])->each(function($item){
            $this->create($item);
        });
        $this->savePageCronedDetails($data);


    }


}
