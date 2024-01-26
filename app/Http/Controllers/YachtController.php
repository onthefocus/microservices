<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YachtController extends Controller
{
    private function getResult(string $name='') {

 
        $result = [
            'status' => true,

            'yacht' => [
                'name' => $name,
                'mooring' => fake()->city(),
                'builder' => fake()->randomElements([
                    "Lürssen",
                    "Feadship",
                    "Benetti",
                    "Oceanco",
                    "Amels",
                    "Abeking & Rasmussen",
                    "Heesen Yachts",
                    "CRN",
                    "Sunseeker",
                    "Sanlorenzo",
                ]),
                'year' => fake()->numberBetween(1999, 2023),
                'value' => fake()->numberBetween(10, 99)* 100000,
                'dimensions' => [
                    'length' => fake()->randomFloat(1, 20, 40),
                    'beam' => fake()->randomFloat(1, 4, 9),
                    'draft' => fake()->randomFloat(1, 1, 3),
                ],
             ],
             'tenders' => [
                'name' => $name,
                'value' => fake()->randomNumber(8)
             ],
           
        ];
        return $result;
    }
    public function get(string $name=null)
    {
        return $this->getResult($name);
    }
    public function post(Request $request)
    {
        $name = $request['name'];
        return $this->getResult($name);
    }
}
