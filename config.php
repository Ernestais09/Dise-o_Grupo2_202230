<?php
/**conexion a BD */
require __DIR__. '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$usuario  =  $_ENV['USUARIO'];
$password =  $_ENV['PASSWORD'];
$servidor =  $_ENV['SERVIDOR'];
$basededatos =  $_ENV['BASEDATOS'];
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($con,"SET SESSION collation_connection ='utf8mb4_0900_ai_ci'");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


?>