<?php
/**conexion a BD */
$usuario  = "ricardo";
$password = "ricardorobot22";
$servidor = "datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com";
$basededatos = "datosgps";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($con,"SET SESSION collation_connection ='utf8mb4_0900_ai_ci'");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


?>