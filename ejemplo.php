<?php  
 $connect = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
 $query = "SELECT * FROM usuario ORDER BY TIMESTAMP ASC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>   
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
           <h2 align="center">Donde estuvo?</h2> 
           <h3 align="center">Seleccione la fecha de inicio y la fecha final a consultar</h3>
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="Filtrar" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  

                <div class="container" style="width:900px;"> 

    <div class="container" style="width:900px;"> 
    <h2 align="center">Cuando estuvo?</h2> 
    <h3 align="center">Seleccione la ubicacion en el mapa a consultar</h3>
    <table class="table table-bordered">

           </div>  
      </body>  

    

 </html>  
 <script>  
      $(document).ready(function(){  
          // $.datepicker.setDefaults({  
          //      dateFormat: 'yy-mm-dd '   
         //  });  
         //  $(function(){  
         //       $("#from_date").datepicker(); 
         //       $("#to_date").datepicker();  
         //  });  
           $('#filter').click(function(){  

                var from_date = $('input[name=from_date]').val();  
                var to_date = $('input[name=to_date]').val();

                if (poly2) {
                    myMap.removeLayer(poly2);
                    poly2 = undefined;
               }

                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  

                              const dato = JSON.parse(data);

                              document.getElementById("order_table").innerHTML = dato.map((element) => {
                              return "<tr><td>"+element.LATITUD+"</td><td>"+element.LONGITUD+"</td><td>"+element.TIMESTAMP+"</td></tr>";
                              
                               }).join("\n");  
                               
                               console.log(document.getElementById("order_table").innerHTML)
                               //[[0, 2], [32, 2]]
                              points2 = dato.map((element) => [element.LATITUD, element.LONGITUD]);
                               
                             
                               poly2 = L.polyline(points2,{color:'red',opacity:1}).addTo(myMap);
                               
                               
     
                              //$('#order_table').html(data); 
   
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  

                
           });  
      });  

     


      
 </script> 

