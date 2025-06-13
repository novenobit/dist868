<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  CheckProdRepetido0.php                                     //
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
  <th class='ui blue'>Precio Detal</th>
  <th class='ui blue'>Precio Mayor</th>
  <th class='ui blue'>Precio SuperMayor</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $precio1_producto=$proData['precio1_producto'];
 $precio2_producto=$proData['precio2_producto'];
 $precio3_producto=$proData['precio3_producto'];
//echo "<br>$id_producto &#124; $codigo_barra &#124; $nom_producto";
 $rest1=substr($codigo_barra, 0, 1);
 if($rest1==0)
 {
  $rest2=substr($codigo_barra, 1);
  $numFilas1=0;

  $sql2=mysqli_query($conex1, "select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos where codigo_barra='$rest2' and id_producto<>'$id_producto'");
  $numFilas1=mysqli_num_rows($sql2);
  if($numFilas1>0)
  {
    $proData2=mysqli_fetch_array($sql2);
    $id_producto2=$proData2['id_producto'];
    $codigo_barra=$proData2['codigo_barra'];
    $nom_producto=$proData2['nom_producto'];
    $precio1_producto=$proData2['precio1_producto'];
    $precio2_producto=$proData2['precio2_producto'];
    $precio3_producto=$proData2['precio3_producto'];

   echo "<tr>
      <td style='width:100px'>$id_producto</td>
      <td>$nom_producto</td>
      <td>$codigo_barra</td>
      <td>". number_format($precio1_producto,2,',', '.') . "</td>
      <td>". number_format($precio2_producto,2,',', '.') . "</td>
      <td>". number_format($precio3_producto,2,',', '.') . "</td>
   </tr>";

    echo "<tr style='background-color: #D6EEEE;'>
      <td style='width:100px'>{$proData2['id_producto']}</td>
      <td>{$proData2['nom_producto']}</td>
      <td>{$proData2['codigo_barra']}</td>
      <td>". number_format($precio1_producto,2,',', '.') . "</td>
      <td>". number_format($precio2_producto,2,',', '.') . "</td>
      <td>". number_format($precio3_producto,2,',', '.') . "</td>
    </tr>";
    if($op=="del")
    {
      $sqldel="delete from productos where id_producto='$id_producto2'";
      $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
    }
    $num++;
  }
 }

//-------------------------------
 if($codigo_barra<>"")
 {
  $numFilas1=0;
  $sql2=mysqli_query($conex1, "select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto from productos where codigo_barra='$codigo_barra' and id_producto<>'$id_producto'");
  $numFilas1=mysqli_num_rows($sql2);
  if($numFilas1>0)
  {
   echo "<tr>
      <td style='width:100px'>{$proData['id_producto']}</td>
      <td>{$proData['nom_producto']}</td>
      <td>{$proData['codigo_barra']}</td>
      <td>". number_format($precio1_producto,2,',', '.') . "</td>
      <td>". number_format($precio2_producto,2,',', '.') . "</td>
      <td>". number_format($precio3_producto,2,',', '.') . "</td>
   </tr>";
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
    if($num>0)
    {
     echo "<a class='ui red button' href='CheckProdRepetido0.php?op=del'>Borrar Datos</a>";
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
