<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Http\QnBService;

class GeoController extends Controller
{

    private function getGeoLocation($request)
    {

        $isStructured = data_get($request, 'is_structured', false);
        $url = '';

        if ($isStructured) {    
            $address = data_get($request, 'address', []);           
            if (empty($address)) return  response()->json([
                'error' => 'Address structure is missing',
                'message' => 'Please specify address using [address.street], [address.city],[address.country] ,[address.state] ,[address.postalcode] ! '
                
            ],403);
            $query = http_build_query($address);
            $url = "https://nominatim.openstreetmap.org/search?" . $query . "&format=json";
        } 
        else {
            $address = data_get($request, 'full_address');
            if (empty($address)) return  response()->json([
                'error' => 'Full address is empty or missing!',
                'message' => 'Please specify full address at [full_address] path.'
                
            ],403);
            $url = "https://nominatim.openstreetmap.org/search?q=" . $address . "&format=json";      
        }
        
        $result = Http::get($url);
        
        return [
            'url' => $url,
            'response' => data_get($result->json(), 0)
        ];
    }

    public function adjacent(Request $request)
    {
        $properties = data_get($request, 'properties', []);
        $response = [];
        $adjacent = [];
        $min = 0.1;

        $service = new QnBService();

        $view = $service->getView('properties');
      

        foreach ($properties as $key => $value) {
         
            $adjacent = $this->closest($min,
               data_get($value, 'lat', 0),
               data_get($value, 'lon', 0), 
               $view, $key);
            
               foreach ($adjacent as $key => $value) {
                if (isset($response[$key])) {
                    if (data_get($response[$key],'distance') > data_get($value, 'distance') ) {
                        $response[$key] = $value;
                    }
                } else  {
                    $response[$key] = $value;
                }
               }
         }

        $result = [
            'adjacents' => $response,
        ]; 
        
        return response()->json( $result, 200);
    }
    private function closest($min, $lat, $lon, $array, $pid) {

        $measure = 'km';
        $close = [];

        foreach ($array as $key => $value) {
            $plat = data_get($value, 'lat', 0);
            $plon = data_get($value, 'lon', 0);
            $id = data_get($value, 'id', 0);

            if ($plat != 0 && $plon !=0  && $id != $pid) {
                $distance = $this->getDistanceBetweenPoints( $lat, $lon, $plat, $plon, $measure );

                $isClose =  $distance <= $min;
                $value['distance'] = $distance;
                $value['close'] = $isClose;
                $value['min'] = $min;
                $value['property_id'] = $pid;

                $close[$id] = $value;
              
            }
              
         }

         return $close;
    }

    public function search(Request $request)
    {
        $properties = data_get($request, 'property', []);
        $response = [];
        foreach ($properties as $key => $value) {
            $response[$key] = $this->getGeoLocation($value);
         }

        return response()->json( ['property' => $response], 200);
    }

    public function distance(Request $request)
    {
        $measure = 'km';
        $from = data_get($request, 'from', []);
        $to = data_get($request, 'to', []);
        
        $distance = $this->getDistanceBetweenPoints(
            data_get($from, 'lat', 0),
            data_get($from, 'lon', 0),
            data_get($to, 'lat', 0),
            data_get($to, 'lon', 0),
            $measure
        );

        
        $response = [
            'request' => $request->all(),
            'distance' => $distance,
            'distance_measure' => $measure
        ];

        return response()->json($response, 200);
    }

    private function getDistanceBetweenPoints($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'km')
    {
         $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;

        switch ($unit) {
            case 'mil':
                break;
            case 'km':
                $distance = $distance * 1.609344;
        }

        return (round($distance, 4));
    }
    
  
}
