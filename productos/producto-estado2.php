<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-edit2.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../libs1/loader.php");
include_once("../includes/headfileFrame.php");
include_once("../libs1/libFindData.php");
include("../bots/bot-productos.php");
if(isset($proData))
{
 $cod_producto=$proData['cod_producto'];
 $nom_producto=$proData['nom_producto'];
}

FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }

if(isset($_GET['estado']))
{ $estado=$_GET['estado']; }

if(isset($estado) and $estado<>"")
{
  $query2="update productos set estado='$estado' where id_producto='$id'";
  $result2=mysqli_query($conex1,$query2);
  $cambios="S";
  $datos_cambio="Cambio de Sub-Categoria";
  $fecha_cambio="$dia/$mes/$ano";
  if(!isset($cid_empleado))
  { $cid_empleado=""; }
  $query2="insert into pro_cambios(cod_producto,nom_producto,usuario,fecha_cambio,datos_cambio)
  values('$cod_producto','$nom_producto','$usuario','$fecha_cambio','$datos_cambio')";
  $result2=mysqli_query($conex1,$query2);
  //echo "<br>  $query2";
}

http://192.168.0.188/dist868-1602/productos/goto-page.php?id=1845
echo "<html><meta http-equiv=refresh content=0;url=goto-page.php?op=ver&id=$id>";
//echo "<html><meta http-equiv=refresh content=0;url=producto-ver2.php?op=ver&id=$id>";

?>
