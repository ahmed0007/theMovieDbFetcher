<?php


namespace App\Repositories\Genre;

use App\Models\Genre;
use App\Traits\ApiFeedable;

class GenreRepository
{

    use ApiFeedable;

    protected $endPoint;
    protected $Genre;
    protected $apiPayload;

    public function __construct()
    {
        $this->endPoint = config('movieDb.genre.endPoint');
        $this->Genre    = new Genre;
        $this->apiPayload = [
            'api_key' =>  config('movieDb.api_key'),
        ];
    }


    public function all(){
        // To-Do
        // Return all Genre stored in our dabases.

    }

    public function findById(){

    }

    public function create($payload){

        // Simple validation to prevent duplication
        if( $this->Genre->where('movieDb_id', $payload['id'])->first() ) return;

        $this->Genre->create([
            'movieDb_id' => $payload['id'],
            'name'       => $payload['name']
        ]);
    }

    public function update(){

    }

    public function delete(){

    }

    public function dbSeed(){
        // Simple validation
        // \Log::info('Genre here');
        // \Log::info($this->Genre->all());
        // if( $this->Genre->all() ) return;

        $data = $this->feed();

        collect($data['genres'])->each(function($item){
            $this->create($item);
        });
    }



}
