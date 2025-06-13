<?php
// find-producto-pedido.php
$cantidadT=0;
$num_Cesta=0;
//echo "select id_cuenta,id_producto,cantidad,empaque,precio_producto from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'<br>";
$sqlProCestaData=mysqli_query($conex1,"select id_cuenta,id_producto,cantidad,empaque,precio_producto from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'");
$proCestaData=mysqli_fetch_array($sqlProCestaData);
if(isset($proCestaData))
{
 // T = de la Tabla cuenta2
 $id_cuenta=$proCestaData['id_cuenta'];
 $id_producto=$proCestaData['id_producto'];
 $Tcantidad=$proCestaData['cantidad'];
 $Tempaque=$proCestaData['empaque'];
 $Tprecio_producto=$proCestaData['precio_producto'];
 $num_Cesta=1;
}
?>
