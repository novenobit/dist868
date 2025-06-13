<?php
$monto_apagar=0;
$total_venta1=0;
$descuento_venta=0;
$total_venta2=0;
$impuesto_iva=0;
$pago_cliente=0;
$total_cambio=0;
$propina=0;
$ttotal=0;
if(!isset($servi_cuenta))
{ $servi_cuenta=0; }

$tipo_iva="A";
include("$dirRoot"."datafiles/iva-find.php");

// ceil() / floor() / round()
//descuento_venta='0',
$query1="update $db1 set total_venta1='0',  total_venta2='0', impuesto_iva='0', servi_cuenta='0', monto_apagar='0', cerracuenta='' where id_cuenta='$id_cuenta'";
$result1=mysqli_query($conex1,$query1);

$sql=mysqli_query($conex1,"select id_item,cantidad from $db2 where id_cuenta='$id_cuenta'");
while($cestaData=mysqli_fetch_array($sql))
{
 $sqlbot=mysqli_query($conex1,"select precio1_item from items where id_item='{$cestaData['id_item']}'");
 $itemData=mysqli_fetch_array($sqlbot);
 $total_precio=$cestaData['cantidad']*$itemData['precio1_item'];
 $total_venta1=$total_precio+$total_venta1;
}
//-------------------------------------------------
//if($sistema=="R")
//{
 $sqlcalmesa=mysqli_query($conex1,"select descuento, descuento_venta from mesa where id_cuenta='{$cuentaData1['id_cuenta']}'");
 $mesacalData=mysqli_fetch_array($sqlcalmesa);
 $descuento_venta=$mesacalData['descuento_venta'];
 if(!empty($mesacalData['descuento']) and $mesacalData['descuento']<>'FIJO')
 { $descuento_venta=($total_venta1*$mesacalData['descuento'])/100; }
 elseif($mesacalData['descuento']<>'FIJO')
 { $descuento_venta=0; }
 $ttotal=$ttotal+$total_venta1;
 $total_venta1=$ttotal;
 $total_venta2=($total_venta1-$descuento_venta);

 $servicio=0;
 if($sistema=="R")
 {
  $servicio=$cuentaData['servi_cuenta'];
  if($servicio=="")
  { $servicio=0; }
 }
 if($sistema=="S")
 {
   $servicio=$BSservi_cuentaS;
 }
 if($sistema=="D")
 {
   $servicio=$BSservi_cuentaD;
 }
 if($servicio=="")
 { $servicio=0; }

 $servi_cuenta=($total_venta2*$servicio)/100;
 $impuesto_iva=($total_venta2*$valor_iva)/100;
 $monto_apagar=($total_venta2+$servi_cuenta+$impuesto_iva);

 if($id_cuenta>="1010000") // Mesas Especiales
 {
  $ttotal=$ttotal+$total_venta1;
  $total_venta1=$ttotal;
  $total_venta2=($total_venta1);
  $servi_cuenta=($total_venta2*$BSservi_cuentaR)/100;
  $impuesto_iva=($total_venta2*$valor_iva)/100;
  $monto_apagar=($total_venta2+$servi_cuenta+$impuesto_iva);
 }
//}

//-------------------------------------------------
//descuento='', descuento_venta='0',
$query1="update $db1 set total_venta1='$total_venta1', descuento_venta='$descuento_venta', total_venta2='$total_venta2', impuesto_iva='$impuesto_iva', servi_cuenta='$servi_cuenta', monto_apagar='$monto_apagar', pago_cliente='0', total_cambio='0', propina='0',pago_cambio='', cerracuenta=''  where id_cuenta='$id_cuenta'";
$result1=mysqli_query($conex1,$query1);
?>
