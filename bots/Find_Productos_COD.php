<?php
// Function Find_Productos_COD()
//{
// global $conex1, $cod_producto, $proData;
if(isset($cod_producto) and $cod_producto<>"")
{
 $numFPCod=mysqli_query($conex1,"select * from productos where cod_producto='$cod_producto'");
 $proData=mysqli_fetch_array($numFPCod);
 mysqli_free_result($numFPCod);
} 
// return $proData;
// exit();
?>
