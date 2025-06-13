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
?>
<table class='ui unstackable celled table' style='width:100%'>
 <tr>
  <td style="background-color:#149e53;color:#ffffff;">5 Ultimos Usuarios</td>
 </tr>
<?php
 $sql=mysqli_query($conex1,"select iduser,cid_usuario,nombre,apellido from usuarios where activo='S' order by iduser desc limit 5");
 while($usuarioData=mysqli_fetch_array($sql))
 {
   $iduser=$usuarioData['iduser'];
   $cid_usuario=$usuarioData['cid_usuario'];
   $nombreUser=$usuarioData['nombre']." ".$usuarioData['apellido'];
   echo "<tr>
   <td>
   <a href='usuario-ver.php?op=cl&iduser=$iduser'>$nombreUser $cid_usuario</a>
  </td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
