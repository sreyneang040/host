<?php namespace App\Models;

use CodeIgniter\Model;

class CitiesModel{
    public function getCities(){

        $serverJson = file_get_contents('json/cities.json');
        $data = json_decode($serverJson,true);
        return $data;

    }
}
