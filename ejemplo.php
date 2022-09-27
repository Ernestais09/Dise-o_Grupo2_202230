<?php  
 $connect = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
 $query = "SELECT * FROM usuario ORDER BY TIMESTAMP ASC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Consulta de historicos por fecha</h2>
                <h3 align="center">Seleccione la fecha de inicio y la fecha final a consultar</h3>
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
             <!--   <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                                
                               <th width="15%">Latitud</th>  
                               <th width="15%">Longitud</th>  
                               <th width="10%">Timestamp</th>  
                               <th width="20%">Fecha</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                                
                               <td><?php echo $row["LATITUD"]; ?></td>  
                               <td><?php echo $row["LONGITUD"]; ?></td>  
                               <td><?php echo $row["TIMESTAMP"]; ?></td>  
                               <td><?php echo $row["FECHA"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  -->

                <div class="container" style="width:900px;"> 
    <table class="table table-bordered">
    <thead>
      <tr>
        <!--<td>#</td>-->
        <td>Latitud</td>
        <td>Longitud</td>
        <td>Timestamp</td>
        
      </tr>
    </thead>
    <tbody id="order_table">
    </tbody>
    </table>
    </div> 

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

                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                              
                              const dato = JSON.parse(data);

                              document.getElementById("order_table").innerHTML = dato.map((element,  i) => {
                              return "<tr><td>"+element.LATITUD+"</td><td>"+element.LONGITUD+"</td><td>"+element.TIMESTAMP+"</td></tr>";
                               }).join("\n");  

                              if (dato.length > 0) {
                                const latest = dato[dato.length - 1];
                               marker.setLatLng([latest.LATITUD, latest.LONGITUD]);
                                myMap.setView([latest.LATITUD, latest.LONGITUD]);
                               points2.push([latest.LATITUD, latest.LONGITUD]);
                                poly2.addLatLng([latest.LATITUD, latest.LONGITUD]);
                              } 
     
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