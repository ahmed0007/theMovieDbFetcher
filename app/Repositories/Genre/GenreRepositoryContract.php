<?php


namespace App\Repositories\Genre;


interface GenreRepositoryContract{

    public function all();

    public function findById();

    public function create();

    public function update();

    public function delete();

    public function dbSeed(


    );



}
