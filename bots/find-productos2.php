<?php
//include("$dirRoot"."bots/find-productos2.php");
if(isset($codPro) and $codPro<>"")
{
   $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,foto_producto from productos where cod_producto='$codPro'");
   $proData=mysqli_fetch_array($sqlProData);
   if(isset($proData))
   {
    $id_producto=$proData['id_producto'];
    $codProducto=$proData['cod_producto'];
    $nomProducto=$proData['nom_producto'];
    $precio1_producto=$proData['precio1_producto'];
    $precio2_producto=$proData['precio2_producto'];
    $precio3_producto=$proData['precio3_producto'];
    $precio4_producto=$proData['precio4_producto'];
    $fotoProducto=$proData['foto_producto'];
    if($fotoProducto=="")
    { $fotoProducto="sinfoto.png"; }
   }
}
?>
