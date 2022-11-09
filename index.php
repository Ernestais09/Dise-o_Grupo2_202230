<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GPS TIO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/loader.css">

  </head>

  <body onload = "table();">
    <script typetable="text/javascript">
      function table(){
        const xhttp = new XMLHttpRequest();

        var x = "1";
        
        var id= x.toString();
        xhttp.open('POST', "system.php",true);

        //Send the proper header information along with the request
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {//Call a function when the state changes.
        if(xhttp.readyState == 4 && xhttp.status == 200) {
        

        const data = JSON.parse(xhttp.responseText);
          document.getElementById("table").innerHTML = data.map((element,  i) => {
            return "<tr><td>"+element.LATITUD+"</td><td>"+element.LONGITUD+"</td><td>"+element.TIMESTAMP+"</td></tr>";
          }).join("\n");

          if (data.length > 0) {
            const latest = data[data.length - 1];
            marker.setLatLng([latest.LATITUD, latest.LONGITUD]);
            points.push([latest.LATITUD, latest.LONGITUD]);
            poly.addLatLng([latest.LATITUD, latest.LONGITUD]);
          }
         }
        }
        xhttp.send("id=" + id);
        

      }

      setInterval(function(){
        table();
      }, 1000);
    </script>
  </body>

  <body onload = "table2();">
    <script typetable="text/javascript">
      function table2(){
        const xhttp = new XMLHttpRequest();
        var x = "2";
        var id= x.toString();
        xhttp.open('POST', "system.php",true);
      
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {//Call a function when the state changes.
        if(xhttp.readyState == 4 && xhttp.status == 200) {
        
        
          const data2 = JSON.parse(xhttp.responseText);
          document.getElementById("table2").innerHTML = data2.map((element2,  j) => {
            return "<tr><td>"+element2.LATITUD+"</td><td>"+element2.LONGITUD+"</td><td>"+element2.TIMESTAMP+"</td></tr>";
          }).join("\n");

          if (data2.length > 0) {
            const latest2 = data2[data2.length - 1];
            marker2.setLatLng([latest2.LATITUD, latest2.LONGITUD]);
            points3.push([latest2.LATITUD, latest2.LONGITUD]);
            poly3.addLatLng([latest2.LATITUD, latest2.LONGITUD]);
          }
      }
    }
    xhttp.send("id=" + id);
        
  }
      setInterval(function(){
        table2();
      }, 1000);
    </script>
  </body>

</html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page probing</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <h1 style="text-align:center;">GPS Camión</h1>
</head>
<body>

    <div id="myMap" style="height: 500px"></div>

<p></p>
<h2 style="text-align:center;">Ubicación actual</h2>   
<p></p>
<h3 style="text-align:center;">Camion 1:</h3>
<p></p>
    <div class="container" style="width:900px;"> 
    <table class="table table-bordered">
    <thead>
      <tr>
        <td>Latitud</td>
        <td>Longitud</td>
        <td>Timestamp</td>
        
      </tr>
    </thead>
    <tbody id="table">
    </tbody>
    </table>
    </div> 
<p></p>
<h3 style="text-align:center;">Camion 2:</h3>
<p></p>
    <div class="container" style="width:900px;"> 
    <table class="table table-bordered">
    <thead>
      <tr>
        <td>Latitud</td>
        <td>Longitud</td>
        <td>Timestamp</td>
        
      </tr>
    </thead>
    <tbody id="table2">
    </tbody>
    </table>
    </div>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
     integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
     crossorigin=""></script>
    <script src="map.js" typetable="text/javascript"></script>


   


<?php

include 'ejemplo.php';
?>


</body>
</html>