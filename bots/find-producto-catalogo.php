<?php
// find-producto-cesta.php
$cantidadT=0;
$num_Cesta=0;
$sqlProCestaData=mysqli_query($conex1,"select * from catalogos2 where idcatalgo='$idcatalgo' and id_producto='$id_producto'");
$proCestaData=mysqli_fetch_array($sqlProCestaData);
if(isset($proCestaData))
{
 // T = de la Tabla cuenta2
 $id_cuenta=$proCestaData['id_cuenta'];
 $idcatalgo=$proCestaData['idcatalgo'];
 $id_producto=$proCestaData['id_producto'];
 $Tcantidad=$proCestaData['cantidad'];
 $Tempaque=$proCestaData['empaque'];
 $Tprecio_producto=$proCestaData['precio_producto'];
 $Tnota_extra=$proCestaData['nota_extra'];
 $num_Cesta=1;
}
?>
