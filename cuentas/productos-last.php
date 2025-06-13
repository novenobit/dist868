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

//include("find-products.php");
?>
<style>
table tr th{
  background-color:#6a49fa;
  color:#e6e1fe;
  text-align:left;
  vertical-align:center;
  padding: 4px;
}

table tr:nth-child(even){
  background-color: #e6e1fe;
  padding: 4px;
}
</style>

<table style='width:100%;'>
  <thead>
    <tr>
      <th style='text-align:left;'>Producto</th>
      <th style='text-align:center;'>Ref</th>
      <th style='text-align:center;'>Fecha</th>
    </tr>
  </thead>
  <tbody>
<?php
 $sql=mysqli_query($conex1,"select id_producto,nom_producto,precio2_producto,submitted from productos where activo='S' order by id_producto desc limit 15");
 while($proData=mysqli_fetch_array($sql))
 {
   $id_producto=$proData['id_producto'];
   $nomProducto=$proData['nom_producto'];
   //$codigo_barra=$proData['codigo_barra'];
   $precio2_producto=$proData['precio2_producto'];
   $submitted=$proData['submitted'];
   echo "<tr><td>$nomProducto</td>
   <td style='text-align:right;'>$precio2_producto</td>
   <td style='text-align:center;'>$submitted</td></tr>";
 }
?>
   </tbody>

</table>

<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
