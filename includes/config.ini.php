<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  config.ini.php                                             //
// ****************************************************************
if (ob_get_level() == 0) ob_start();
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("$dirRoot"."libs1/libMail.php");
//include_once("$dirRoot"."libs1/libBarsBoxes.php");
//include_once("$dirRoot"."libs1/libBanners.php");
//include_once("$dirRoot"."libs1/libImages.php");
if(!isset($findData))
{ $findData="N"; }
if($findData=="S")
{ include_once("$dirRoot"."libs1/libFindData.php"); }
//include_once("$dirRoot"."libs1/libAC.php");
//include_once("$dirRoot"."includes/configSet.php");
//include_once("$dirRoot"."includes/configVAR.php");
if(!isset($headFile))
{ $headFile="S"; }
if($headFile=="S")
{
 include_once("$dirRoot"."includes/headfile.php");
}

if(isset($adminArea) and $adminArea=="S")
{ $topAdmin="S";
  $topFile="N";
}
if(!isset($topAdmin))
{ $topAdmin="N";
  $topFile="S";
}
if(!isset($topFile) and $topAdmin=="N")
{
 $topAdmin="N";
 $topFile="S";
}

if(!isset($topFile) and !isset($topAdmin))
{
 $topAdmin="N";
 $topFile="S";
}

if(isset($topFile) and $topFile=="S")
{ include_once("$dirRoot"."includes/topfile.php"); }
if(isset($topAdmin) and $topAdmin=="S")
{
  //include_once("$dirRoot"."includes/topAdmin.php");
}
if(isset($_SESSION))
{
 if(isset($_SESSION['iduser']))
 { $iduser=$_SESSION['iduser']; }
 if(isset($_SESSION['usuario']))
 { $usuario=$_SESSION['usuario']; }
 if(isset($_SESSION['idnivel']))
 { $idnivel=$_SESSION['idnivel']; }
}
?>
