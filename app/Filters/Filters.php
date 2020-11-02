<?php

namespace App\Filters;

abstract class Filters{

	protected $request, $builder;


	protected $filters = [];

	public function __construct(){

		$this->request = request();

	}


	public function apply($builder){ // current querybuilder

		$this->builder = $builder;
		// now i have query here do what ever you want
		// the best side of that
		// you get here from the model it self you filter on it
		// using a scope method filter
		//if($this->request->by) return $this->by($this->request->by);
		foreach ($this->getFilters() as $filter => $value) {

			if(method_exists($this, $filter))
			$this->$filter($value);

		}

        return $builder;

	}


	//----------
	public function getFilters(){

        $map = [];

        foreach($this->request->toArray() as $key => $param){
            if( strpos($key, '|')){
                $parts = explode('|', $key);
                $map[$parts[0]] = $parts[1];
            }

        }

        $maped = array_merge($this->request->all(), $map);


        $filters = array_filter($maped, function($v, $k)  {
            return in_array($k, $this->filters);
        }, ARRAY_FILTER_USE_BOTH);

        return $filters;


	}


}

?>
