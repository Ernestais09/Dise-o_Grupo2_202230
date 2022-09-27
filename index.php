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
        xhttp.onload = function(){
          const data = JSON.parse(this.responseText);
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
        xhttp.open("GET", "system.php");
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
    <h1 style="text-align:center;">GPS Camión</h1>
    <div id="myMap" style="height: 500px"></div>
    <p>
    <h2 style="text-align:center;">Ubicación actual</h2>
    <p>
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
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
     integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
     crossorigin=""></script>
    <script src="map.js"></script>


   
 <!--   <section>
          <div class="container">
            <div class="row">
              
              <div class="col-md-12 text-center mt-5">
                <form action="filtro.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <input type="datetime-local" @bind="datestr" step="1" name="fecha_ingreso" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col">
                      <span class="btn btn-dark mb-2" id="filtro">Filtrar</span>
                      
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-12 text-center mt-5">     
                <span id="loaderFiltro">  </span>
              </div>
              
              
             <div class="table-responsive resultadoFiltro">
               <table class="table table-hover" id="tableEmpleados">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">LATITUD</th>
                    <th scope="col">LONGITUD</th>
                    <th scope="col">TIMESTAMP</th>
                    <th scope="col">FECHA</th>
                    
                  </tr>
                </thead>
                <tbody id="table1">
               </tbody>
              </table> 
              </div>  

             </div>
          </div>
      </section>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script> 

  
     <script>
 
  $(function() {
     setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_ingreso = $('input[name=fecha_ingreso]').val();
  var f_fin = $('input[name=fechaFin]').val();
  console.log(f_ingreso + '' + f_fin);

  if(f_ingreso !="" && f_fin !=""){
    $.post("config.php", {f_ingreso, f_fin}, function (data) {


      
      $("#tableEmpleados").hide();
     $(".resultadoFiltro").html(data);
      //$(".resultadoFiltro").html('<table class="table table-hover"><thead><tr><th scope="col">#</th><th scope="col">LATITUD</th><th scope="col">LONGITUD</th><th scope="col">TIMESTAMP</th><th scope="col">FECHA</th></tr></thead><tbody id="table1"></tbody></table>'
      loaderF(false);
    });  
  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>   -->

<?php

include 'ejemplo.php';

?>

</body>
</html>