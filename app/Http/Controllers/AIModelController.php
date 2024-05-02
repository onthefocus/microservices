<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AIModelController extends Controller
{
    private const LEDGER_URL = 'https://inges.app.demo.insly.com/';
    private const LEDGER_USER = 'kestutis.naureckas@insly.com';
    private const LEDGER_PASS = 'Problematic2025#';
    private const LEDGER_TENANT = 'inges';

    private function ledgerAuth() {
       
        $response = Http::post(self::LEDGER_URL . '/api/v1/sites/login/'.self::LEDGER_TENANT, [
            'username' => self::LEDGER_USER,
            'password' => self::LEDGER_PASS 
        ]);

        return $response;
    }

    public function claims() {
       // $response = ['claims'=>true];
        $response = $this->ledgerAuth();

        $result = $response->json();

        return $response;
    }

    public function calculate(Request $request)
    {
        $data = $request->all();

        $make = data_get($data, 'objects.vehicle.0.data.make');
        $model = data_get($data, 'objects.vehicle.0.data.model');
        $year = data_get($data, 'objects.vehicle.0.data.year', 2024);
        $product = data_get($data, 'objects.vehicle.0.data.productGroup');
        $teritory = data_get($data, 'objects.vehicle.0.data.territoryCasco');

        $allFields = [
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'product' => $product,
            'teritory' => $teritory
        ];
        
        $makeRiskTable = [
            'Toyota' => 2.4,
            'BMW' => 5.6,
            'Mercedes' => 4.3,
            'Audi' => 2.7,
            'Volkswagen' => 4.4,
            'Ford' => 1.2,
            'Peugeot' => 5.5,
            'Renault' => 5.4,
            'Fiat' => 1.1,
            'Skoda' => 1.0,
            'Honda' => 2.5,
        ];
        $yearRiskCoeficient = [
            2000 => 2,
            2001 => 2,
            2002 => 2,
            2003 => 1.8,
            2004 => 1.8,
            2005 => 1.7,
            2006 => 1.7,
            2007 => 1.6,
            2008 => 1.6,
            2009 => 1.5,
            2010 => 1.5,
            2011 => 1.4,
            2012 => 1.4,
            2013 => 1.3,
            2014 => 1.3,
            2015 => 1.2,
            2016 => 1.2,
            2017 => 1.1,
            2018 => 1.1,
            2019 => 1,
            2020 => 1,
            2021 => 1,
            2022 => 1,
            2023 => 1,
            2024 => 1,

        ];
        
        $risk = data_get($makeRiskTable, $make, 3) + data_get($yearRiskCoeficient, $year, 2.5);

        $extra = "";
        switch ($risk)
        {
            case $risk > 7:
                $extra = "This quote case is considered too risky (>7%) for insurance coverage, it's recommended to deny this quote";
                break;
            case $risk > 5:
                $extra = "This quote case should be suppervised (>5%) by underwriter and needs manual his approval.";
                break;
            case $risk > 3:
                $extra = "Quote case is considered as medium risk (>3%), recommended to be reviewed by underwriter!";
                break;
            default:
                $extra = "Low risk case (<3%), can be quoted and covered automatically.";
                break;
        }
        $response = [
            'result' => "Risk of $make $model (year $year) getting into an accident is $risk%. ".$extra,
            'data' => [
                'considered_fields' =>  $allFields
            ] 
        ];
       // $this->storeRequestData($response);

        //store request data parameters to json file on disk
        
        
   
        return $response;
    }

    private function storeRequestData($data)
    {
      
        
        // get current date and time as string
        $now = date('Y-m-d H:i:s ');


        $filename = $now.Str::random(40) . '.json';


        Storage::disk('public')->put($filename, json_encode($data));
      

    }
 
}
