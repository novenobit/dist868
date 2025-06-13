<?php
// ************************************************************* 2023 ********
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$breadCrumb="S";
$findData="S";
$popup="S";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$tableUse="pedidos";
include_once("../includes/headfileFrame.php");


FechayHora();
$todoBien="N";

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['idPago']))
{ $idPago=$_GET['idPago']; }
$sistema="T";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($id_cuenta) or $id_cuenta=="")
{
 $error="No Tengo los Datos de la Cuenta";
 error();
 exit();
}
?>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("lista-pedido-items3.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

  <div class="ui raised segment">
   <div class="ui stackable two column grid">
    <div class="column">
     <?php
      include("sub-menu-3.php");
      include("pedido-data.php");
     ?>
    </div>
   </div>
  </div>
  <?php
     include("../libs/loader.php");
// -------------------
$anulada="N";
$saldoact2=0;
$cuentaxcobrar="";

if(!isset($descuento) or $descuento=="")
{ $descuento=0; }
if(!isset($descuento_venta) or $descuento_venta=="")
{ $descuento_venta=0; }

if(!isset($hora_fiscal))
{ $hora_fiscal=""; }
if(!isset($nota_consumo))
{ $nota_consumo=""; }
if(!isset($fecha_fiscal))
{ $fecha_fiscal=""; }
if(!isset($nota_venta))
{ $nota_venta=""; }
if(!isset($anulada))
{ $anulada="N"; }
if(!isset($cuentaxcobrar))
{ $cuentaxcobrar=""; }
if(!isset($valor_igtf))
{ $valor_igtf=0; }
if(!isset($impuesto_igtf))
{ $impuesto_igtf=0; }
$fecha="$dia/$mes/$ano";
$fechanow=$fecha;
$submitted=$fecha;
$hora_cerrar=$hoyhora;
$now="$dia/$mes/$ano";
$equipo_fiscal="";
$fecha_fiscal="";
$hora_fiscal="";
$factura_fiscal="";

$valor_iva="16";
include("../bots/bot-numfactura.php");
        if(!isset($empleado) or $empleado=="")
        {
          $empleado=$usuario;
        }
// -----------------------------------------------------
// -----------------------------------------------------
if(isset($numfactura) and $numfactura<>"")
{
     // Pagos Data
     // -----------------------------------
     $totalPagos=0;
     $sqlPagos=mysqli_query($conex1,"select * from pagoscliente where id_cuenta='$id_cuenta'");
     while($pagosData=mysqli_fetch_array($sqlPagos))
     {
       include("../data/pagos-cliente-data.php");
      // if($id_banco<>"")
      // {
      //  include("$dirRoot"."bots/bot-banco.php");
      //  if(isset($bancoData) and !empty($bancoData))
      //  {
      //   $cod_banco=$bancoData['cod_banco'];
      //   $saldoact=$bancoData['saldoact'];
      //  }
      //  else
      //  {
      //    $cod_banco="";
      //    $saldoact=0;
      //  }
      // }
       if($montopago>0)
       {
        if(empty($anulada))
        { $anulada="N"; }
        if(!isset($cod_banco))
        { $cod_banco=""; }
        if(!isset($cod_moneda))
        { $cod_moneda=""; }
        if(!isset($moneda_monto))
        { $moneda_monto=0; }
        if(!isset($precio_moneda))
        { $precio_moneda=0; }
        if(!isset($valor_igtf))
        { $valor_igtf=0; }
        if(!isset($impuesto_igtf))
        { $impuesto_igtf=0; }
        if(!isset($anulada))
        { $anulada=""; }
        $totalPagos=$totalPagos=$montopago;
        if(!isset($cajera))
        { $cajera=$usuario; }
        if(!isset($id_formapago))
        { $id_formapago=""; }
        $sqAD23="insert into respaldo_pagos(id_cuenta, numfactura, empleado, cid_cliente, id_formapago, tipo_formapago, montopago,  cod_banco, dia, mes, ano, submitted, anulada)
        values('$id_cuenta', '$numfactura',  '$cajera', '$cid_cliente', '$id_formapago', '$tipo_formapago', '$montopago', '$cod_banco', '$dia', '$mes', '$ano', '$fecha', '$anulada')";
        $result=mysqli_query($conex1,$sqAD23);
       }
     }
     // ==================================
     // Cesta Data
     // -----------------------------------
     $sqlCesta=mysqli_query($conex1,"select * from pedironline2 where id_cuenta='$id_cuenta'");
     while($cestaData=mysqli_fetch_array($sqlCesta))
     {
      include("../data/pedido-data.php");
      //---------------------------------------------------
      $sqlPlato=mysqli_query($conex1,"select cod_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPlato);
      //---------------------------------------------------
      if(isset($proData))
      {
       $cod_producto=$proData['cod_producto'];
       $precio1_producto=$proData['precio1_producto'];
       $precio2_producto=$proData['precio2_producto'];
       $precio3_producto=$proData['precio3_producto'];
       $precio4_producto=$proData['precio4_producto'];
       $codigo_barra=$proData['codigo_barra'];
       // include("$dirRoot"."datafiles/iva-find.php");
       // $valor_iva=$ivaData['valor_iva'];
      }
$tipo_iva="A";
      $sql2="insert into respaldo_cesta(numfactura, empleado, id_cuenta,  cod_producto,codigo_barra, cantidad, precio1_producto, dia, mes, ano, submitted,  anulada)
      values('$numfactura', '$usuario', '$id_cuenta', '$cod_producto', '$codigo_barra', '$cantidad', '$precio1_producto',  '$dia', '$mes', '$ano', '$submitted', '$anulada')";
      $result=mysqli_query($conex1,$sql2);
     }
     // ==================================
     // Ventas Data - Cuenta Data
     // -----------------------------------
     $sqlCuentas=mysqli_query($conex1,"select * from pedironline1 where id_cuenta='$id_cuenta'");
     $cuentaData=mysqli_fetch_array($sqlCuentas);
     if(isset($cuentaData))
     {
        include("../data/pedido-data.php");
        include("../libs/calcular-pedido.php");
        if(!isset($cajera))
        { $cajera=$usuario; }
if(!isset($id_formapago))
{ $id_formapago=""; }
        $sqlnewventa="insert into ventas(id_cuenta, numfactura,  empleado, cid_cliente, id_formapago, total_venta1, descuento, descuento_venta, total_venta2, monto_apagar, pago_cliente,   nota_venta, anulada, dia, mes, ano, submitted)
        values('$id_cuenta', '$numfactura', '$empleado', '$cid_cliente', '$id_formapago', '$total_venta1', '$descuento', '$descuento_venta', '$total_venta2',  '$monto_apagar', '$totalPagos', '$nota_venta', '$anulada', '$dia', '$mes', '$ano', '$now')";
        $sqlnewventa2=mysqli_query($conex1,$sqlnewventa);
     }

$numFilas=0;
$sql1=mysqli_query($conex1, "select id_venta from ventas where numfactura='$numfactura'");
$numFilas=mysqli_num_rows($sql1);
if($numFilas>0)
{
  $sqldel="delete from pedironline1 where id_cuenta='$id_cuenta'";
  $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
$numFilas=0;
$sql2=mysqli_query($conex1, "select idcesta from respaldo_cesta where numfactura='$numfactura'");
$numFilas=mysqli_num_rows($sql2);
if($numFilas>0)
{
  $sqldel="delete from pedironline2 where id_cuenta='$id_cuenta'";
  $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
$numFilas=0;
$sql3=mysqli_query($conex1, "select id from respaldo_pagos where numfactura='$numfactura'");
$numFilas=mysqli_num_rows($sql3);
if($numFilas>0)
{
  $sqldel="delete from pagoscliente where id_cuenta='$id_cuenta'";
  $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
}

echo "<html><meta http-equiv=refresh content=0;url=lista-pedirOnline1.php?id=$iduser>";

  ?>
 </div>
</div>


<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
