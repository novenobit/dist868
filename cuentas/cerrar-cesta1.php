<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$grids="S";
$header="S";
$image="S";
$input="S";
$label="S";
$message="S";
$table="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

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
//include("sub-menu.php");
?>

<div class="ui centered grid">
 <div class="twelve wide tablet twelve wide computer column">
   <?php
     //include("sub-menu-3.php");
     //include("cuenta-data.php");
     include("cuenta-pago1.php");
   ?>
 </div>
 <div class="four wide tablet four wide computer column">
    <?php
     include("lista-cesta-items3.php");
    ?>
    <div class="result text-center"></div>
 </div>
</div>

<br><br>
<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
