<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MovieRepository;

class MovieController extends Controller
{

    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }


    public function index(){
        $movies = $this->movieRepository->all();
        return $movies;
    }


    public function show($movieId){

    }
}
