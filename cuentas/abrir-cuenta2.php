<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  abrir-cuenta2.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$tableUse="cuentas";
include_once("../libs1/config-db.php");
include_once("../libs1/libUsers.php");
include_once("../libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

FechayHora();
$todoBien="N";
$enviado="";
$hora_cerrar=0;
$rand_num=rand();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
else
{ $id=""; }

$sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente from clientes where id_cliente='$id'");
$clienteData=mysqli_fetch_array($sqlCliente);
if(isset($clienteData))
{
 $id=$clienteData['id_cliente'];
 $cid_cliente=$clienteData['cid_cliente'];
 $nom_cliente=$clienteData['nom_cliente'];
 $tel1_cliente=$clienteData['tel1_cliente'];
 echo "<br><b>Cuenta:</b> RIF: $cid_cliente / <strong>$nom_cliente</strong>";
 if($tel1_cliente<>"")
 { echo " / $tel1_cliente"; }
}
//---------------
//$numFilas=0;
//$sqlCuenta=mysqli_query($conex1,"select id_cuenta,monto_apagar from cuentas1 where usuario='$usuario'and cid_cliente='$cid_cliente'");
//$cuentaData=mysqli_fetch_array($sqlCuenta);
//$numFilas=mysqli_num_rows($sqlCuenta);
//if($numFilas==0)
//{
  // (NULL,'leslie','56565656',NULL,'',NULL,NULL,'0','0.00','0','0','0.00',NULL,NULL,NULL,'','','','','','','','','','',NULL),(NULL,'','',NULL,'',NULL,NULL,NULL,'0.00','0','0.00','0.00',NULL,NULL,NULL,'','','','','','','','','','',NULL);
  // $usuario
  // $cid_cliente
  if(!isset($cid_empleado))
  { $cid_empleado=$usuario; }
  $total_venta1="NULL";
  $descuento="";
  $descuento_venta="NULL";
  $total_venta2="NULL";
  $valor_iva="0";
  $impuesto_iva="0.00";
  $valor_igtf="0";
  $impuesto_igtf="0";
  $servicios="0.00";
  $monto_apagar="NULL";
  $pago_cliente="NULL";
  $total_cambio="NULL";
  $hora_abierta=$hoyhora;
  $hora_cerrar="";
  $pago_cambio="";
  $preparado="";
  $chequeado="";
  $despachado="";
  $cerracuenta="";
  $fecha=$hoydia;
  $fiscalfile="";
  $nota_venta="";
  // $rand_num
  if(!isset($numsession))
  { $numsession=session_id(); }
  if(!isset($rand_num))
  { $rand_num=rand(); }
  if(!isset($sistema) or $sistema=="")
  { $sistema="c"; }
  $anulado="";

  $sqlInsert="insert into cuentas1(usuario,cid_empleado,cid_cliente,total_venta1,descuento,descuento_venta,total_venta2,valor_iva,impuesto_iva,valor_igtf,impuesto_igtf,servicios,monto_apagar,pago_cliente,total_cambio,hora_abierta,hora_cerrar,pago_cambio,preparado,chequeado,despachado,cerracuenta,fecha,fiscalfile,nota_venta,numsession, rand_num, sistema, anulado)
  values('$usuario','$cid_empleado','$cid_cliente',$total_venta1,'$descuento',$descuento_venta,$total_venta2,'$valor_iva','$impuesto_iva','$valor_igtf','$impuesto_igtf','$servicios',$monto_apagar,$pago_cliente,$total_cambio,'$hora_abierta','$hora_cerrar','$pago_cambio','$preparado','$chequeado','$despachado','$cerracuenta','$fecha','$fiscalfile','$nota_venta','$numsession','$rand_num','$sistema','$anulado')";
  $resultInsert=mysqli_query($conex1,$sqlInsert);
  echo "<html><meta http-equiv=refresh content=1;url=cuenta-ver1.php?rand_num=$rand_num>";
//}
//else
//{
//  $error="Estos Datos ya fueron Registrados";
//  error();
//  exit();
//}


?>
