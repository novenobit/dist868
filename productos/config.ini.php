<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  config.ini.php                                             //
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
$dirRoot="../";
include_once("../includes/configAdmin.php");

userid();
$tabs="S";
$todoBien="N";
FechayHora();
$autoPro="S";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
