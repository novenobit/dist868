<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  venta-ver.php                                                           //
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
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$dropdown="S";
$topAdmin="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $sqlVentas=mysqli_query($conex1,"select id_venta,numfactura,cid_cliente,monto_apagar,dia,mes,ano from ventas where id_venta='$id'");
 $ventaData=mysqli_fetch_array($sqlVentas);
 if(isset($ventaData))
 {
   $id_venta=$ventaData['id_venta'];
   $numfactura=$ventaData['numfactura'];
   $cid_cliente=$ventaData['cid_cliente'];
   $monto_apagar=$ventaData['monto_apagar'];
   $dia=$ventaData['dia'];
   $mes=$ventaData['mes'];
   $ano=$ventaData['ano'];
 }
}
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>


<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
   <h2>Delete Venta</h2>
   <?php
    include_once("../libs1/loader.php");
    if(isset($id) and $id<>"")
    {
     $sqldel="delete from ventas where id_venta='$id'";
     $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
    }
    echo "<html><meta http-equiv=refresh content=1;url=reporte.php>";
    exit();
   ?>
 </div>
</div>

<br><br><br>
<?php
include("$dirRoot"."includes/statusAdmin.php");
?>
