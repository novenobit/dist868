<?php
//Function Find_Proveedor_COD()
// global $conex1, $cod_proveedor, $proveedorData;
if(isset($cod_proveedor) and $cod_proveedor<>"")
{
 $sqlFTPV=mysqli_query($conex1,"select * from proveedor where cod_proveedor='$cod_proveedor'");
 $proveedorData=mysqli_fetch_array($sqlFTPV);
 mysqli_free_result($sqlFTPV);
}
//return $proveedorData;
?>
