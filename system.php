<?php
if(isset($_POST["id"]))  
{ 
$conn = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");
$rows = mysqli_query($conn, "SELECT * FROM usuario WHERE ID='".$_POST["id"]."' ORDER BY TIMESTAMP DESC LIMIT 1" );
$arr = array();



while ($row = mysqli_fetch_assoc($rows)) {
  $arr[] = $row;
}

echo json_encode($arr);
}
?>