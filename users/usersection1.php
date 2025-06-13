<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
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
$tabs="S";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$dropdown="S";
$topAdmin="S";
$loadPage="S";
$breadCrumb="S";
$dirRoot="../";

include_once("../includes/headfileFrame.php");

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
FechayHora();
$todoBien="N";
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }
include_once("../bots/AreasSistema.php");
if(!isset($AreaAdmin) or $AreaAdmin=="N")
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";
$iduser=$_SESSION['iduser'];
$idnivel=$_SESSION['idnivel'];
include_once("../bots/AreasSistema.php");
if(!isset($AreaAdmin) or $AreaAdmin=="N")
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

include("leftbar.php");
?>

<div class="mainContent">
 <div class="ui container">
  <?php include("sub-menu.php"); ?>

<div class="ui brown two item  large menu">
  <a class="active item" data-tab="abierta">Cuentas Abiertas</a>
   <a class="item grey-background" data-tab="online">Online</a>
</div>

  <div class="ui bottom attached tab  segment" data-tab="abierta">
   <?php
     include("cuentas-abiertas.php");
   ?>
  </div>
  <div class="ui bottom attached  tab  segment" data-tab="online">
   <?php
     include("cuentas-online.php");
   ?>
  </div>
 </div>



  </div>
  </div>
</div>

<?php
$showStatus="N";
include("../includes/statusAdmin.php");
?>
