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
$numCambios=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>
<h2>Productos Precios</h2>
<table class="ui unstackable celled very long scrolling table">
<thead>
 <tr>
  <th class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>Precio Detal</th>
  <th class='ui blue'>Precio Mayor</th>
  <th class='ui blue'>Precio SuperMayor</th>
  <th class='ui blue'>Precio Especial</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select id_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $precio1_producto=$proData['precio1_producto'];
 $precio2_producto=$proData['precio2_producto'];
 $precio3_producto=$proData['precio3_producto'];
 $precio4_producto=$proData['precio4_producto'];

//---------------------------------------------------------------------------
  $numFilas=0;
  $sql2=mysqli_query($conex1,"select * from proprecios where codigo_barra='$codigo_barra'");
  $numFilas=mysqli_num_rows($sql2);
  if($numFilas>0)
  {
   $proData2=mysqli_fetch_array($sql2);
   $Nnom_producto=$proData2['nom_producto'];
   $Nprecio1_producto=$proData2['precio3_producto'];
   $Nprecio2_producto=$proData2['precio2_producto'];
   $Nprecio3_producto=$proData2['precio1_producto'];
   if(isset($proData2['precio4_producto']))
   { $Nprecio4_producto=$proData2['precio4_producto']; }
   else
   { $Nprecio4_producto=0; }
   echo "<tr>";
      echo "<td>$nom_producto</td>
      <td>$codigo_barra</td>
      <td>". number_format($Nprecio1_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio2_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio3_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio4_producto,2,',', '.') . "</td>
   </tr>";
   echo "<tr class='ui inverted yellow'>";
      echo "<td>$Nnom_producto</td>
      <td>$codigo_barra</td>
      <td>". number_format($Nprecio1_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio2_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio3_producto,2,',', '.') . "</td>
      <td>". number_format($Nprecio4_producto,2,',', '.') . "</td>
   </tr>";
   //-----------------------------------------------------

     if($Nnom_producto<>$nom_producto)
     {
          $query2="update productos set nom_producto='$Nnom_producto' where id_producto='$id'";
          //echo "<br>".$query2;
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Nombre";
     }
   //-----------------------------------------------------


   if($Nprecio1_producto>0 and $Nprecio2_producto>0 and $Nprecio3_producto>0)
   {
     if($precio1_producto<>$Nprecio1_producto)
     {
          $query2="update productos set precio1_producto='$Nprecio1_producto' where id_producto='$id'";
          //echo "<br>".$query2;
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio1";
     }
     if($precio2_producto<>$Nprecio2_producto)
     {
          $query2="update productos set precio2_producto='$Nprecio2_producto' where id_producto='$id'";
          //echo "<br>".$query2;
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio2";
     }
     if($precio3_producto<>$Nprecio3_producto)
     {
          $query2="update productos set precio3_producto='$Nprecio3_producto' where id_producto='$id'";
          //echo "<br>".$query2;
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio3";
     }
     if($precio4_producto<>$Nprecio4_producto and $Nprecio4_producto>0)
     {
          $query2="update productos set precio4_producto='$Nprecio4_producto' where id_producto='$id'";
          //echo "<br>".$query2;
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio4";
     }
   }
   //-----------------------------------------------------
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
