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
<h2>Remover Puntos Imagenes</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>nom Imagen Antes</th>
  <th class='ui blue'>nom Imagen Despues</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,codigo_barra,nom_producto,foto_producto from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $foto_producto=$proData['foto_producto'];

//-----------------------------------------

 $file_name= substr($foto_producto, 0 , (strrpos($foto_producto, ".")));
 $extension2 = substr(strrchr($foto_producto, '.'), 1);
 $extension = substr($foto_producto,-5);
//echo "<br>$foto_producto &#124;  $extension";
 if(substr($extension,0,2)=="..")
 {
   //$extension2 = substr(strrchr($nom_producto, '.'), 1);
   $fotoName = substr($foto_producto,0,-6);
   //$fileName=trim($fileName);
   $newName=trim($file_name)."".$extension2;
   echo "<tr>";
      echo "<td>$nom_producto</td>
      <td>$codigo_barra</td>
      <td>$file_name<br>$foto_producto</td>
      <td>$newName</td>
   </tr>";
   $query="update productos set foto_producto='$newName' where id_producto='$id_producto'";
  // $result1=mysqli_query($conex1,$query);
   $num++;
 }
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
