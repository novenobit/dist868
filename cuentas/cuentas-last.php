<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
?>

<h2 class='center aligned' style="color:#6a49fa;">Ultimos 10 Cuentas</h2>

<div class="ui grid">
  <div class="four column row">
    <div class="column"><button class="fluid ui button"  style="color:#6a49fa;">Todos</button></div>
    <div class="column"><button class="fluid ui button" style="color:#6a49fa;">Empleados</button></div>
    <div class="column"><button class="fluid ui button" style="color:#6a49fa;">Clientes</button></div>
    <div class="column"><button class="fluid ui button" style="color:#6a49fa;">Publico</button></div>
  </div>
</div>

<table class="ui celled padded very long scrolling table">
 <tbody>
<?php
 $reg=0;
 $num=1;

 $sqlCuentas=mysqli_query($conex1,"select usuario,id_cuenta, cid_cliente, descuento, monto_apagar,preparado,chequeado,despachado,fecha,sistema from cuentas1 order by id_cuenta desc limit 10");
 while($cuentasData=mysqli_fetch_array($sqlCuentas))
 {
    $vendedor=$cuentasData['usuario'];
    $id_cuenta=$cuentasData['id_cuenta'];
    $cid_cliente=$cuentasData['cid_cliente'];
    $monto_apagar=$cuentasData['monto_apagar'];
    $descuento=$cuentasData['descuento'];
    $preparado=$cuentasData['preparado'];
    $chequeado=$cuentasData['chequeado'];
    $despachado=$cuentasData['despachado'];
    $fecha=substr($cuentasData['fecha'],0,5);
    $sistema=strtoupper($cuentasData['sistema']);
    $telf="";
    // Datos Cliente
    $sqlCliente=mysqli_query($conex1,"select nom_cliente,tel1_cliente,tel2_cliente,nivelprecio from clientes where cid_cliente='$cid_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
    if(isset($clienteData))
    {
      $nom_cliente=$clienteData['nom_cliente'];
      $tel1_cliente=$clienteData['tel1_cliente'];
      $tel2_cliente=$clienteData['tel2_cliente'];
      $nivelprecio=$clienteData['nivelprecio'];
      if($tel1_cliente<>"")
      { $telf=$tel1_cliente; }
      if($tel2_cliente<>"")
      { $telf=$tel2_cliente; }
    }
    else
    {
      $nom_cliente="Sin Datos";
      $tel1_cliente="Sin Datos";
      $nivelprecio=1;
    }

// Datos Cesta
    $numCesta=0;
    $Tmonto_apagar=0;
    $sqlCuentas2=mysqli_query($conex1,"select id_cuenta,id_producto,cantidad,empaque,precio_producto from cuentas2 where id_cuenta='$id_cuenta'");
    while($cuentas2Data=mysqli_fetch_array($sqlCuentas2))
    {
      $id_cuenta=$cuentas2Data['id_cuenta'];
      $id_producto=$cuentas2Data['id_producto'];
      $cantidad=$cuentas2Data['cantidad'];
     //$empaque=$cuentas2Data['empaque'];
      $precio_producto=$cuentas2Data['precio_producto'];
// Producto Data
      $precio=0;
      $sqlPro=mysqli_query($conex1,"select nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPro);
      if(isset($proData))
      {
       $nom_producto=$proData['nom_producto'];
       if($cuentas2Data['empaque']<>"")
       { $empaque=$cuentas2Data['empaque']; }
       else
       { $empaque=$proData['empaque']; }
       if(!is_numeric($empaque))
       { $empaque=1; }
// Precios
       if($precio_producto>0)
       {
         $precioProducto=$precio_producto;
       }
       if($precio_producto==0 or $precio_producto=="")
       {
          if(!isset($nivelprecio) or $nivelprecio=="")
          { $nivelprecio=1; }
          if($nivelprecio=="1")
          { $precioProducto=$proData['precio1_producto']; }
          if($nivelprecio=="2")
          { $precioProducto=$proData['precio2_producto']; }
          if($nivelprecio=="3")
          { $precioProducto=$proData['precio3_producto']; }
          if($nivelprecio=="4")
          { $precioProducto=$proData['precio4_producto']; }
       }
       $cant=($cantidad*$empaque);
       $precio=$cant*$precioProducto;
      }
      $Tmonto_apagar=$Tmonto_apagar+$precio;
      $numCesta++;
    }

    // Show Data
    echo "<tr>
     <td>
      <a href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'>Dia: $fecha - $nom_cliente - $cid_cliente</a> - <a href='cuenta-cesta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'>Items: $numCesta</a>
     </td>
    </tr>";
    $num++;
    $reg++;
 }
 if($reg==0)
 {
    echo "<tr><td class='center aligned' style='padding: 60px;'>
     <h1 class='title'>No Hay Datos</h1>
    </td></tr>";
 }
?>
 </tbody>
</table>



