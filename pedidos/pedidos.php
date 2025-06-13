<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuentas.php                                                             //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
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
$popup="S";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$tableUse="pedidos";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($AreaCuentas))
{
 include_once("../bots/AreasSistema.php");
}
FechayHora();
$todoBien="N";

if($idnivel>=3)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."pedironline/pedironline.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
 FechayHora();
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['id_cuenta']))
 { $id_cuenta=$_GET['id_cuenta']; }
 if(isset($_GET['rand_num']))
 { $rand_num=$_GET['rand_num']; }
?>

<div class="mainContent">
 <div id="content">

  <?php
//--------------------------------
   include("sub-menu.php");
//--------------------------------
   include("pedidos-list1.php");
  ?>

 </div>
</div>

<?php
}

// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
