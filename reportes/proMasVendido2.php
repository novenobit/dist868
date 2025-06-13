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
FechayHora();
$submitted=$hoydia;
?>
<h4>Productos Mas Vendido</h4>
<?php
$reg=0;
$num=0;
$Ttotal=0;
$numFilas=0;
?>

<table class='ui celled table'>
 <thead>
  <tr><th class='black center aligned'>Imagen</th>
  <th class='black'>Producto</th>
  <th class='black center aligned'>Ventas</th>
 </tr class='black center aligned'></thead>
 <tbody>
<?php
$sqlPro=mysqli_query($conex1,"select * from promadvendido order by cantidad desc");
while($proData=mysqli_fetch_array($sqlPro))
{
  $cod_producto=$proData['cod_producto'];
  $codigo_barra=$proData['codigo_barra'];
  $nom_producto=$proData['nom_producto'];
  $foto_producto=$proData['foto_producto'];
  $cantidad=$proData['cantidad'];
  echo "<tr>
    <td class='center aligned'><img class='ui small centered image' src='$dirRoot"."imagenes/productos/$foto_producto'></td>
    <td>$nom_producto<br>Codigo Barra: $codigo_barra</td>
    <td class='center aligned'>$cantidad</td>
  </tr>";
  $num++;
}
if($num==0)
{
  echo "<h2>No Hay Datos</h2>";
}
?>
</tbody
</table>
