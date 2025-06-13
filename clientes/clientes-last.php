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
include("submenu-buscar.php");
?>

<table class='ui unstackable celled table' style='width:100%'>
 <tr>
  <td style="background-color:#1549e6;color:#ffffff;">10 Ultimos Clientes</td>
 </tr>
<?php
$sql=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente from clientes where activo='S' order by id_cliente desc limit 10");
while($clienteData=mysqli_fetch_array($sql))
{
 echo "<tr>
  <td>
  <a href='goto-page.php?id={$clienteData['id_cliente']}'>{$clienteData['nom_cliente']} / {$clienteData['cid_cliente']}</a></td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
