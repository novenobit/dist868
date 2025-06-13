<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

include("find-products.php");
?>
<table class='ui unstackable celled table' style='width:100%'>
 <tr>
  <td  style='background-color:#2f50c1;color:#ffffff;width:200px'>15 Ultimos Productos</td>
 </tr>
<?php
 $sql=mysqli_query($conex1,"select id_producto,nom_producto,precio1_producto,submitted from productos where activo='S' order by id_producto desc limit 15");
 while($proData=mysqli_fetch_array($sql))
 {
        $id_producto=$proData['id_producto'];
        $nomProducto=$proData['nom_producto'];
        //$codigo_barra=$proData['codigo_barra'];
        $precio1_producto=$proData['precio1_producto'];
        $submitted=$proData['submitted'];
   echo "<tr>
   <td>
   <a href='goto-page.php?id=$id_producto'>$nomProducto / $precio1_producto / $submitted</a>
  </td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
