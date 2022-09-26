<?php
    include 'buscador.php';
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <body>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">  <!--cuando le damos enviar se recarga la misma pagina-->
            <label>latitud</label>
            <input type="text" name="latitud">
            <label>longitud</label>
            <input type="text" name="longitud">
            <br>
            <input type="submit" name="enviar" value="buscar">


        </form>
    <br><br><br>
        <?php
        if (isset($_POST['enviar'])) {
            $latitud= $_POST['latitud'];
            $longitud=$_POST['longitud'];
            
/*
            $consulta = $con->query("SELECT * FROM data_mundo WHERE nombre  LIKE '%$busqueda%'"); 
            while ($row = $consulta->fetch_array()) {
                echo $row['latitud'] . '<br>';
 
 
                
            }
 
 */
    }
             
             
    if (empty($_POST['latitud'])&& empty($_POST['longitud'])) {   //caso si latitud y longitud estan vacios
            echo 'inserte valores validos de longitud y latitud';
                    
                
        
            
        }
        else{
            
            if(empty($_POST['latitud'])){
                echo 'inserte el valor de latitud';
                
          
            }if(empty($_POST['longitud'])){
            echo 'inserte el valor de longitud';
        }if(!empty($_POST['latitud'])&& !empty($_POST['longitud'])){  //casi si no esta vacio ni latitud ni longitud
            $consulta =$con->query("SELECT *FROM data_mundo WHERE longitud LIKE '%$longitud%'AND latitud LIKE '%$latitud%'");
            while ($row = $consulta->fetch_array()) {
                echo $row['nombre'] . '<br>';
            }
        }
        
        }
        
        

        ?>
    </body>
</html>
