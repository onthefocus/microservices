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

      <div class="col-12">
      
       
        <div class="row pt-2 mt-2 ">
            <div class="col-10 header">
                <div class="text-left">
                    <h1>Products Icons </h1>
                
                    <h3> General Comments</h3>
                    <ul>
                        <li>Unify as much as possible same visual elements: Human should be the same size in all icons. 
                            If we have half body, then all humans should be half body. Also try to keep the same face color and face elements, if one is with eyes, then everyone with eyes. </li>
                        <li>All icons should have badges, I liked that approach as it would corelated with insurance.</li>

                    </ul>
                    </div>
            </div>

        </div>


        <div class="row mt-1">
           @foreach ($icons as $key => $icon )
            <div class="col m-3">
                <div class="row border p-1">
                <div class="col-4" style="margin-left:-10px;" >
                        <img src="/images/png/{{ $icon['icon'] }}" width="150px"  />
                    </div>
                    <div class="col-8">
                        <h3 class="mt-2">{{ $icon['title'] }} </h3>
                        <div> {{ data_get($icon, 'corrections','') }} </div>
                       <!-- <a href="#" class="btn btn-sm btn-primary mt-3 mb-2"> Start Quote </a> -->
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