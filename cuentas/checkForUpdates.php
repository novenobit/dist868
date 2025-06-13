<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuenta1-ver1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="S";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$noFrame="S";
$popup="N";
$popupWindow="S";
$rating="N";
$sidebar="N";
$slick="N";
$step="S";
$swiper="N";
$table="S";
$tableScroll="S";
$topAdmin="N";
$tableUse="cuentas1";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

// id_cuenta, id_cuenta, id_producto, cantidad, nota_extra, anulado, usuario, hora, submitted, rand_num
// '$id_cuenta', '$id_cuenta', '$id_producto', '$cantidad', '$nota_extra', '$anulado', '$usuario', '$hora', '$submitted', '$rand_num'
$reg=0;
$num=0;
$numFilas=0;
$hora="";
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema="$_GET[sistema]"; }

// id_cuenta, id_cuenta, id_producto, cantidad, nota_extra, anulado, usuario, hora, submitted, rand_num
// '$id_cuenta', '$id_cuenta', '$id_producto', '$cantidad', '$nota_extra', '$anulado', '$usuario', '$hora', '$submitted', '$rand_num'
$reg=0;
if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }

$numFilas=mysqli_num_rows($sqlCuentas1);
if($numFilas>0)
{
 $cuentaData=mysqli_fetch_array($sqlCuentas1);
 include("../data/cuenta-data.php");
 if(isset($cuentaData))
 { $cid_cliente=$cuentaData['cid_cliente']; }

 $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente,dir1_cliente,tel1_cliente,tel2_cliente,email_cliente,nivelprecio,vendedor from clientes where cid_cliente='$cid_cliente'");
 $numFilas=mysqli_num_rows($sqlCliente);
 if($numFilas>0)
 {
  $clienteData=mysqli_fetch_array($sqlCliente);
  $cid_cliente=$clienteData['cid_cliente'];
  $nom_cliente=$clienteData['nom_cliente'];
  $dir1_cliente=$clienteData['dir1_cliente'];
  $tel1_cliente=$clienteData['tel1_cliente'];
  $tel2_cliente=$clienteData['tel2_cliente'];
  $email_cliente=$clienteData['email_cliente'];
  $nivelprecio=$clienteData['nivelprecio'];
  $vendedor=$clienteData['vendedor'];
  $id_nivel=4;
  $nomVendedor="";
  if($vendedor<>"")
  {
   $numFilas=0;
   $sqlEmp=mysqli_query($conex1,"select nombre,apellido from usuarios where cid_usuario='$vendedor'");
   $numFilas=mysqli_num_rows($sqlEmp);
   if($numFilas>0)
   {
     $empData=mysqli_fetch_array($sqlEmp);
     $nombre=$empData['nombre'];
     $apellido=$empData['apellido'];
     $nomVendedor="$nombre $apellido";
   }
  }
 }
 // include("cuenta-menu.php");
 // <form class="ui form"  action="pro-buscar1.php" method="POST" onsubmit="window.open('pro-buscar1.php','width=500,height=300');return false;">
 // echo "<form class='ui form' action='$dirRoot"."productos/pro-buscar1.php' method='POST'>";
?>

 <table class="ui celled long scrolling table" style="width:100%;">
  <thead>
    <tr>
    <th class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'>Cant</th>
    <th class='enter aligned' style='background-color:#22313F;color:#ffffff;width:60px;'>Und</th>
    <th class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'>Emq</th>
    <th class='center aligned' style=background-color:#22313F;color:#ffffff;'width:60px;'>CxE</th>
    <th style='background-color:#22313F;color:#ffffff;'>Item / Producto</th>
    <th class='center aligned' style='background-color:#22313F;color:#ffffff;width:110px;'>Precio</th>
    <th class='center aligned' style='background-color:#22313F;color:#ffffff;width:110px;'>Total</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $reg=0;
  $num=1;
  $Tcant=0;
  $Ttotal=0;
  $numFilas=0;

  // $sqlpedido2=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta'");
  $sqlpedido2=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta' order by empaque desc");
  $numFilas=mysqli_num_rows($sqlpedido2);
  if($numFilas>0)
  {
    while($pedido2Data=mysqli_fetch_array($sqlpedido2))
    {
      $id_cuenta=$pedido2Data['id_cuenta'];
      $id_cuenta=$pedido2Data['id_cuenta'];
      $id_producto=$pedido2Data['id_producto'];
      $cantidad=$pedido2Data['cantidad'];
      $empaqueCesta=$pedido2Data['empaque'];
      $precio_producto=$pedido2Data['precio_producto'];

  // Find Oroducto
      $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque,estado from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPro);
      if(isset($proData))
      {
        $id_producto=$proData['id_producto'];
        $cod_producto=$proData['cod_producto'];
        $cod_categoria=$proData['cod_categoria'];
        $cod_subcategoria=$proData['cod_subcategoria'];
        $nom_producto=$proData['nom_producto'];
        $precio1_producto=$proData['precio1_producto'];
        $precio2_producto=$proData['precio2_producto'];
        $precio3_producto=$proData['precio3_producto'];
        $precio4_producto=$proData['precio4_producto'];
        $nom_unidad=$proData['nom_unidad'];
        $empaquePro=$proData['empaque'];
        $estado=$proData['estado'];
        if($empaquePro==0 or $empaquePro=="")
        { $empaquePro=1; }
        if($empaquePro>1 and $empaqueCesta==1)
        { $nom_unidad="Und"; }
        else
        { $nom_unidad=$nom_unidad; }
        if($nom_unidad==1 or $nom_unidad=="")
        { $nom_unidad="Und"; }

  // Check Price
        if($precio_producto>0)
        {
          $precio=$precio_producto;
        }
        else
        {
          if(!isset($nivelprecio) or $nivelprecio=="")
          { $nivelprecio=1; }
          if($nivelprecio==1)
          { $precio=$precio1_producto; }
          if($nivelprecio==2)
          { $precio=$precio2_producto; }
          if($nivelprecio==3)
          { $precio=$precio3_producto; }
          if($nivelprecio==4)
          { $precio=$precio4_producto; }
        }
        if($cantidad==0 or $cantidad=="")
        {
          $cantidad=1;
          $queryUP="update cuentas2 set cantidad='$cantidad' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
          $result=mysqli_query($conex1,$queryUP);
        }
  // Cuentas2 Data -------------------------------
        if(isset($empaqueCesta) and $empaqueCesta<>"")
        { $empaque=$empaqueCesta;
        // $nom_unidad="Und";
        }

  //---------------------------------------------
        if(is_numeric($empaque))
        { $Tcant=$empaque*$cantidad; }
        else
        { $Tcant=$cantidad; }

        if($Tcant>0 and $precio>0)
        {
          $total=$Tcant*$precio;
          $Ttotal=$Ttotal+$total;
        }
      }
      // Cesta Data
      // <td class='center aligned'>$num</td>

      if($estado=="" or $estado==1)
      { $Testado="Disponible"; }
      else
      { $Testado="No Disponible";
        $nom_producto="$nom_producto <span class='font-red font-10'>$Testado</span>";
      }

      echo "<tr>
      <td class='center aligned' style='width:60px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$cantidad</a></td>
      <td class='center aligned' style='width:60px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$nom_unidad</a></td>
      <td class='center aligned' style='width:60px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$empaqueCesta</a></td>
      <td class='center aligned' style='width:60px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$Tcant</a></td>
      <td><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$nom_producto</a></td>
      <td class='center aligned' style='width:110px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>$precio</a></td>
      <td class='right aligned' style='width:110px;'><a href='cesta-item-ver.php?id_cuenta=$id_cuenta&id_producto=$id_producto&nivelprecio=$nivelprecio&sistema=$sistema' target='data2'>". number_format($total, 2, '.', '')."</a></td>
      </tr>";
      $num++;
      $reg++;
    }
  }
  if($reg==0)
  {
      echo "<tr><td class='center aligned' colspan='8' style='padding: 60px;'>
      <h1 class='title'><strong>No Hay Datos</strong></h1>
      </td></tr>";
  }
  else
  {
    if($Ttotal>0 and $descuento>0)
    {
      echo "<tr>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned'></td>
      <td class='center aligned' style='width:110px;'>Sub-Total</td>
      <td class='right aligned' style='width:110px;'><b>". number_format($Ttotal, 2, '.', '')."</b></td>
      </tr></tfoot>";
      $descuento=$cuentaData['descuento'];
      $descuento_venta=($Ttotal*$descuento)/100;
      $Ttotal=$Ttotal-$descuento_venta;
      if($descuento_venta<>$cuentaData['descuento_venta'])
      {
        $queryUD="update cuentas1 set descuento_venta='$descuento_venta' where id_cuenta='$id_cuenta'";
        $resultUP=mysqli_query($conex1,$queryUD);
      }
      echo "<tr>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned' style='width:60px;'></td>
      <td class='center aligned'>Descuento $descuento %</td>
      <td class='center aligned'></td>
      <td class='right aligned'><b>". number_format($descuento_venta, 2, '.', '')."</b></td>
      </tr>";
    }
    if($Ttotal>0)
    {
      echo "<tfoot><tr>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'>$reg</td>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'></td>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'></td>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;width:60px;'></td>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;'></td>
      <td class='center aligned' style='background-color:#22313F;color:#ffffff;width:110px;'><b>Total</b></td>
      <td class='right aligned' style='background-color:#22313F;color:#ffffff;width:110px;'><b>". number_format($Ttotal, 2, '.', '')."</b></td>
      </tr></tfoot>";
    }
  }
  ?>
  </tbody>
 </table>
