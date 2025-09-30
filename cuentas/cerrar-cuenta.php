<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cerrar-cuenta.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$grids="S";
$header="S";
$image="S";
$input="S";
$label="S";
$loadPage="S";
$message="S";
$table="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['idcesta']))
{ $idcesta=$_GET['idcesta']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['idPago']))
{ $idPago=$_GET['idPago']; }
$sistema="T";
//include("sub-menu.php");
if(!isset($id_cuenta) or $id_cuenta=="")
{
 $error="No Tengo los Datos de la Cuenta";
 error();
 exit();
}
include("../libs1/loader.php");
//include("sub-menu-3.php");
include("cuenta-data.php");
// include("list-pagos1.php");

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
  // ==================================
  // Cesta Data
  // -----------------------------------
  $bsCesta=0;
  $totalBsCesta=0;
  $sqlCesta=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta'");
  while($cestaData=mysqli_fetch_array($sqlCesta))
  {
      include("../data/cesta-data.php");
      $bsCesta=($cantidad*$empaque)*$precio_producto;
      $totalBsCesta=$totalBsCesta+$bsCesta;
      if(is_numeric($empaque))
      { $Tcantidad=$empaque*$cantidad; }
      else
      { $Tcantidad=$cantidad; }
      //---------------------------------------------------
      // precio1_producto,precio2_producto,precio3_producto,precio4_producto
      $sqlPlato=mysqli_query($conex1,"select cod_producto,codigo_barra from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPlato);
      //---------------------------------------------------
      if(isset($proData))
      {
       $cod_producto=$proData['cod_producto'];
       //if(!isset($precio_producto) or $precio_producto==0)
       //{ $precio_producto=$proData['precio1_producto']; }
       //$precio2_producto=$proData['precio2_producto'];
       //$precio3_producto=$proData['precio3_producto'];
       //$precio4_producto=$proData['precio4_producto'];
       $codigo_barra=$proData['codigo_barra'];
       // include("$dirRoot"."datafiles/iva-find.php");
       // $valor_iva=$ivaData['valor_iva'];
      }
      $tipo_iva="A";
      $numFilas=0;
// echo "<br>select id_cuenta from respaldo_cesta where numfactura='$numfactura' and cod_producto='$cod_producto' or empleado='$usuario' and cod_producto='$cod_producto'  and dia='$dia' and mes='$mes'";
      $sql=mysqli_query($conex1, "select idcesta,id_cuenta from respaldo_cesta where numfactura='$numfactura' and cod_producto='$cod_producto' or empleado='$usuario' and cod_producto='$cod_producto'  and dia='$dia' and mes='$mes'");
      $numFilas=mysqli_num_rows($sql);
      if($numFilas==0)
      {
            $sql2="insert into respaldo_cesta(numfactura,cid_cliente,empleado,id_cuenta,cod_producto,codigo_barra,cantidad, empaque, precio1_producto, dia, mes, ano, submitted, anulada)
            values('$numfactura', '$cid_cliente','$usuario', '$id_cuenta', '$cod_producto', '$codigo_barra', '$Tcantidad','$empaque', '$precio_producto',  '$dia', '$mes', '$ano', '$submitted', '$anulada')";
  echo "<br>$sql2<br>";
            $result=mysqli_query($conex1,$sql2);
      }
  }

  // ==================================
  // Ventas Data - Cuenta Data
  // -----------------------------------
  $sqlCuentas=mysqli_query($conex1,"select * from cuentas1 where id_cuenta='$id_cuenta'");
  $cuentaData=mysqli_fetch_array($sqlCuentas);
  if(isset($cuentaData))
  {
        include("../data/cuenta-data.php");
        include("../libs1/calcular-pedido.php");
        if(!isset($cajera))
        { $cajera=$usuario; }
        if(!isset($id_formapago))
        { $id_formapago=""; }
        $numFilas=0;
        $sql=mysqli_query($conex1, "select id_cuenta from ventas where numfactura='$numfactura' and cid_cliente='$cid_cliente' or  cid_cliente='$cid_cliente' and monto_apagar='$monto_apagar' and dia='$dia' and mes='$mes'");
        $numFilas=mysqli_num_rows($sql);
        if($numFilas==0)
        {
          $totalPagos=0;
          if(!isset($sistema))
          { $sistema="C"; }

          $sqlnewventa="insert into ventas(id_cuenta, numfactura,  empleado, cid_cliente, id_formapago, total_venta1, descuento, descuento_venta, total_venta2, monto_apagar, pago_cliente, nota_venta, sistema, anulada, dia, mes, ano, submitted)
          values('$id_cuenta', '$numfactura', '$empleado', '$cid_cliente', '$id_formapago', '$total_venta1', '$descuento', '$descuento_venta', '$total_venta2',  '$monto_apagar', '$totalPagos', '$nota_venta', '$sistema', '$anulada', '$dia', '$mes', '$ano', '$now')";
  //echo "<br>$sqlnewventa";
          $sqlnewventa2=mysqli_query($conex1,$sqlnewventa);
        }
  }
  // Eliminate Data
  $numFilas=0;
  $sql1=mysqli_query($conex1, "select id_venta from ventas where numfactura='$numfactura' or  cid_cliente='$cid_cliente' and monto_apagar='$monto_apagar' and dia='$dia' and mes='$mes'");
  $numFilas=mysqli_num_rows($sql1);
  if($numFilas>0)
  {
    $sqldel="delete from cuentas1 where rand_num='$rand_num'";
    $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
  }

  // Cesta Data
  $sqlCesta=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta'");
  while($cestaData=mysqli_fetch_array($sqlCesta))
  {
    include("../data/cesta-data.php");
    $numFilas=0;
    //echo "<br>select id_cuenta from respaldo_cesta where numfactura='$numfactura' or empleado='$usuario' and cod_producto='$cod_producto' and dia='$dia' and mes='$mes'<br>";
    $sql2=mysqli_query($conex1, "select idcesta,id_cuenta from respaldo_cesta where numfactura='$numfactura' or empleado='$usuario' and cod_producto='$cod_producto' and dia='$dia' and mes='$mes'");
    $numFilas=mysqli_num_rows($sql2);
    if($numFilas>0)
    {
      $sqldel="delete from cuentas2 where rand_num='$rand_num'";
      $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
    }
  }
  //Pagos Data
  $numFilas=0;
  //echo "select id from respaldo_pagos where numfactura='$numfactura' or cid_cliente='$cid_cliente and montopago='$montopago'";
  //$sql3=mysqli_query($conex1, "select id from respaldo_pagos where numfactura='$numfactura' or cid_cliente='$cid_cliente' and montopago='$montopago'");
  //$numFilas=mysqli_num_rows($sql3);
  if($numFilas>0)
  {
    // $sqldel="delete from pagoscliente where rand_num='$rand_num'";
    // echo "$sqldel";
    // $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
  }
}

echo "<html><meta http-equiv=refresh content=0;url=cuentas.php>";
?>

<br><br>
<?php
// $showStatus="N";
$endPage="S";
include("$dirRoot"."includes/statusAdmin.php");
?>
