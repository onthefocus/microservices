<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssetsController extends Controller
{
    
    private function icons() {
        return [
            [
                'icon' => '-_Airline Hull & Liability .png',
                'title' => 'Airline Hull&Liability',
                'description' => 'Airline hull and liability insurance',
                'corrections' => 'Does not look like airline related icon, just here an aircraft' 
            ],
            [
                'icon' => '-_Commercial Aircraft Insurance  .png',
                'title' => 'Commercial Aircraft',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Private Aircraft.png',
                'title' => 'Private Aircraft',
                'description' => 'Private aircraft' 
            ],
            [
                'icon' => '-_UAV.png',
                'title' => 'UAV & UMV',
                'description' => 'Personal property insurance' 
            ],
            [
                'icon' => '-_Hangar Keepers.png',
                'title' => 'Hangar Keepers',
                'description' => 'Commercial directors and officers insurance' 
            ],
            [
                'icon' => '-_Church insurance.png',
                'title' => 'Church Insurance',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Cyber Insurance .png',
                'title' => 'Cyber Insurance',
                'description' => 'Church insurance' 
            ],
           
            [
                'icon' => '-_Commercial Combined.png',
                'title' => 'Commercial Combined',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Commercial General .png',
                'title' => 'Commercial General',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Commercial Property.png',
                'title' => 'Commercial Property',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Contractors Liability.png',
                'title' => 'Contractors Liability',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_D&O.png',
                'title' => 'Commercial D&O',
                'description' => 'Commercial directors and officers insurance' 
            ],
            [
                'icon' => '-_Express Quote .png',
                'title' => 'Express Quote',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_General Liability .png',
                'title' => 'General Liability',
                'description' => 'Church insurance' 
            ],
            
            [
                'icon' => '-_Yacht Insurance.png',
                'title' => 'Yacht Insurance',
                'description' => 'Yachts and sailors' 
            ],
            [
                'icon' => '-_Income Protection  copy.png',
                'title' => 'Builders & Constructions',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_Income Protection .png',
                'title' => 'Income Protection',
                'description' => 'Church insurance' 
            ],
            [
                'icon' => '-_JetSki .png',
                'title' => 'Jet Ski',
                'description' => 'Jet ski' 
            ],
            [
                'icon' => '-_Mergers and Acquisitions.png',
                'title' => 'Mergers & Acquisitions',
                'description' => 'Yachts and sailors' 
            ],
            [
                'icon' => '-_Motor Boat.png',
                'title' => 'Motor Boat',
                'description' => 'Motor boat insurance' 
            ],
            [
                'icon' => '-_Open Market Product.png',
                'title' => 'Opent Market',
                'description' => 'Commercial directors and officers insurance' 
            ],
            
            [
                'icon' => '-_Property.png',
                'title' => 'Property',
                'description' => 'Personal property insurance' 
            ],
            [
                'icon' => '-_Single Vehicle.png',
                'title' => 'Single Vehicle',
                'description' => 'Commercial directors and officers insurance' 
            ],
            [
                'icon' => '-_Taxi Vehicle insurance.png',
                'title' => 'Taxi Vehicle',
                'description' => 'Private aircraft' 
            ],
           
            [
                'icon' => '-_Vehicle Fleet (Telemetric) .png',
                'title' => 'Vehicle Fleet',
                'description' => 'Commercial directors and officers insurance' 
            ],
            [
                'icon' => '-_Vehicle Fleet.png',
                'title' => 'Vehicle Fleet',
                'description' => 'vehicle' 
            ],
            [
                'icon' => '-_E&O.png',
                'title' => 'E&O',
                'description' => 'Personal property insurance' 
            ],
            
            
        ];
    }
    public function details(Request $request)
    {
       
        $icons =  $this->icons();
        return view('assets', compact('icons'));
    }
}
