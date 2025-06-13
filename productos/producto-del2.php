<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
include_once("../includes/session.php");
include_once("../libs1/loader.php");

$header="N";
$image="N";
$menu="N";
$divider="N";
$icon="N";
$input="N";
$list="N";
$sidebar="N";
$table="N";
$message="N";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="N";
$divider="N";
$forms="N";
$breadCrumb="S";
$findData="N";
$popup="N";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$topFile="N";

include_once("../includes/headfileFrame.php");

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_POST['op']))
{ $op=$_POST['op']; }

if(!isset($op) or $op=="")
{
 echo "<html><meta http-equiv=refresh content=0;url=producto-ver3.php?id=$id>";
 exit();
}
if($op<>"del" and $op<>"des" and $op<>"act")
{
 echo "<html><meta http-equiv=refresh content=0;url=producto-ver3.php?id=$id>";
 exit();
}
if($op=="act")
{
 $sqldel="update productos set activo='S' where id_producto='$id'";
 $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
if($op=="des")
{
 $sqldel="update productos set activo='N' where id_producto='$id'";
 $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
if($op=="del")
{
 $sqldel="delete from productos where id_producto='$id'";
 $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
$sql1="repair table productos_del, productos";
$result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
//echo "<html><meta http-equiv=refresh content=0;url=productos-list.php?op=$op>";
//echo "<html><meta http-equiv=refresh content=0;url=productos-list.php?op=$op>";
//exit();
if($op=="act")
{
 $mensaje="Producto Fue Activado puede continuar trabajando";
}
if($op=="del")
{
 $mensaje="Producto Fue Eliminado puede continuar trabajando";
}
if($op=="des")
{
 $mensaje="Producto Fue Desactivado puede continuar trabajando";
}
mensaje();

echo "<html><meta http-equiv=refresh content=10;url=productos.php>";

//<a class='ui blue button' href="javascript:window.close()"><i class="times circle outline icon"></i> Cierra La Ventana</a>
?>
