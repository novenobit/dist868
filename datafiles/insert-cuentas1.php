<?php
// include("../datafiles/insert-cuentas2.php");
// $usuario
// $cid_cliente
if(!isset($cid_empleado))
{ $cid_empleado=""; }
if(!isset($total_venta1))
{ $total_venta1="NULL"; }
if(!isset($descuento))
{ $descuento=""; }
if(!isset($descuento_venta))
{ $descuento_venta="NULL"; }
if(!isset($total_venta2))
{  $total_venta2="NULL"; }
if(!isset($valor_iva))
{  $valor_iva="0"; }
if(!isset($impuesto_iva))
{  $impuesto_iva="0.00"; }
if(!isset($valor_igtf))
{  $valor_igtf="0"; }
if(!isset($impuesto_igtf))
{  $impuesto_igtf="0"; }
if(!isset($servicios))
{  $servicios="0.00"; }
if(!isset($monto_apagar))
{  $monto_apagar="NULL"; }
if(!isset($pago_cliente))
{  $pago_cliente="NULL"; }
if(!isset($total_cambio))
{  $total_cambio="NULL"; }
if(!isset($hora_abierta))
{  $hora_abierta=$hoyhora; }
if(!isset($hora_cerrar))
{  $hora_cerrar=""; }
if(!isset($pago_cambio))
{  $pago_cambio=""; }
if(!isset($preparado))
{  $preparado=""; }
if(!isset($chequeado))
{  $chequeado=""; }
if(!isset($despachado))
{  $despachado=""; }
if(!isset($cerracuenta))
{  $cerracuenta=""; }
if(!isset($fecha))
{ $fecha="$dia/$mes/$ano"; }

if(!isset($fiscalfile))
{  $fiscalfile=""; }
if(!isset($nota_venta))
{  $nota_venta=""; }
if(!isset($rand_num))
{ $rand_num=rand(); }

if(!isset($empaque))
{ $empaque=1; }
$anulado="";

$sqlInsert="insert into cuentas1(usuario,cid_empleado,cid_cliente,total_venta1,descuento,descuento_venta,total_venta2,valor_iva,impuesto_iva,valor_igtf,impuesto_igtf,servicios,monto_apagar,pago_cliente,total_cambio,hora_abierta,hora_cerrar,pago_cambio,preparado,chequeado,despachado,cerracuenta,fecha,fiscalfile,nota_venta,numsession,rand_num,sistema, anulado)
values('$usuario','$cid_empleado','$cid_cliente',$total_venta1,'$descuento',$descuento_venta,$total_venta2,'$valor_iva','$impuesto_iva','$valor_igtf','$impuesto_igtf','$servicios',$monto_apagar,$pago_cliente,$total_cambio,'$hora_abierta','$hora_cerrar','$pago_cambio','$preparado','$chequeado','$despachado','$cerracuenta','$fecha','$fiscalfile','$nota_venta', '$numsession', '$rand_num', '$sistema', '$anulado')";
$resultInsert=mysqli_query($conex1,$sqlInsert);

?>
