<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Real Time Data Display</title>
  </head>

  <body onload = "table();">
    <script type="text/javascript">
      function table(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          const data = JSON.parse(this.responseText);
          document.getElementById("table").innerHTML = data.map((element,  i) => {
            return "<tr><td>"+i+"</td><td>"+element.LATITUD+"</td><td>"+element.LONGITUD+"</td><td>"+element.TIMESTAMP+"</td><td>"+element.FECHA+"</td></tr>";
          }).join("\n");

          if (data.length > 0) {
            const latest = data[data.length - 1];
            marker.setLatLng([latest.LATITUD, latest.LONGITUD]);
            myMap.setView([latest.LATITUD, latest.LONGITUD]);
            points.push([latest.LATITUD, latest.LONGITUD]);
            poly.addLatLng([latest.LATITUD, latest.LONGITUD]);
          }
        }
        xhttp.open("GET", "/WebApp/system.php");
        xhttp.send();
      }

      setInterval(function(){
        table();
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
</head>
<body>
    
    <div id="myMap" style="height: 500px"></div>
    <table style="border:1;cellpadding:10;">
    <thead>
      <tr>
        <td>#</td>
        <td>Latitud</td>
        <td>Longitud</td>
        <td>Timestamp</td>
        <td>Fecha</td>
      </tr>
    </thead>
    <tbody id="table">
    </tbody>
    </table>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
     integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
     crossorigin=""></script>
    <script src="map.js"></script>
</body>
</html>