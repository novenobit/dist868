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
$tabs="S";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if(!isset($AreaProductos) or $AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$num=0;
$num2=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
$cod_empresa="supermariche";
?>


<h1>No Esta la Foto en Disco</h1>
<table class="ui unstackable celled very long scrolling table">
<thead>
 <tr>
  <th style='background-color:#336699;color:#fff;'>Producto</th>
  <th style='background-color:#336699;color:#fff;text-align:center;width:200px;'>Foto</th>
 </tr>
</thead>
<tbody>

<?php
$sqldata="select id_producto,codigo_barra,nom_producto,foto_producto from productos order by nom_producto";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $foto_producto=$proData['foto_producto'];
 if($foto_producto<>"")
 {
//Productos
   if(!file_exists("../imagenes/productos/$foto_producto"))
   {
       echo "<tr>
        <td style='background-color:#ffffff;color:#000000;'>
          <p><a href='FindImagesNotOnDisk2.php?cod=$codigo_barra'>$nom_producto<br>Codigo: $codigo_barra</a></p>
        </td>
        <td class='center aligned' style='background-color:#ffffff;color:#000000;text-align:center;width:200px;'>
          <p><a href='FindImagesNotOnDisk2.php?cod=$codigo_barra'>$foto_producto</a></p>
        </td>
       </tr>";
       $num++;
   }
 }
}
?>
</tbody></table>

<?php
if($num>0)
{
 echo "<h1>Total Fotos: $num Sin Datos: $num</h1>";
}
else
{
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
<br><br>
<?php
}
$showStatus="N";
//$endPage="N";
include("../includes/statusAdmin.php");
?>
