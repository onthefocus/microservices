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
      <div class="col-1 pr-0 pl-0" style="padding-left:0px;">
          <div style="background-color:#12263f; height:850px;" >&nbsp;</div>
      </div>
      <div class="col-11">
      
       
        <div class="row mb-5 pt-2 mt-2 border">
            <div class="col-10 header">
                <div class="text-left">
                <h1>Insurance Products</h1>
                <h2>Choose the product and create policy</h2>
            </div>
            </div>
           
            <div class="col-2  uil-insly justify-content-end d-flex" style="height:80px">
           
            </div>
        </div>


        <div class="row mt-1">
           @foreach ($icons as $key => $icon )
            <div class="col m-3">
                <div class="row border p-2">
                    <div class="col-7">
                        <h3 class="mt-2">{{ $icon['title'] }} </h3>
                        <div> {{ $icon['description'] }} </div>
                       <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a> -->
                    </div>
                    <div class="col-5 justify-content-start" >
                        <img src="/images/png/{{ $icon['icon'] }}" width="150px" style="color:red" />
                    </div>
                </div>
            </div>

            @if ( (($key+1) % 3) === 0)
              </div>
              <div class="row mt-1">
            @endif
            @endforeach
           

        </div>

    

       
        </div>
    </div>

   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>