<?php
 if($Ttotal>0 and $reg>=2)
 {
    echo "<a class='ui teal button' href='envia-pedido.php?id_cuenta=$id_cuenta' target='data2&sistema=$sistema'>Enviar Pedido</a>";
    echo "<a class='ui blue button' href=\"javascript:popup_center('cuenta-printimage.php?sistema=V&id_cuenta=$id_cuenta&winClose=S&sistema=$sistema','960','740'); \"><i class='camera retro icon'></i> Orden Image</a>";
    echo "<a class='ui violet button' href='cuenta-ver1.php?sistema=V&id_cuenta=$id_cuenta&winClose=S&sistema=$sistema'>Reload</a>";
 }

 if($Ttotal>0)
 {
    $step1="step";
    $step2="step";
    $step3="step";
    $op1="S";
    $op2="S";
    $op3="S";
    $style1="background:#dcdcdc;color:#000;";
    $style2="background:#dcdcdc;color:#000;";
    $style3="background:#dcdcdc;color:#000;";
    if($cuentaData['preparado']=="S")
    { $step1="completed step";
      $style1="background:#12f7ff;color:#000;";
      $op1="N";
    }
    if($cuentaData['chequeado']=="S")
    { $step2="completed step";
      $style2="background:#12f7ff;color:#000;";
      $op2="N";
    }
    if($cuentaData['despachado']=="S")
    { $step3="completed step";
      $style3="background:#12f7ff;color:#000;";
      $op3="N";
    }
    $linkPreparado="#";
    $linkChequeado="#";
    $linkDespachado="#";

    if(isset($AreaAdmin) and $AreaAdmin=="S")
    {
      $linkPreparado="pcd.php?id_cuenta=$id_cuenta&op1=$op1&sistema=$sistema";
      $linkChequeado="pcd.php?id_cuenta=$id_cuenta&op2=$op2&sistema=$sistema";
      $linkDespachado="pcd.php?id_cuenta=$id_cuenta&op3=$op3&sistema=$sistema";
    ?>
    <div class="ui steps"  style="width:100%;">
      <a class="<?php echo $step1; ?>" href='<?php echo "$linkPreparado"; ?>' target='data2' style="<?php echo $style1; ?>">
        <i class="archive icon"></i>
        <div class="content">
          <div class="title">Preparado:</div>
        </div>
      </a>
      <a class="<?php echo $step2; ?>" href='<?php echo "$linkChequeado"; ?>' target='data2' style="<?php echo $style2; ?>">
        <i class="eye icon"></i>
        <div class="content">
          <div class="title">Chequeado:</div>
        </div>
      </a>
      <a class="<?php echo $step3; ?>" href='<?php echo "$linkDespachado"; ?>' target='data2' style="<?php echo $style3; ?>">
        <i class="large truck icon"></i>
        <div class="content">
          <div class="title">Despachado:</div>
        </div>
      </a>
    </div>
  <?php
    }
    else
    {
?>
    <div class="ui steps"  style="width:100%;">
      <a class="<?php echo $step1; ?>" style="<?php echo $style1; ?>">
        <i class="archive icon"></i>
        <div class="content">
          <div class="title">Preparado:</div>
        </div>
      </a>
      <a class="<?php echo $step2; ?>" href='#' style="<?php echo $style2; ?>">
        <i class="eye icon"></i>
        <div class="content">
          <div class="title">Chequeado:</div>
        </div>
      </a>
      <a class="<?php echo $step3; ?>" href='#' style="<?php echo $style3; ?>">
        <i class="large truck icon"></i>
        <div class="content">
          <div class="title">Despachado:</div>
        </div>
      </a>
    </div>
<?php
    }
 }



 //  style="background-color:#404040;color:#fff;"
 //  echo "<p>Preparado ". $cuentaData['preparado'];
 //  echo "<br>Chequeado ".$cuentaData['chequeado'];
 //  echo "<br>Despachado ".$cuentaData['despachado']."</p>";
 if($reg>0)
 {
  if(!isset($numPagos))
  {
   $numPagos=0;
   $sqlPagos=mysqli_query($conex1,"select id,montopago from pagoscliente where id_cuenta='$id_cuenta'");
   $numPagos=mysqli_num_rows($sqlPagos);
   if($numPagos>0)
   {
    $pagoData=mysqli_fetch_array($sqlPagos);
    $montopago=$pagoData['montopago'];
    if($montopago<$monto_apagar)
    { }
   }
  }
 }
}

if($reg>0)
{
 // echo "<a 'limpia-cesta.php?id_cuenta=$id_cuenta' target='result'>Limpia Cesta</a>";
}
