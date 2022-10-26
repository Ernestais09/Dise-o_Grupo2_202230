<?php    


 
 if(isset($_POST["latinit"], $_POST["latfin"],$_POST["lnginit"],$_POST["lngfin"]))  
 {  
      $connecte2 = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
      $queryi2 = "  
           SELECT * FROM usuario2  
           WHERE LATITUD BETWEEN '".$_POST["latinit"]."' AND '".$_POST["latfin"]."'  AND  LONGITUD BETWEEN '".$_POST["lnginit"]."' AND '".$_POST["lngfin"]."'
      ";  
      $resulta2 = mysqli_query($connecte2, $queryi2);  

      $arrayi2 = array();
     
           while($rows = mysqli_fetch_assoc($resulta2))  
           {  
              $arrayi2[] = $rows;
           }  
      echo json_encode($arrayi2);  
 }  
 ?>