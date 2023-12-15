<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <title>Business</title>
  </head>
  <body>
  <h1 class="text-danger d-flex justify-content-center"><u>Payment deadline info graph</u></h1>
  <div style="width:900px; margin:auto;">
  <canvas id="chart"></canvas>
</div>
  <script>

  var ctx = document.getElementById('chart').getContext('2d');
  var chart = new Chart(ctx,{
    type:'bar',
    data:{
            labels:<?php echo json_encode($labels); ?>,
            datasets:<?php echo json_encode($datasets); ?>

         }
  });
  </script>
  </body>
  </html><?php /**PATH C:\xampp\htdocs\booking\resources\views/clients/chart.blade.php ENDPATH**/ ?>