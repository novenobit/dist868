<?php
include_once("../config-data.php");
include_once("$dirRoot"."libs1/libFindData.php");
include("$dirRoot"."bots/FindUsuario3.php");
if(isset($_GET['areaMesas']))
{ $areaMesas="$_GET[areaMesas]"; }
if(!isset($areaMesas))
{ $areaMesas=""; }
if(isset($_POST['pin']))
{ $pin="$_POST[pin]"; }
if(isset($_POST['nota_anular']))
{ $nota_anular="$_POST[nota_anular]"; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(!isset($nota_anular) or $nota_anular=="")
{
 $error="{$userData['nom_empleado']} {$userData['ape_empleado']}, Te Falto Indicar el Motivo de La Anulacion";
 error();
 exit();
}
else
{
 FechayHora();
 $todobien="S";
 $cerracuenta="S";
 include("$dirRoot"."bots/bot-numfactura.php");
 include("$dirRoot"."bots/bot-numventa.php");

 $tipo_iva="A";
 include("$dirRoot"."datafiles/iva-find.php");

// Calcula Cuenta
 include("$dirRoot"."libs1/calcular-pedido.php");
 $update1="update $db1 set total_venta1='$total_venta1', descuento_venta='$descuento_venta', total_venta2='$total_venta2', impuesto_iva='$impuesto_iva', servi_mesa='$servi_mesa', monto_apagar='$monto_apagar' where id_cuenta='$id_cuenta'";
 $update2=mysqli_query($conex1,$update1) or die ("Error in query: $query. " . mysqli_error());
//
 include("$dirRoot"."bots/bot-mesa-data.php");
 $numFilas=0;
 $numFilas=mysqli_num_rows($sqlFind);
 if($numFilas==0)
 {
  $error="Nada que Hacer Aqu&iacute;, no hay Datos";
  error();
  echo "<html><meta http-equiv=refresh content=3;url='../outpage1.php?dirRoot=$dirRoot&sistema=$sistema&areaMesas=$areaMesas' content='_parent'>";
  exit();
 }
// $Campos="id_area, nom_mesa";
 include("$dirRoot"."bots/bot-mesas-data.php");
// $Campos="id_area, nom_mesa";

 $id_empleado=$mesaData['id_empleado'];
 include("$dirRoot"."bots/bot-mesonero.php");
 if(isset($mesoneroData))
 {
  $cidMesonero=$mesoneroData['cid_empleado'];
  $NomMesonero="{$mesoneroData['nom_empleado']} {$mesoneroData['ape_empleado']}";
 }
 else
 {
  $cidMesonero="";
  $NomMesonero="";
 }
 $cajera=$userData['cid_empleado'];
 $hora_abierta=$mesaData['hora_abierta'];
 $personas=$mesaData['personas'];
 $horaabrirmesa=$hora_abierta;

 include("$dirRoot"."bots/bot-pin.php");
 if($pin==$pin_empleado)
 {
   echo "si";
 }
 else
 {
  $error="No Autorizado";
  error();
 }
// cliente
 include("$dirRoot"."bots/bot-cliente.php");
 include("$dirRoot"."data/cliente-data.php");

include("../lib/calcular-pagocliente.php");
include("../lib/pagocliente.php");
$id_formapago="{$pagoclienteData['id_formapago']}";

include("$dirRoot"."bots/FormadePagoID.php");
$nom_formapago="";
if(isset($formapagoData))
{ $nom_formapago=$formapagoData['nom_formapago']; }
// mesonero

//$sqlemp=mysqli_query($conex1,"select * from empleados where id_empleado='{$mesaData['id_empleado']}'");
//$mesoneroData=mysqli_fetch_array($sqlemp);
// VENTAS
$total_cambio=$monto_apagar-$pago_cliente;
$total_cambio=abs($total_cambio);
$propina=$total_cambio;
$propina=abs($propina);
$hora_cerrar=$hoyhora;
$pago_cambio="N";
$cerracuenta="N";
$cerracuenta="N";
$num=0;
// formato num

$sql=mysqli_query($conex1, "select enviado from $db2 where id_cuenta='$id_cuenta' and enviado='S'");
$num=mysqli_num_rows($sql);

$sqlventas=mysqli_query($conex1,"select numfactura from del_ventas order by numfactura desc limit 1");
$sqlventas2=mysqli_fetch_array($sqlventas);
$numfactura=$sqlventas2['numfactura']+1;

if($num>0)
{
  // RESPALDO VENTAS ********************************
   if(empty($cid_cliente) or !isset($cid_cliente))
   { $cid_cliente=""; }
   if(empty($id_formapago))
   { $id_formapago=""; }
   if(empty($descuento))
   { $descuento=0; }
   if(empty($pago_cliente))
   { $pago_cliente=0; }
   if(empty($nota_consumo) or !isset($nota_consumo))
   { $nota_consumo=""; }
   if(!empty($nota_anular))
   { $nota_venta=$nota_anular; }
   if(empty($nota_venta))
   { $nota_venta="{$userData['nom_empleado']} {$userData['ape_empleado']} Borro esta mesa"; }
   $anulada="";
   $now="$dia/$mes/$ano";
   $anulada="";
   $cuentaxcobrar="";
   if(empty($cid_cliente))
   { $cid_cliente=""; }
   if(!isset($personas) or empty($personas))
   { $personas=1; }
   if(!isset($impuesto_igtf))
   { $impuesto_igtf=0; }
   if(!isset($valor_igtf))
   { $valor_igtf=0; }
// RESPALDO EN LA TABLA DE VENTAS *****************************************
   $sql1="insert into del_ventas(cod_empresa, equipo_fiscal, id_cuenta, personas, numfactura, factura_fiscal, cid_empleado, cajera, cid_cliente, id_formapago, total_venta1, descuento, descuento_venta, total_venta2, valor_iva, impuesto_iva, valor_igtf,impuesto_igtf, servi_mesa, monto_apagar, pago_cliente, total_cambio, propina, hora_abierta, hora_cerrar, hora_fiscal,  nota_consumo, pago_cambio, cerracuenta, nota_venta, anulada, cuentaxcobrar, dia, mes, ano, fecha_fiscal, numeroz, sistema, submitted)
   values('$cod_empresa', '', '$id_cuenta', '$personas', '$numfactura', '', '$cidMesonero', '$cajera', '$cid_cliente', '$id_formapago', '$total_venta1', '$descuento', '$descuento_venta', '$total_venta2', '$valor_iva', '$impuesto_iva', '$valor_igtf','$impuesto_igtf', '$servi_mesa', '$monto_apagar', '$pago_cliente', '$total_cambio', '$propina', '$hora_abierta', '$hora_cerrar', '', '$nota_consumo', '$pago_cambio', '$cerracuenta', '$nota_venta', '$anulada', '', '$dia', '$mes', '$ano', '', '', 'R', '$dia/$mes/$ano')";
   $result1=mysqli_query($conex1,$sql1);
   $ok1="S";
   $ves=1;
// RESPALDO PAGOS DEL CLIENTE ********************
    $sql2=mysqli_query($conex1,"select cid_cliente,id_formapago,montopago from $db_pagos where id_cuenta='$id_cuenta'");
    while($pagosData=mysqli_fetch_array($sql2))
    {
     if($pagosData['montopago']>0)
     {
      $sql22="insert into del_$db_pagos (id_cuenta, numfactura, factura_fiscal, cid_empleado, mesonero, cid_cliente, id_formapago, montopago, dia, mes, ano, sistema)
      values('$id_cuenta', '$numfactura', '', '$cajera', '$cidMesonero', '{$pagosData['cid_cliente']}', '{$pagosData['id_formapago']}', '{$pagosData['montopago']}', '$dia', '$mes', '$ano', 'R')";
      $result2=mysqli_query($conex1,$sql22);
     }
     $ok2="S";
     $ves++;
    }
// RESPALDO CESTA DEL CLIENTE ********************
    $cantidad=0;
    $precio1_item=0;
    $sql=mysqli_query($conex1,"select * from $db2 where id_cuenta='$id_cuenta'");
    while($cestaData=mysqli_fetch_array($sql))
    {
     $sqlplato=mysqli_query($conex1,"select cod_item,precio1_item from items where id_item='{$cestaData['id_item']}'");
     $itemData=mysqli_fetch_array($sqlplato);
     $cod_item=$itemData['cod_item'];
     $cantidad=$cestaData['cantidad'];
     $sql3="insert into del_cesta (mesonero, cid_empleado, numfactura, id_cuenta, cod_item, cantidad, precio1_item, tipo_iva, valor_iva, dia, mes, ano, submitted, sistema)
     values('$cidMesonero', '{$cestaData['cid_empleado']}', '$numfactura', '{$cestaData['id_cuenta']}', '{$itemData['cod_item']}', '{$cestaData['cantidad']}', '{$itemData['precio1_item']}', '$tipo_iva', '$valor_iva', '$dia', '$mes', '$ano', '{$cestaData['submitted']}', 'R')";
     $result=mysqli_query($conex1,$sql3);
     $ok4="S";
     include("$dirRoot"."bots/item-emov.php");
     if($itemInv=="S")
     {
       $op="sal";
       //include("$dirRoot"."siadre/items/item-movimiento.php");
     }
    }
  }
}

 mysqli_free_result($sql);
// DELETE DATA FROM TABLES **********************************************************

  $sqldel="delete from $db_pagos where id_cuenta='$id_cuenta'";
  $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
  $sqldel1="delete from $db2 where id_cuenta='$id_cuenta'";
  $result1=mysqli_query($conex1,$sqldel1) or die ("$queryerror $query. " . mysqli_error());
  $sqldel2="delete from $db1 where id_cuenta='$id_cuenta'";
  $result2=mysqli_query($conex1,$sqldel2) or die ("$queryerror $query. " . mysqli_error());
  if(isset($db_nota) and $db_nota<>"")
  {
   $sqldel3="delete from $db_nota where id_cuenta='$id_cuenta'";
   $result3=mysqli_query($conex1,$sqldel3) or die ("$queryerror $query. " . mysqli_error());
  }
  if(isset($db_item_extra) and $db_item_extra<>"")
  {
   $sqldel4="delete from $db_item_extra where id_cuenta='$id_cuenta'";
   $result4=mysqli_query($conex1,$sqldel4) or die ("$queryerror $query. " . mysqli_error());
  }
  $sqldel7="delete from $db_copia1 where id_cuenta='$id_cuenta'";
  $dresult7=mysqli_query($conex1,$sqldel7) or die ("$queryerror $sqldel7. " . mysqli_error());
  $sqldel8="delete from $db_copia2 where id_cuenta='$id_cuenta'";
  $dresult8=mysqli_query($conex1,$sqldel8) or die ("$queryerror $sqldel8. " . mysqli_error());

  include("$dirRoot"."data/repairTables.php");
  echo "<html><meta http-equiv=refresh content=0;url='../cuentas/ajustes.php?sistema=$sistema&areaMesas=$areaMesas' content='_parent'>";

?>
