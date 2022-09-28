<?php  
 //filter.php  


 
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");  
     // $output = '';  
      $query = "  
           SELECT * FROM usuario  
           WHERE TIMESTAMP BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  

      $array = array();
      //$output .= '  
      //     <table class="table table-bordered">  
      //          <tr>  
      //          <th width="15%">Latitud</th>  
      //          <th width="15%">Longitud</th>  
      //          <th width="10%">Timestamp</th>  
      //          <th width="20%">Fecha</th> 
      //          </tr>  
      //';  
  
           while($row = mysqli_fetch_assoc($result))  
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
              $array[] = $row;
           }  
        
       
      
     // $output .= '</table>';  
      echo json_encode($array);  
 }  
 ?>