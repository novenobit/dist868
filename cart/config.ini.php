<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  config.ini.php                                             //
// ****************************************************************

include_once('../includes/session.php');
$dirRoot="../";
$subdir="../";
include_once('../includes/config.ini.php');
include_once("$dirRoot"."libs1/config-db2.php");

userid();
$tab="S";
$todoBien="N";
$autoPro="S";
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
