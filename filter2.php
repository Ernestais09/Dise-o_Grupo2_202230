<?php   
 



 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect2 = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
     // $output = '';  
      $query2 = "  SELECT * FROM usuario2  WHERE TIMESTAMP BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  ";  
      $result2 = mysqli_query($connect2, $query2);  

      $array2 = array();
      //$output .= '  
      //     <table class="table table-bordered">  
      //          <tr>  
      //          <th width="15%">Latitud</th>  
      //          <th width="15%">Longitud</th>  
      //          <th width="10%">Timestamp</th>  
      //          <th width="20%">Fecha</th> 
      //          </tr>  
      //';  
  
           while($row = mysqli_fetch_assoc($result2))  
           {  
              //  $output .= '  
              //       <tr>  
              //           
              //            <td>'. $row["LATITUD"] .'</td>  
              //            <td>'. $row["LONGITUD"] .'</td>  
              //            <td>'. $row["TIMESTAMP"] .'</td>  
              //            <td>'. $row["FECHA"] .'</td>  
              //       </tr>  
              //  ';  
              $array2[] = $row;
           }  
        
       
      
     // $output .= '</table>';  
      echo json_encode($array2);  
 }  
 ?>