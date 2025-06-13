<?php
$sqlNumFac=mysqli_query($conex1,"select numfactura from ventas order by id_venta desc limit 1");
$ventaNumFac=mysqli_fetch_array($sqlNumFac);
if(isset($ventaNumFac))
{ $numfactura=$ventaNumFac['numfactura']+1;
  mysqli_free_result($sqlNumFac);
}
if(empty($numfactura) or $numfactura<='100')
{ $numfactura="10001"; }
$numFilas=0;
$ventaNumFac2=mysqli_query($conex1, "select id_venta from ventas where numfactura='$numfactura'");
$numFilas=mysqli_num_rows($ventaNumFac2);
if($numFilas>0)
{
 $error="Error en los Datos del Numero de la Factura<br>Puede repara la base de datos en el Panel de Control";
 error();
 exit();
}
return $numfactura;
?>
