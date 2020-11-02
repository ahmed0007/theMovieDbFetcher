<?php

namespace App\Traits;

use Zttp\Zttp;
use Zttp\ZttpResponse;

trait ApiFeedable{


	public function feed(){
        $response = Zttp::get($this->endPoint, $this->apiPayload);
        return $response->json();
    }


}

?>
