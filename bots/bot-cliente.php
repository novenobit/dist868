<?php
$Condicion="";
if(isset($_GET['id_cliente']))
{ $id_cliente="$_GET[id_cliente]"; }
if(isset($_GET['cid_cliente']))
{ $cid_cliente="$_GET[cid_cliente]"; }
$Condicion="";
$Table="clientes";
if(isset($CamposCliente))
{ $Campos=$CamposCliente; }
else
{ $Campos="*"; }
if(!empty($id_cliente))
{ $Condicion="where id_cliente='$id_cliente'"; }
if(!empty($id_cliente) and empty($Condicion))
{ $Condicion="where id_cliente='$id_cliente'"; }
if(!empty($cid_cliente) and empty($Condicion))
{ $Condicion="where cid_cliente='$cid_cliente'"; }
if(!empty($tel1_cliente) and empty($Condicion))
{ $Condicion="where tel1_cliente='$tel1_cliente' or tel2_cliente='$tel1_cliente'"; }
//findData($Campos,$Table,$Condicion);
if(isset($Condicion))
{
 findData($Campos,$Table,$Condicion);
 if(isset($Data)and !empty($Data))
 {
  $clienteData=$Data;
  return $clienteData;
 }
}
else
{ echo "error en los datos"; }
?>
