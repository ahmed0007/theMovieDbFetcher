<?php


namespace App\Repositories\Movie;


interface MovieRepositoryContract{

    public function all();

    public function findById();

    public function create();

    public function update();

    public function delete();

    public function dbSeed();

}
