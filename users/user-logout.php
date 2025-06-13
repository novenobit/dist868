<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  user-logout.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
include_once("../libs1/loader.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
if(isset($_SESSION))
{
 if(isset($usuario) and $usuario<>"")
 {
  $delete_sess="delete from useronline where usuario='$usuario'";
  mysqli_query($conex1,$delete_sess) or die("Error en la table de  sessiones:<br><br>".mysqli_error());
 }
 session_unset();
 session_destroy();
}
echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
