<?php
$conn = mysqli_connect("datosgps.cbh1dasavvq2.us-east-1.rds.amazonaws.com", "ricardo", "ricardorobot22", "datosgps");
$rows = mysqli_query($conn, "SELECT * FROM usuario");
?>
<table border = 1 cellpadding = 10>
  <tr>
    <td>#</td>
    <td>Latitud</td>
    <td>Longitud</td>
    <td>Timestamp</td>
    <td>Fecha</td>
  </tr>
  <?php $i = 1; ?>
  <?php foreach($rows as $row) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row["LATITUD"]; ?></td>
      <td><?php echo $row["LONGITUD"]; ?></td>
      <td><?php echo $row["TIMESTAMP"]; ?></td>
      <td><?php echo $row["FECHA"]; ?></td>
    </tr>
  <?php endforeach; ?>
</table>