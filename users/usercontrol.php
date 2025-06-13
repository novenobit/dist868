<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  userControl.php                                                         //  
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform�tica, C.A.          //
// ***************************************************************************
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
$dropdown="S";
$topAdmin="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_GET['nd']))
{ $nd=$_GET['nd']; }
if(isset($_GET['id']))
{ $id=$_GET['id']; }
else
{ $id=""; }
if(isset($_GET['cesta']))
{ $cesta=$_GET['cesta']; }

if(empty($nd))
{  echo "<html><meta http-equiv=refresh content=0;url=../index.php>"; }
elseif($nd==1)
{  include('usernew.php'); }
elseif($nd==2)
{  include('usercheckdata.php'); }
elseif($nd==3)
{ include('usercheck.php'); }
elseif($nd==4)
{  include('indexac.php?id=$id'); }
elseif($nd==5)
{  include('usersection.php'); }
echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
?>
