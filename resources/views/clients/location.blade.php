<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Business</title>
  </head>
  <body>
    <div class="container pt-4">
        <h1 class="text-danger d-flex justify-content-center">Location Information</h1>
        <br/>
        <div class="pt-1">
            @if($location)
            <p><b class="px-4">IP Address:</b>{{$location->ip}}</p>
            <p><b class="px-4">Country Name:</b>{{$location->countryName}}</p>
            <p><b class="px-4">Country Code:</b>{{$location->countryCode}}</p>
            <p><b class="px-4">Region Name:</b>{{$location->regionName}}</p>
            <p><b class="px-4">Region Code:</b>{{$location->regionCode}}</p>
            <p><b class="px-4">City Name:</b>{{$location->cityName}}</p>
            <p><b class="px-4">ZipCode:</b>{{$location->zipCode}}</p>
            <p><b class="px-4">Latitude:</b>{{$location->latitude}}</p>
            <p><b class="px-4">Longitude:</b>{{$location->longitude}}</p>
            <p><b class="px-4">Timezone:</b>{{$location->timezone}}</p>
            @else
            <h1>Not Found</h1>
            @endif
  </body>
  </html>