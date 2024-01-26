<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YachtController extends Controller
{
    private function getResult(string $name='') {

        $tenderMakesAndModels = [
            "Williams" => [
                "Turbojet 325",
                "Sportjet 435",
                "Dieseljet 505"
            ],
            "Novurania" => [
                "DL 400",
                "MX 450",
                "Chase 19"
            ],
            "Zodiac" => [
                "Medline 660",
                "Pro Open 550",
                "Yachtline 340"
            ],
            "AB Inflatables" => [
                "Nautilus 15 DLX",
                "Alumina 13 ALX",
                "Nautica 11 VT"
            ],
        ];

        $tenderMakes = [
            "Williams" ,
            "Novurania" ,
            "Zodiac" ,
            "AB Inflatables",
        ];

        $tenderMake = fake()->randomElement($tenderMakes);
 
        $result = [
            'status' => true,
            'assured' => [
                'name' => fake()->company(),
                'address' => fake()->address(),
            ],
            'owners' => [
                '1a3f457c-ae51-4e86-aee2-f1f95ff24ae4' =>
                 [
                    'name' => fake()->name(),
                    'address' => fake()->address(),
                    'nationality' => fake()->country(),
                 ],
                 '31669c25-2cf4-4849-be8e-0e215410f14d' =>
                 [
                    'name' => fake()->company(),
                    'address' => fake()->address(),
                    'nationality' => fake()->country(),
                 ]
            ],
            'ownerExperience' => fake()->numberBetween(1, 20),
            'cruisingRange' => fake()->numberBetween(100, 900) * 100,
            'use' => fake()->randomElement([
                "Cruising",
                "Performance Cruising",
                "Racing",
                "Motor Yacht",
                "Superyacht",
                "Megayacht",
                "Charter",
                "Exploration",
                "Fishing",
                "Research",
                "Sailing School",
                "Day Sailing",
                "Liveaboard",
            ]),
            'yacht' => [
              
                'name' => $name,
                'mooring' => fake()->city(),
                'builder' => fake()->randomElement([
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
                'mastMaterial' => fake()->randomElement([
                    "Aluminum",
                    "Carbon Fiber",
                    "Wood",
                    "Composite",
                    "Steel",
                    "Hybrid",
                    "Fiberglass"
                ]),
                'speed' => fake()->numberBetween(7, 35),
                'guests' => fake()->numberBetween(4, 40),
                'imo' => fake()->numberBetween(2000000, 9000000),
                'flag' => fake()->country(),
                'type' => fake()->randomElement([
                    "Motor Yacht", 
                    "Sailing Yacht", 
                ]),
                'tonage' => fake()->numberBetween(100, 200),
                'propulsion' => fake()->randomElement([
                    "Sail", 
                    "Internal Combustion Engines",
                    "Hybrid Propulsion",
                    "Electric Propulsion"
                ]),
                'helicopter' => fake()->boolean(),
                'callSign' => fake()->randomElement([
                    "ABC1234",
                    "XYZ5678",
                    "DEF9012",
                    "GHI3456",
                    "JKL7890",
                ]),
                'hullNo' => fake()->randomElement([
                    "US-ABC12345G819",
                    "FR-XYZ98765H723",
                    "CA-DEF45678K625",
                    "UK-GHI65432R520",
                    "AU-JKL78901M317",
                ]),

             ],
             'engine' => [
                'make' => fake()->randomElement([
                    "Caterpillar",
                    "MTU",
                    "MAN",
                    "Volvo Penta",
                    "Cummins",
                    "Yanmar",
                    "Mercury Marine",
                    "Suzuki Marine",
                    "Honda Marine",
                    "Perkins",
                    "Nanni Diesel",
                    "John Deere",
                ]),
                'hp' =>  fake()->numberBetween(100, 5000),
                'serial' => fake()->randomElement([
                    "CAT123456",
                    "MTU987654",
                    "VOLVO567890",
                    "CUMMINS456789",
                    "YANMAR123456",
                ]),
                'survey' =>  fake()->dateTimeBetween('-3 years', '-1 years')->format('Y-m-d'),
                'year' =>  fake()->numberBetween(1990, 2024),
                'fuel' => fake()->randomElement([
                    "Petrol",
                    "Diesel" 
                ]),
                'refit' =>  fake()->dateTimeBetween('-8 years', '-4 years')->format('Y-m-d'),
             ],
             'tenders' => [
                '76988ac8-c8db-43ef-8c03-dd0675b0c0e3'=> [
                    'make' =>  $tenderMake ,
                    'model' => fake()->randomElement($tenderMakesAndModels[$tenderMake]),
                    'serial' => fake()->numberBetween(20000000, 90000000),
                    'value' => fake()->numberBetween(10, 99)* 1000,
                ],
                '8d6d60e5-2634-403b-957c-1f866156280f'=> [
                    'make' =>  $tenderMake ,
                    'model' => fake()->randomElement($tenderMakesAndModels[$tenderMake]),
                    'serial' => fake()->numberBetween(20000000, 90000000),
                    'value' => fake()->numberBetween(10, 99)* 1000,
                ]
             ],
             'crew' => [
                'positions' =>  implode(", ", fake()->randomElements([
                    "Captain",
                    "First Officer",
                    "Deckhand",
                    "Bosun",
                    "Engineer",
                    "Chef",
                    "Steward/Stewardess",
                    "Purser",
                    "Interior Crew",
                    "Deck Officers",
                    "Tender Operator",
                    "Dive Instructor",
                    "Nanny",
                    "Security Officer",
                    "Massage Therapist/Spa Staff"
                ],4)),
                'annualWage' => fake()->numberBetween(3000, 6000)* 12 *4,
                'number' => fake()->numberBetween(2, 10),
                'captain' => fake()->name(),
             ]
           
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
