<?php
// ******************************************************** 2006 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
if(!isset($_SESSION))
 session_start();
if(!headers_sent())
{ header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}
ini_set("max_execution_time", "0");

// Variables to Activate
$subdir=2;
$dirLevel=2;
$jquery="S";
$jqueryTop="N";
$container="S";
$topMenu="N";
// $hover="S";
$frame="S";
// $tabsMenu="S";
// $onlyData="S";
// $dataTables="S";
// $showstatus="S";

include_once("../includes/config-top.php");
include("$dirTra"."includes/headfile.php");

if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['num']))
{ $num="$_GET[num]"; }
$query="update $db1 set cerracuenta='',fecha='$dia/$mes/$ano',nota_consumo='' where id_cuenta='$id_cuenta'";
$result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error($query));
$Table=$db1;
TableStatus();
if($dbEngine=="MyISAM")
{
 $sql1="repair table $db1, $db2";
 $result1=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
}
echo "<html><meta http-equiv=refresh content=0;url=ajustes1.php?id_cuenta=$id_cuenta&sistema=$sistema&areaMesas=$areaMesas>";
?>
