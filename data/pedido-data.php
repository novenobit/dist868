<?php
$id_cuenta=$cuentaData['id_cuenta'];
$usuario=$cuentaData['usuario'];
$cid_cliente=$cuentaData['cid_cliente'];
$total_venta1=$cuentaData['total_venta1'];
$descuento=$cuentaData['descuento'];
$descuento_venta=$cuentaData['descuento_venta'];
$total_venta2=$cuentaData['total_venta2'];
$valor_iva=$cuentaData['valor_iva'];
$impuesto_iva=$cuentaData['impuesto_iva'];
$valor_igtf=$cuentaData['valor_igtf'];
$impuesto_igtf=$cuentaData['impuesto_igtf'];
$servicios=$cuentaData['servicios'];
$monto_apagar=$cuentaData['monto_apagar'];
$pago_cliente=$cuentaData['pago_cliente'];
$total_cambio=$cuentaData['total_cambio'];
$hora_abierta=$cuentaData['hora_abierta'];
$hora_cerrar=$cuentaData['hora_cerrar'];
// $nota_consumo=$cuentaData['nota_consumo'];
$pago_cambio=$cuentaData['pago_cambio'];
$preparado=$cuentaData['preparado'];
$chequeado=$cuentaData['chequeado'];
$despachado=$cuentaData['despachado'];
$cerracuenta=$cuentaData['cerracuenta'];
$fecha=$cuentaData['fecha'];
$fiscalfile=$cuentaData['fiscalfile'];
$nota_venta=$cuentaData['nota_venta'];
$rand_num=$cuentaData['rand_num'];
if($descuento_venta==0 and $descuento<>"")
{ $descuento_venta=($total_venta1*$descuento)/100; }
?>
