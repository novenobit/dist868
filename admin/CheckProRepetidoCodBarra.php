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

<h2>Productos Repetidos Por Codigo de Barra</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='ui blue' style="width:100px">id</th>
  <th class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>Precio Detal</th>
  <th class='ui blue'>Precio Mayor</th>
  <th class='ui blue'>Precio SuperMayor</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $cod_producto=$proData['cod_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $precio1_producto=$proData['precio1_producto'];
 $precio2_producto=$proData['precio2_producto'];
 $precio3_producto=$proData['precio3_producto'];

 $numFilas2=0;
 $sql2=mysqli_query($conex1, "select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos where codigo_barra='$codigo_barra' and id_producto<>'$id_producto'");
 $numFilas2=mysqli_num_rows($sql2);
 if($numFilas2>0)
 {
   $proData2=mysqli_fetch_array($sql2);
   $D2id_producto2=$proData2['id_producto'];
   $D2codigo_barra=$proData2['codigo_barra'];
   $D2nom_producto=$proData2['nom_producto'];
   $D2precio1_producto=$proData2['precio1_producto'];
   $D2precio2_producto=$proData2['precio2_producto'];
   $D2precio3_producto=$proData2['precio3_producto'];
// Data 1----------------------------------
   echo "<tr>
      <td style='text-align:center;width:100px;'>$id_producto</td>
      <td>$nom_producto</td>
      <td style='text-align:center;'>$codigo_barra</td>
      <td style='text-align:center;'>". number_format($precio1_producto,2,',', '.') . "</td>
      <td style='text-align:center;'>". number_format($precio2_producto,2,',', '.') . "</td>
      <td style='text-align:center;'>". number_format($precio3_producto,2,',', '.') . "</td>
   </tr>";
// Data 2----------------------------------
   echo "<tr style='background-color: #D6EEEE;'>
      <td style='text-align:center;width:100px;'>$D2id_producto2</td>
      <td>$D2nom_producto</td>
      <td style='text-align:center;'>$D2codigo_barra</td>
      <td style='text-align:center;'>". number_format($D2precio1_producto,2,',', '.') . "</td>
      <td style='text-align:center;'". number_format($D2precio2_producto,2,',', '.') . "</td>
      <td style='text-align:center;'>". number_format($D2precio3_producto,2,',', '.') . "</td>
   </tr>";
   if($op=="del")
   {
      $sqldel="delete from productos where id_producto='$D2id_producto2'";
      $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
   }
   $num++;
 }

}
?>
</tbody></table>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total Cambios: $num</h1>";
    if($num>0)
    {
     echo "<a class='ui red button' href='CheckProRepetidoCodBarra.php?op=del'>Borrar Datos</a>";
    }
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
