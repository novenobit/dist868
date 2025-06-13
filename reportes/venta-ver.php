<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  venta-ver.php                                                           //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$grids="S";
$table="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $sqlVentas=mysqli_query($conex1,"select id_venta,numfactura,cid_cliente,monto_apagar,dia,mes,ano from ventas where id_venta='$id'");
 $ventaData=mysqli_fetch_array($sqlVentas);
 if(isset($ventaData))
 {
   $id_venta=$ventaData['id_venta'];
   $numfactura=$ventaData['numfactura'];
   $cid_cliente=$ventaData['cid_cliente'];
   $monto_apagar=$ventaData['monto_apagar'];
   $dia=$ventaData['dia'];
   $mes=$ventaData['mes'];
   $ano=$ventaData['ano'];
 }
}
?>

<h2>Reporte Venta</h2>

<?php
        // Ventas Data
         echo "<b>#Control:</b> $numfactura / Monto a Pagar: $monto_apagar / Fecha: <strong>$dia/$mes/$ano</strong>";
        // Cliente Data
        $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente from clientes where cid_cliente='$cid_cliente'");
        $clienteData=mysqli_fetch_array($sqlCliente);
        if(isset($clienteData))
        {
         $id=$clienteData['id_cliente'];
         $cid_cliente=$clienteData['cid_cliente'];
         $nom_cliente=$clienteData['nom_cliente'];
         $tel1_cliente=$clienteData['tel1_cliente'];
         echo "<br><b>Cuenta:</b> RIF: $cid_cliente / Cliente: <strong>$nom_cliente</strong>";
         if($tel1_cliente<>"")
         { echo " / Telf: $tel1_cliente"; }
        }
        // Datos Productos de la Compra
        $numFilas=0;
        $sqlCuentas=mysqli_query($conex1,"select idcesta,id_cuenta from respaldo_cesta where numfactura='$numfactura'"); //  and cid_cliente='$cid_cliente'
        $numFilas=mysqli_num_rows($sqlCuentas);
        if($numFilas>0)
        {
         include("respaldo_cesta.php");
        }
        // Datos Pagos de la Compra
        $numFilas=0;
        $sqlPagos=mysqli_query($conex1,"select id_cuenta from respaldo_pagos where numfactura='$numfactura'"); //  and cid_cliente='$cid_cliente'
        $numFilas=mysqli_num_rows($sqlPagos);
        if($numFilas>0)
        {
          include("respaldo-pagos.php");
        }
?>

