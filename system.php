<?php
$conn = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");
$rows = mysqli_query($conn, "SELECT * FROM usuario");
$arr = array();

while ($row = mysqli_fetch_assoc($rows)) {
  $arr[] = $row;
}

echo json_encode($arr);
?>