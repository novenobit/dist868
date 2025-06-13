<?php
// ************************************************************* 2023 ********
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$breadCrumb="S";
$findData="S";
$popup="S";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");


FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }

if(!isset($id_cuenta) or $id_cuenta=="")
{
 $error="No Tengo los Datos de la Cuenta";
 error();
 exit();
}
if(!isset($id) or $id=="")
{
 $error="No Tengo los Datos del Pago";
 error();
 exit();
}
?>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("lista-cesta-items3.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
   <?php
    include("../libs1/loader.php");
    $numFilas=0;
    $sqlPagos1=mysqli_query($conex1,"select id from pagoscliente where id='$id' and id_cuenta='$id_cuenta'");
    $numFilas=mysqli_num_rows($sqlPagos1);
    if($numFilas>0)
    {
      $sqldel="delete from pagoscliente where id='$id' and id_cuenta='$id_cuenta'";
      $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
    }
   ?>
 </div>
</div>
<?php
 echo "<html><meta http-equiv=refresh content=0;url=cerrar-cesta4.php?id_cuenta=$id_cuenta&sistema=$sistema>";
?>
