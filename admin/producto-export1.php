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
echo "<h2>Exporta Productos a Excel</h2>";

include_once("../libs1/loader.php");

FechayHora();
$todobien='N';
$query2=mysqli_query($conex1,"select id_producto from productos limit 2");
$num_filas=mysqli_num_rows($query2);
if($num_filas==0)
{
 echo "<br><br>";
 $error="<br>No Hay Datos<br><br>";
 error();
 exit();
}
else
{
 echo "<html><meta http-equiv=refresh content=0;url=producto-export2.php>";
 $todobien="S";
}

echo "<br>M E N S A J E";
echo "<p>Se Realizo La Operaci&oacute;n Con Exito
<br>Revisa la Carpeta de Descarga</p>";

//echo "<a class='ui red button' href='database.php'>Puede Continuar Trabajando</a>";

if($todobien=="S")
{
 echo "<html><meta http-equiv=refresh content=10;url=right-menu.php>";
}
?>
