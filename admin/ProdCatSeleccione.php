<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<h2>Productos Sin Categoria</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='ui blue' class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>Precio Detal</th>
  <th class='ui blue'>Precio Mayor</th>
  <th class='ui blue'>Precio SuperMayor</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos where cod_categoria='seleccione' or cod_subcategoria='seleccione'";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $precio1_producto=$proData['precio1_producto'];
 $precio2_producto=$proData['precio2_producto'];
 $precio3_producto=$proData['precio3_producto'];
 echo "<tr>";
      echo "<td>{$proData['nom_producto']}</td>
      <td>{$proData['codigo_barra']}</td>
      <td>". number_format($precio1_producto,2,',', '.') . "</td>
      <td>". number_format($precio2_producto,2,',', '.') . "</td>
      <td>". number_format($precio3_producto,2,',', '.') . "</td>
   </tr>";
   $num++;
}
?>
</tbody></table>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total: $num</h1>";
   ?>
  </div>
  <div class="eight wide column">
   <a class="ui blue button" href="right-menu.php">
     <i class="left arrow icon"></i>
     Regresar
   </a>
  </div>
</div>
<?php
if($num>0)
{ exit(); }
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
