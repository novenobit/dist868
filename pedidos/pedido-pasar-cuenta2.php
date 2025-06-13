<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  ver-pedidos.php                                                         //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$noFrame="N";
$header="N";
$menu="N";
$list="N";
$popup="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$forms="N";
$topFile="N";
$topAdmin="N";
$dropdown="N";
$dirRoot="../";

include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['idcart']))
{ $idcart=$_GET['idcart']; }


if(isset($idcart) and $idcart<>"")
{
  include_once("../libs/loader.php");
  echo "idcart $idcart";
  $reg=0;
  $num=1;
  $numFilas=0;
  $totalCuenta=0;
  $sqlpedirOnline1=mysqli_query($conex1,"select * from pedironline1 where idcart='$idcart'");
  $numFilas=mysqli_num_rows($sqlpedirOnline1);
  if($numFilas>0)
  {
   // pedirOnline1
   $pedidoData1=mysqli_fetch_array($sqlpedirOnline1);
   if(isset($pedidoData1))
   {
      $idcart=$pedidoData1['idcart'];
      $numsession=$pedidoData1['numsession'];
      $email=$pedidoData1['usuario'];
      $hora=$pedidoData1['hora'];
      $submitted=$pedidoData1['submitted'];
      $rand_num=$pedidoData1['rand_num'];
//---------------------------------------
   // Clientes Data
      if(isset($email) or $email<>"")
      {
   // Find Cliente Data
       $numCliente1=0;
       $numCliente2=0;
       $numCliente3=0;
       $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel1_cliente,tel2_cliente,email_cliente from clientes where email_cliente='$email' and activo='S'");
       $numCliente1=mysqli_num_rows($sqlCliente);
       if($numCliente1>0)
       {
         $clienteData=mysqli_fetch_array($sqlCliente);
         if(isset($clienteData))
         {
            $id=$clienteData['id_cliente'];
            $id_cliente=$clienteData['id_cliente'];
            $cid_cliente=$clienteData['cid_cliente'];
            $email_cliente=$clienteData['email_cliente'];
            $nom_cliente=$clienteData['nom_cliente'];
            $tel1_cliente=$clienteData['tel1_cliente'];
            $telefono=$clienteData['tel2_cliente'];
         }
       }
       if($numCliente1==0)
       {
        $sqlCliente=mysqli_query($conex1,"select * from pedido_cliente where email_cliente='$email' and activo='S'");
        $numCliente2=mysqli_num_rows($sqlCliente);
        if($numCliente2>0)
        {
           $clienteData=mysqli_fetch_array($sqlCliente);
           if(isset($clienteData))
           {
             $id=$clienteData['id_cliente'];
             $id_cliente=$clienteData['id_cliente'];
             $cid_cliente=$clienteData['cid_cliente'];
             $email_cliente=$clienteData['email_cliente'];
             $nom_cliente=$clienteData['nom_cliente'];
             $tel1_cliente=$clienteData['tel1_cliente'];
             $telefono=$clienteData['tel2_cliente'];
           }
        }
       }
       if($numCliente1==0 and $numCliente2==0)
       {
        $sqlCliente=mysqli_query($conex1,"select * from usuarios where email='$email' and activo='S'");
        $numCliente3=mysqli_num_rows($sqlCliente);
        if($numCliente3>0)
        {
           $clienteData=mysqli_fetch_array($sqlCliente);
           if(isset($clienteData))
           {
            $id=$clienteData['iduser'];
            $id_cliente=$clienteData['iduser'];
            $cid_cliente=$clienteData['cid_usuario'];
            $email_cliente=$clienteData['email'];
            $nom_cliente=$clienteData['nombre']." ".$clienteData['apellido'];
            $telefono=$clienteData['telefono'];
            $tel1_cliente=$clienteData['celular'];
           }
        }
       }
       if($numCliente1==0 and $numCliente2==0 and $numCliente3==0)
       {
          $error="Error en los Datos o el Cliente no Existe";
          error();
          /// echo "<html><meta http-equiv=refresh content=3;url=cesta-checkout.php>";
          exit();
       }
        echo "<div class='ui message'>
         <div class='header'>";
          echo "<p>CI/RIF: $cid_cliente / Cliente: <strong>$nom_cliente</strong>";
           if($tel1_cliente<>"")
           { echo " / Telf: $tel1_cliente"; }
         echo "</p></div>
        </div>";
      }
      else
      {
        $error="error datos del cliente";
        echo  $error;
      }

//-----------------------------------------------------------
      $activo="S";
// Insert Cliente Data
      $id_pais="ve";
      $ip_cliente="";
      if(!isset($empresa_cliente))
      { $empresa_cliente=""; }
      if(!isset($ciudad_cliente))
      { $ciudad_cliente=""; }
      if(!isset($estado_cliente))
      { $estado_cliente=""; }
      if(!isset($tel1_cliente))
      { $tel1_cliente=""; }
      if(!isset($tel2_cliente))
      { $tel2_cliente=""; }
      if(!isset($dir1_cliente))
      { $dir1_cliente=""; }
      if(!isset($dir2_cliente))
      { $dir2_cliente=""; }
      if(!isset($url_cliente))
      { $url_cliente=""; }
      if(!isset($nivelprecio))
      { $nivelprecio=0; }
      if(!isset($foto_cliente))
       { $foto_cliente=""; }
      if(!isset($lista_correo))
      { $lista_correo=""; }
      if(!isset($descuento))
      { $descuento=""; }
      if(!isset($vendedor))
      { $vendedor=""; }
      if(!isset($tipo_cliente))
      { $tipo_cliente="DET"; }
      if(!isset($nota_cliente))
      { $nota_cliente=""; }
      if(!isset($contribuyente))
      { $contribuyente="", }
      if(!isset($cod_cliente) or cod_cliente=="")
      { $cod_cliente=md5($cid_cliente); }

      $query2="insert into clientes(cid_cliente, cod_cliente, nom_cliente, empresa_cliente, dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, id_pais, tel1_cliente, tel2_cliente,  email_cliente, url_cliente, foto_cliente, tipo_cliente, nivelprecio, nota_cliente, contribuyente, lista_correo, vendedor, ip_cliente, activo)
      values('$cid_cliente', '$cod_cliente', '$nom_cliente', '$empresa_cliente', '$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$id_pais', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$url_cliente', '$foto_cliente', '$tipo_cliente', '$nivelprecio', '$nota_cliente', '$contribuyente', '$lista_correo', '$vendedor', '$ip_cliente','S')";
//    echo "<br>sss $query2 / $numCliente3";
      $result2=mysqli_query($conex1,$query2);
   }
  }
// Verifica los Datos
  $num_filas=0;
  $sqlCliente=mysqli_query($conex1,"select id_cliente from clientes where email_cliente='$email_cliente'");
  $num_filas=mysqli_num_rows($sqlCliente);
  if($num_filas==0)
  {
         $error="Error agregando los datos del Cliente";
         error();
         exit();
  }
// Insert Data de pedirOnline1 a Cuentas1
      //$usuario
      //$cid_cliente
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
      $cerracuenta_venta="";
      $fecha=$hoydia;
      $fiscalfile="";
      $nota_venta="";
      //$rand_num
      $sqlInsert="insert into cuentas1(usuario, cid_cliente, total_venta1, descuento, descuento_venta, total_venta2, valor_iva, impuesto_iva, valor_igtf, impuesto_igtf, servicios, monto_apagar, pago_cliente, total_cambio, hora_abierta, hora_cerrar, pago_cambio, preparado,chequeado,despachado, cerracuenta_venta, fecha, fiscalfile, nota_venta, rand_num)
      values('$usuario', '$cid_cliente', $total_venta1, '$descuento', $descuento_venta, $total_venta2, '$valor_iva', '$impuesto_iva', '$valor_igtf', '$impuesto_igtf', '$servicios', $monto_apagar, $pago_cliente, $total_cambio, '$hora_abierta', '$hora_cerrar', '$pago_cambio', '$preparado', '$chequeado', '$despachado', '$cerracuenta_venta', '$fecha', '$fiscalfile', '$nota_venta', '$rand_num')";
      $resultInsert=mysqli_query($conex1,$sqlInsert);
   //   echo "<html><meta http-equiv=refresh content=1;url=cuenta-ver1.php?rand_num=$rand_num>";

//  $sqlInsert="insert into cuentas1(usuario, cid_cliente, total_venta1, descuento, descuento_venta, total_venta2, valor_iva, impuesto_iva, valor_igtf, impuesto_igtf, servicios, monto_apagar, pago_cliente, total_cambio, hora_abierta, hora_cerrar, pago_cambio, cerracuenta_venta, fecha, fiscalfile, nota_venta, rand_num)
//  values('$cid_cliente','$cid_cliente',NULL,'',NULL, NULL,NULL,'0.00', '0.00','0.00','0.00', NULL,NULL,NULL,'$hoyhora', '','', '', '$hoydia', '','','$rand_num')";
//  $resultInsert=mysqli_query($conex1,$sqlInsert);
// Verifica los Datos Cuentas
  $num_filas=0;
  $sqlCuenta=mysqli_query($conex1,"select id_cuenta from cuentas1 where cid_cliente='$cid_cliente'");
  $num_filas=mysqli_num_rows($sqlCuenta);
  if($num_filas==0)
  {
         $error="Error agregando los datos de la Cuenta";
         error();
         exit();
  }
  $cuent1Data=mysqli_fetch_array($sqlCuenta);
  $id_cuenta=$cuent1Data['id_cuenta'];
// Insert Data de pedirOnline2 a Cuentas2
  $sqlpedirOnline2=mysqli_query($conex1,"select * from pedironline2 where numsession='$numsession'");
  while($pedidoData2=mysqli_fetch_array($sqlpedirOnline2))
  {
          $idcart=$pedidoData2['idcart'];
          $id_producto=$pedidoData2['id_producto'];
          $cantidad=$pedidoData2['cantidad'];
          if($cantidad==0 or $cantidad=="")
          { $cantidad=1; }
          $precio=$pedidoData2['precio'];
          $usuario=$pedidoData2['usuario'];
          $hora=$pedidoData2['hora'];
          $submitted=$pedidoData2['submitted'];
          $rand_num=$pedidoData2['rand_num'];
          $nota_extra="";
// Insert Data a Cuentas2
          $query3="insert into cuentas2(id_cuenta, id_producto, cantidad, nota_extra, usuario, hora, submitted, rand_num)
          values('$id_cuenta','$id_producto','$cantidad','$nota_extra', '$usuario', '$hora', '$submitted','$rand_num')";
          $result3=mysqli_query($conex1,$query3);
          $num++;
          $reg++;
  }
}


//Find Data -----------------------
$_SESSION['rand_num']=$rand_num;

$numpedirOnline1=0;
$numpedirOnline2=0;

$sqlpedirOnline1=mysqli_query($conex1,"select id_cuenta from cuentas1 where rand_num='$rand_num'");
$numpedirOnline1=mysqli_num_rows($sqlpedirOnline1);
if($numpedirOnline1>0)
{
 $sqldel="delete from pedironline1 where rand_num='$rand_num'";
 $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());

}
$sqlpedirOnline2=mysqli_query($conex1,"select idcesta from cuentas2 where rand_num='$rand_num'");
$numpedirOnline2=mysqli_num_rows($sqlpedirOnline2);
if($numpedirOnline2>0)
{
 $sqldel="delete from pedironline2 where rand_num='$rand_num'";
 $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
}
$sql1="repair table cuentas1,cuentas2,pedironline1,pedironline2";
$result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
?>


<script language="javaScript">
function resize()
{
    window.parent.autoResize();
}
$(window).on('resize', resize);
</script>

<?php
echo "<html><meta http-equiv=refresh content=0;url=pedidos.php>";
exit();
?>
