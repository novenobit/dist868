<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  reporte.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$noFrame="S";
$popup="S";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";

if($AreaAdmin=="N" or $VerVentas=="N" or $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}
if($AreaAdmin=="S" and $VerVentas=="S" )
{
 include("../includes/leftbar.php");
 if(isset($AreaAdmin) and $AreaAdmin<>"S")
 {
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
 } 
 FechayHora();
?>

<div class="mainContent">
 <div id="content">

  <?php
//--------------------------------
     include("sub-menu.php");
//--------------------------------
     $numFilas=0;
     $sqlNumVentas=mysqli_query($conex1,"select id_venta from ventas limit 2");
     $numFilas=mysqli_num_rows($sqlNumVentas);
     $numFilas=0;
     $sqlNumVentas=mysqli_query($conex1,"select id_venta from ventas limit 2");
     $numFilas=mysqli_num_rows($sqlNumVentas);
     if($numFilas>0)
     {
       include("report-lista1.php");
       echo "<br>Ventas: $numFilas";    
     }
     else
     {
?>
 <div class='ui purple message aligned center'><h2>No Hay Datos Para Esta Fecha</hy></div>
<?php
     }
    ?>

 </div>
</div>

<?php
}

// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
