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
  
    
            <div class="col-10 header">
                <div class="text-left">
                <h1>Products Icons</h1>
               
            </div>
    

       <table style="width:100%">
        <tr>
           @foreach ($icons as $key => $icon )
            <td style="width:33%">
                <table>
                    <tr>
                        <td>
                        <img src="/images/png/{{ $icon['icon'] }}" width="150px" style="color:red" />
                        </td>
                        <td>
                        <h3>{{ $icon['title'] }} </h3>
                          <div> {{ data_get($icon, 'corrections','') }} </div>
                        </td>
                        
                    </tr>
                </table>
                
            </td>

            @if ( (($key+1) % 3) === 0)
    </tr>
              <tr>
            @endif
            @endforeach
           

    

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>