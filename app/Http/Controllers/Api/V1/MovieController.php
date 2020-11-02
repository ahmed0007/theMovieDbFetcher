<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\MovieFilters;
use App\Repositories\Movie\MovieRepositoryContract;

class MovieController extends Controller
{

    private $movieRepository;

    public function __construct(MovieRepositoryContract $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }


    public function index(MovieFilters $movieFilters){

        // dd($this->movieRepository);


        $movies = $this->movieRepository->filter($movieFilters);

        // $movies = $this->movieRepository->all();
        return $movies;
    }


    public function show($movieId){

    }
}
