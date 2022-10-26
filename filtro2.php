<?php
sleep(1);
include('config.php');

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqldatosgps = ("SELECT * FROM usuario2 WHERE `TIMESTAMP` BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY FECHA ASC");
$query2 = mysqli_query($con2, $sqldatosgps);
$total   = mysqli_num_rows($query2);
echo '<strong>Total: </strong> ('. $total .')';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">LATITUD</th>
            <th scope="col">LONGITUD</th>
            <th scope="col">TIMESTAMP</th>
            <th scope="col">FECHA</th>
            
        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query2)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dataRow['LATITUD']; ?></td>
                <td><?php echo $dataRow['LONGITUD']; ?></td>
                <td><?php echo $dataRow['TIMESTAMP']; ?></td>
                <td><?php echo $dataRow['FECHA']; ?></td>
               
            </tr>
        </tbody>
    <?php } ?>
</table>