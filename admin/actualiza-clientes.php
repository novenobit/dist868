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
// ----------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<h2>Revisar Clientes y Ventas</h2>

<?php
$conex1=mysqli_connect($DBhost, $DBuser, $DBpass) or die("NO se pudo realizar la conexi&oacute;n");
$db_selected1=mysqli_select_db($conex1,$DBase1);
// ----------------------------
$cambio="24.48";
?>

<link rel="stylesheet" href="style.css" />
<div class="ui grid">

<?php
$sqldata="select numfactura,empleado,cid_cliente from ventas";
$sqlVentas=mysqli_query($conex1,"$sqldata");
while($ventaData=mysqli_fetch_array($sqlVentas))
{
 $numfactura=$ventaData['numfactura'];
 $empleado=$ventaData['empleado'];
 $cid_cliente=$ventaData['cid_cliente'];
 echo "<div class='sixteen wide column'>
   $numfactura - $empleado - $cid_cliente";
   $numFilas=0;
   $sqlRC=mysqli_query($conex1, "select idcesta,id_cuenta from respaldo_cesta where numfactura='$numfactura'");
   $numFilas=mysqli_num_rows($sqlRC);
   if($numFilas>0)
   {
     $query="update respaldo_cesta set cid_cliente='$cid_cliente' where numfactura='$numfactura'";
     $result1=mysqli_query($conex1,$query);
   }
   echo " - $numFilas
 </div>";
 $num++;
}
?>
</div>


<?php
echo "<h1>Total Cambios: $num</h1>";
if($num>0)
{ exit(); }
?>
<br><br><br>
<html><meta http-equiv=refresh content=4;url=menu.php>
