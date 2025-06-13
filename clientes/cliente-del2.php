<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("$dirRoot"."bots/bot-cliente.php");

if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['id_cliente']))
{ $id_cliente=$_GET['id_cliente']; }

if(!isset($op))
{ $op=""; }
if(!isset($id_cliente))
{ $id_cliente=""; }

if($op=="del" and isset($id_cliente))
{
 //$query1="insert into clientes_del select * from clientes where id_cliente='$id_cliente'";
 //$result1=mysqli_query($conex1,$query1);
 $sqldel="delete from clientes where id_cliente='$id_cliente'";
 $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
 $Table="clientes";
 TableStatus();
 if($dbEngine=="MyISAM")
 {
  $sql1="repair table clientes, clientes_del";
  $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 }
}
if($op=="des")
{
 $query1DA="update clientes set activo='N' where id_cliente='$id_cliente'";
 $result1DA=mysqli_query($conex1,$query1DA);
 $Table="clientes";
 TableStatus();
 if($dbEngine=="MyISAM")
 {
  $sql1="repair table clientes";
  $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 }
}
echo "<html><meta http-equiv=refresh content=0;url=clientes.php>";
exit();
?>
