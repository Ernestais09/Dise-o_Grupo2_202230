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
          <h2 align="center">Que camión?</h2> 
          <h3 align="center">Seleccione el vehiculo a consultar</h3>

          <label for="pet-select">Escoja un vehiculo:</label>

          <select name="vehiculo" id="mySelect">
          
           <option value="1">Vehiculo 1</option>
           <option value="2">Vehiculo 2</option>
           <option value="3">Todos</option>
          </select>

           
          <h2 align="center">Donde estuvo?</h2> 
          <h3 align="center">Seleccione la fecha de inicio y la fecha final a consultar</h3>
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="datetime-local" @bind="datestr" step="1" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="Filtrar" id="filter" value="Filtar" class="btn btn-info" />  

                     <input type="button" name="Borrar" id="Borrar" value="Borrar" class="btn btn-info" /> 
                </div>  
                
                <div style="clear:both"></div>                 
                <br /> <br />  

                

          
           <h2 align="center">Cuando estuvo?</h2> 
           <h3 align="center">Seleccione la ubicacion en el mapa a consultar</h3>
          <table class="table table-bordered">

           </div>  
      </body>  

    

 </html>  
 <script typetable="text/javascript">  
      
      
      
      $(document).ready(function(){
           
           $('#filter').click(function(){  
              var x = document.getElementById("mySelect").value;  
           
           console.log("filtro");
                var from = document.getElementById("from_date").value; 
                var to = document.getElementById("to_date").value; 
                var from_date= from.toString();
                var to_date = to.toString();
                var id = x.toString();

                
                

                if (poly2) {
                    myMap.removeLayer(poly2);
                    poly2 = undefined;
               }

               if (poly4) {
                    myMap.removeLayer(poly4);
                    poly4 = undefined;
               }

                if(from_date != '' && to_date != '')  
                {  

                    if(id!=3){
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date,to_date:to_date,id:id},  
                          success:function(data)  
                          {   console.log(id);
                              console.log(data);
                              const dato = JSON.parse(data);
                              
                              points2 = dato.map((element) => [element.LATITUD, element.LONGITUD]);
                               
                             
                              poly2 = L.polyline(points2,{color:'black',opacity:1}).addTo(myMap);
                               
                               
     
                              //$('#order_table').html(data); 


                              
                          }  
                     });
                    }
                    
                     if(id==3){

                    
                          $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          
                          data:{from_date:from_date,to_date:to_date,id:1},  
                          success:function(data)  
                          {   
                              console.log(data)
                              const dato = JSON.parse(data);
                               
                              points4 = dato.map((element) => [element.LATITUD, element.LONGITUD]);
                              poly4 = L.polyline(points4,{color:'blue',opacity:1}).addTo(myMap);
                         
                          }  
                     });

                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          
                          data:{from_date:from_date,to_date:to_date,id:2},  
                          success:function(data)  
                          {   
                              console.log(data)
                              const dato = JSON.parse(data);
                               
                              points2 = dato.map((element) => [element.LATITUD, element.LONGITUD]);
                              poly2 = L.polyline(points2,{color:'red',opacity:1}).addTo(myMap);
                         
                          }  
                     });

                     
                    

                   
                    

                    }  

                    
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  

                
           });  

           $('#Borrar').click(function(){

               if (poly2) {
                    myMap.removeLayer(poly2);
                    poly2 = undefined;
               }

               if (poly4) {
                    myMap.removeLayer(poly4);
                    poly4 = undefined;
               }
          });    
      });  

     


      
 </script> 

