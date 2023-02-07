<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchemaController extends Controller
{
    public function index() {
        
        return view('schema');
    }

    public function structure() {
        $structure = json_decode(file_get_contents(storage_path() . "/json/schema.json"), true);
        return $structure;
    }

    private function recursionData($properties, $pkey, $node) {

        $node[$pkey] = [];
        foreach ($properties as $key => $value) {
            

            $properties = data_get($value, 'properties', null);
         
            if (!is_array($properties)){
                $node[$pkey][$key] = data_get($value, 'default', null);
            } else {
                $output = $this->recursionData($properties, $key, $node[$pkey]);
                $node[$pkey] = $output;
            }  
        }
        

        return $node;
    }

    public function data() {
        $structure = json_decode(file_get_contents(storage_path() . "/json/schema.json"), true);
        $data = [];

        $data =  $this->recursionData($structure['properties'],'data', []);
        return $data;
    }

    private function recursionLedger($properties, $palias, $node) {

        $palias = empty($palias)?'':$palias.'.';
        
        foreach ($properties as $key => $value) {
            
            $properties = data_get($value, 'properties', null);

        
            
            $alias = $palias.data_get($value, 'alias', '');
            
            if (!is_array($properties)){
               data_set($node, $alias, data_get($value, 'default', ''));
            } else {
                $node = $this->recursionLedger($properties, $alias, $node);
               
            }  
        }
        
        return $node;
    }


    public function ledger() {
        $structure = json_decode(file_get_contents(storage_path() . "/json/schema.json"), true);
        $data = [];

        $data =  $this->recursionLedger($structure['properties'],'', []);
        return $data;
    }

    }
