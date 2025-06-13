<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  list-cuentas.php                                                        //
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
include_once("../includes/config.ini.php");
if(!isset($AreaCuentas))
{
 include_once("../bots/AreasSistema.php");
}

FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
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

    <h2 class="menu-label">Cuentas Abiertas</h2>
    <?php
     $numFilas=0;
     if($idnivel<=1 or $AreaCuentas=="S")
     { $sqlCuentas=mysqli_query($conex1,"select id_cuenta,monto_apagar from cuentas1"); }
     else
     { $sqlCuentas=mysqli_query($conex1,"select id_cuenta,monto_apagar from cuentas1 where usuario='$usuario'"); }
     //$cuentaData=mysqli_fetch_array($sqlCuentas);
     $numFilas=mysqli_num_rows($sqlCuentas);
     if($numFilas>0)
     {
       include("lista-cuentas2.php");
     }
     else
     {
      echo "No Hay Datos";
     }
    ?>

 </div>
</div>

<?php
 include("$dirRoot"."includes/statusAdmin.php");
?>
