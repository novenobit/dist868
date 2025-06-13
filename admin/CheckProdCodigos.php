<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  CheckProdRepetido.php                                     //
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
if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(!isset($op))
{ $op=""; }
// ----------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<h2>Productos Repetidos</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='ui blue' style="width:100px">id</th>
  <th class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>Codigo Barra</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,cod_producto,codigo_barra,nom_producto from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $cod_producto=$proData['cod_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
// Data 1----------------------------------
 echo "<tr>
      <td style='width:100px'>$id_producto</td>
      <td>$nom_producto</td>
      <td>$cod_producto</td>
      <td>$codigo_barra</td>
 </tr>";
 if($codigo_barra<>"")
 {
  if($cod_producto=="" or $cod_producto<>$codigo_barra)
  {
    $query="update productos set cod_producto='$codigo_barra' where id_producto='$id_producto'";
    $result1=mysqli_query($conex1,$query);
    $num++;
  }
 }
}
?>
</tbody></table>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total Cambios: $num</h1>";
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
{
 $sql1="repair table productos";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 exit();
}
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
