<?php
$conn = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");
$rows = mysqli_query($conn, "SELECT * FROM usuario2 ORDER BY TIMESTAMP  DESC LIMIT 1" );
$arr2 = array();



while ($row = mysqli_fetch_assoc($rows)) {
  $arr2[] = $row;
}

echo json_encode($arr2);
?>