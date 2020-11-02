<?php


namespace App\Repositories\Movie;


interface MovieRepositoryContract{

    public function all();

    public function findById();

    public function create($payload);

    public function update();

    public function delete();

    public function dbSeed();

}
