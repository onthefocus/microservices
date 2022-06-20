<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Insly Q&B</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body style="height:100%;">
  
    <div class="container-fluid  ml-0">
      <div class="row ">
      <div class="col-2 pr-0 pl-0" style="padding-left:0px;">
          <div style="background-color:#12263f; height:850px;" >&nbsp;</div>
      </div>
      <div class="col-10">
      
       
        <div class="row mb-5 pt-2 mt-2 border">
            <div class="col-10 header">
                <div class="text-left">
                <h1>Insurance Schemas</h1>
                <h2>Select schema to proceed with the new quote creation</h2>
            </div>
            </div>
           
            <div class="col-2  uil-insly justify-content-end d-flex" style="height:80px">
           
            </div>
        </div>


        <div class="row mt-1">
            <div class="col m-3">
                <div class="row border p-2">
                    <div class="col-7">
                        <h3 class="mt-2">Commercial Aircraft </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5 justify-content-start" >
                        <img src="/images/icons/Commercial Aircraft.svg" width="150px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 pr-4">
                    <div class="col-7">
                        <h3 class="mt-2">Cyber Insurance </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5" >
                        <img src="/images/icons/Cyber.svg" width="150px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 ">
                    <div class="col-7">
                        <h3 class="mt-2">Commercial Prop</h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5" >
                        <img src="/images/icons/Commercial Property.svg" width="150px" style="color:red" />
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-1">
            <div class="col m-3">
                <div class="row border p-2">
                    <div class="col-7">
                        <h3 class="mt-2">Yacht </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5 justify-content-start" >
                        <img src="/images/icons/Yacht.webp" width="150px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 pr-4">
                    <div class="col-7">
                        <h3 class="mt-2">Jet Ski </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5" >
                        <img src="/images/icons/JetSki.webp" width="150px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 ">
                    <div class="col-7">
                        <h3 class="mt-2">General liability</h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5" >
                        <img src="/images/icons/General Liability.webp" width="150px" style="color:red" />
                    </div>
                </div>
            </div>

        </div>

        <!--
        <div class="row mt-1">
            <div class="col m-3">
                <div class="row border p-2">
                    <div class="col-8">
                        <h3 class="mt-2">Taxi Insurance</h3>
                        <div>Taxi insurance from various risks, can be covered multiple drivers.</div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-4 justify-content-start" >
                        <img src="/images/SVG/Asset 1.svg" width="110px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 pr-4">
                    <div class="col-8">
                        <h3 class="mt-2">Motorcycle Cover</h3>
                        <div> Personal motorcycle hull and liability fullu coverage. </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-4" >
                        <img src="/images/SVG/Asset 2.svg" width="110px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 ">
                    <div class="col-8">
                        <h3 class="mt-2">Vehicles Fleet</h3>
                        <div> Comprehensive insurance for vehicle fleets and their drivers. </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-4" >
                        <img src="/images/SVG/Asset 3.svg" width="110px" style="color:red" />
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-1">
            <div class="col m-3">
                <div class="row border p-2">
                    <div class="col-7">
                        <h3 class="mt-2">Commercial Aircraft </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5 justify-content-start" >
                        <img src="/images/third/Commercial Aircraft Insurance.png" width="130px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row border p-2 pr-4">
                    <div class="col-7">
                        <h3 class="mt-2">Cyber Insurance </h3>
                        <div> Commercial aircraft hull and liability cover for small canadian aircrafts </div>
                        <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a>
                    </div>
                    <div class="col-5" >
                        <img src="/images/third/Cyber Insurance.png" width="130px" style="color:red" />
                    </div>
                </div>
            </div>
            <div class="col m-3">
                <div class="row  p-2 ">
                    <div class="col-7">
                       
                    </div>
                    <div class="col-5" >
                        
                    </div>
                </div>
            </div>

        </div> -->
        </div>
    </div>

   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>