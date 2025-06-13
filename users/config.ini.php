<?php
if(!isset($_SESSION))
{ session_start(); }
if(!headers_sent())
{ header("Cache-control: private"); } // IE 6 Fix
ini_set("max_execution_time", "0");
include_once('../libs1/config-db.php');
include_once('../libs1/libUsers.php');
//include_once('configSet.php');
//include_once('configVAR.php');
$dirRoot="../";
$subdir="../";
include_once('../includes/headfile2.php');
include_once('../includes/topfile2.php');
userid();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
