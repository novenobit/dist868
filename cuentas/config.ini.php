<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  config.ini.php                                             //
// ****************************************************************

include_once('../includes/session.php');
$dirRoot="../";
$subdir="../";
$tableUse="cuentas1";
include_once('../includes/headfileFrame.php');
$dataTable1="cuentas1";
$dataTable2="cuentas2";

userid();
$todoBien="N";
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
