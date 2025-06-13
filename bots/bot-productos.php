<?php
//include("$dirRoot"."bots/bot-productos.php");
$Condicion="";
if(isset($_GET['id_producto']))
{ $id_producto="$_GET[id_producto]"; }
if(isset($_GET['cod_producto']))
{ $cod_producto="$_GET[cod_producto]"; }
$Table="productos";
if(isset($CamposProductos))
{ $Campos=$CamposProductos; }
else
{ $Campos="*"; }
if(isset($id) and $id<>"")
{ $Condicion="where id_producto='$id'"; }
if(isset($idpro) and $idpro<>"")
{ $Condicion="where id_producto='$idpro'"; }
if(isset($id_producto) and $id_producto<>"" and empty($Condicion))
{ $Condicion="where id_producto='$id_producto'"; }
if(isset($cod_producto) and $cod_producto<>"" and empty($Condicion))
{ $Condicion="where cod_producto='$cod_producto'"; }
if(isset($codigo_barra) and $codigo_barra<>"" and empty($Condicion))
{ $Condicion="where codigo_barra='$codigo_barra'"; }
if(isset($upcean) and $upcean<>"" and empty($Condicion))
{ $Condicion="where cod_upcean='$upcean'"; }
findData($Campos,$Table,$Condicion);
if(isset($Data))
{ $proData=$Data; }
else
{ $proData=""; }
return $proData;
?>

