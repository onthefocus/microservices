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
                'title' => 'Airline Hull & Liability',
                'description' => 'Airline hull and liability insurance',
                'corrections' => 'Does not look like airline related icon, just here an aircraft. There should be some airline 
                 related building with logo on like coporate building of fleet of commercial airplanes with perpesctive.' 
            ],
            [
                'icon' => '-_Commercial Aircraft Insurance  .png',
                'title' => 'Commercial Aircraft',
                'description' => 'Commercial Aircraft',
                'corrections' => 'This one is good, just to be precise, I would remove aircraft windows 6 ones in the body part, 
                 cause if this commercial plane, then cargo boxes do not need light from the windows :)' 
            ],
            [
                'icon' => '-_Private Aircraft.png',
                'title' => 'Private Aircraft',
                'description' => 'Private aircraft',
                'corrections' => 'I would make the same angle of aircraft as commercial. Missing badge. I would put half person family with suitcases in front.'
            ],
            [
                'icon' => '-_UAV.png',
                'title' => 'UAV & UMV',
                'description' => 'Personal property insurance',
                'corrections' => ''
            ],
            [
                'icon' => '-_Hangar Keepers.png',
                'title' => 'Hangar Keepers',
                'description' => 'Commercial directors and officers insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Church insurance.png',
                'title' => 'Church Insurance',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Cyber Insurance .png',
                'title' => 'Cyber Insurance',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
           
            [
                'icon' => '-_Commercial Combined.png',
                'title' => 'Commercial Combined',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Commercial General .png',
                'title' => 'Commercial General',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Commercial Property.png',
                'title' => 'Commercial Property',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Contractors Liability.png',
                'title' => 'Contractors Liability',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_D&O.png',
                'title' => 'Commercial D&O',
                'description' => 'Commercial directors and officers insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Express Quote .png',
                'title' => 'Express Quote',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_General Liability .png',
                'title' => 'General Liability',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            
            [
                'icon' => '-_Yacht Insurance.png',
                'title' => 'Yacht Insurance',
                'description' => 'Yachts and sailors',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Income Protection  copy.png',
                'title' => 'Builders & Constructions',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Income Protection .png',
                'title' => 'Income Protection',
                'description' => 'Church insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_JetSki .png',
                'title' => 'Jet Ski',
                'description' => 'Jet ski',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Mergers and Acquisitions.png',
                'title' => 'Mergers & Acquisitions',
                'description' => 'Yachts and sailors',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Motor Boat.png',
                'title' => 'Motor Boat',
                'description' => 'Motor boat insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Open Market Product.png',
                'title' => 'Opent Market',
                'description' => 'Commercial directors and officers insurance',
                'corrections' => '' 
            ],
            
            [
                'icon' => '-_Property.png',
                'title' => 'Property',
                'description' => 'Personal property insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Single Vehicle.png',
                'title' => 'Single Vehicle',
                'description' => 'Commercial directors and officers insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Taxi Vehicle insurance.png',
                'title' => 'Taxi Vehicle',
                'description' => 'Private aircraft',
                'corrections' => '' 
            ],
           
            [
                'icon' => '-_Vehicle Fleet (Telemetric) .png',
                'title' => 'Vehicle Fleet',
                'description' => 'Commercial directors and officers insurance',
                'corrections' => '' 
            ],
            [
                'icon' => '-_Vehicle Fleet.png',
                'title' => 'Vehicle Fleet',
                'description' => 'vehicle',
                'corrections' => '' 
            ],
            [
                'icon' => '-_E&O.png',
                'title' => 'E&O',
                'description' => 'Personal property insurance',
                'corrections' => '' 
            ],
            
            
        ];
    }
    public function details(Request $request)
    {
       
        $icons =  $this->icons();
        return view('assets', compact('icons'));
    }
    public function comments(Request $request)
    {
       
        $icons =  $this->icons();
        return view('comments2', compact('icons'));
    }
}
