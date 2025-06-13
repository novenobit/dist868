<?php
$Condicion="";
$Table="ventas";
if(isset($CamposVentas))
{ $Campos=$CamposVentas; }
else
{  $Campos="*"; }
if(!empty($num_compra))
{
 if(isset($clienteData) and $clienteData<>"")
 { $Condicion="where cid_cliente='{$clienteData['cid_cliente']}"; }
 if(isset($id_venta) and $id_venta<>"" and empty($Condicion))
 { $Condicion="where id_venta='$id_venta'"; }
 findData($Campos,$Table,$Condicion);
 if(isset($Data))
 {
  $ventasData=$Data;
  $numventas=mysqli_num_rows($Data);
  return $ventasData;
 }
}
?>
