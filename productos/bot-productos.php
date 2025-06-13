<?php
$sqlPR=mysqli_query($conex1,"select * from productos where id_producto='$id'");
$proData=mysqli_fetch_array($sqlPR);
$cod_producto=$proData['cod_producto'];
?>
