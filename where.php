<?php  
 //filter.php  


 
 if(isset($_POST["latinit"], $_POST["latfin"],$_POST["lnginit"],$_POST["lngfin"],$_POST["id"]))  
 {  
      $connecte = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
     // $output = '';  
      $queryi = "  
           SELECT * FROM usuario  
           WHERE LATITUD BETWEEN '".$_POST["latinit"]."' AND '".$_POST["latfin"]."'  AND  LONGITUD BETWEEN '".$_POST["lnginit"]."' AND '".$_POST["lngfin"]."'
           AND  ID='".$_POST["id"]."'
      ";  
      $resulta = mysqli_query($connecte, $queryi);  

      $arrayi = array();
     
       //$output .= '  
      //     <table class="table table-bordered">  
      //          <tr>  
      //          <th width="15%">Latitud</th>  
      //          <th width="15%">Longitud</th>  
      //          <th width="10%">Timestamp</th>  
      //          <th width="20%">Fecha</th> 
      //          </tr>  
      //';  
      //if(mysqli_num_rows($resulta) > 0)  
     // {  
           while($rows = mysqli_fetch_assoc($resulta))  
           {  
              $arrayi[] = $rows;
           }  
     // }  
       
     // $output .= '</table>';  
      echo json_encode($arrayi);  
 }  
 ?>