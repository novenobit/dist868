<?php
$numventas=0;
$result=mysqli_query($conex1,"select * from ventas where cid_cliente='$cid_cliente'");
$numventas=mysqli_num_rows($result);
?>
