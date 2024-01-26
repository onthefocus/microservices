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
                'value' => fake()->randomNumber(8)
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
