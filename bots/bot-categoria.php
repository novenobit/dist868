<?php
//include("$dirRoot"."bots/bot-categoria.php");
$Condicion="";
$Table="categoria";
if(isset($CamposCat))
{ $Campos=$CamposCat; }
else
{ $Campos="*"; }
if(isset($_GET['cod_categoria']) and $_GET['cod_categoria']<>"")
{ $Condicion="where cod_categoria='{$_GET['cod_categoria']}'"; }
if(isset($cod_categoria) and $cod_categoria<>"" and empty($Condicion))
{ $Condicion="where cod_categoria='$cod_categoria'"; }
if(isset($_GET['id_categoria']) and $_GET['id_categoria']<>"" and empty($Condicion))
{ $Condicion="where id_categoria='{$_GET['id_categoria']}'"; }
if(isset($id_categoria) and $id_categoria<>"" and empty($Condicion))
{ $Condicion="where id_categoria='$id_categoria'"; }

findData($Campos,$Table,$Condicion);
if(isset($Data))
{
 $catData=$Data;
 return $catData;
}
?>
