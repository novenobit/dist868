<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  despacho-printer.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$breadCrumb="S";
$icon="S";
$image="S";
$label="S";
$list="N";
$message="S";
$table="S";
$tableUse="pedido";
$dirRoot="../";
include_once("../includes/headfilePrinter.php");
FechayHora();
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
include_once("../libs1/loader.php");
$reg=0;
// -------------------------------------------------------

if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlPedido1=mysqli_query($conex1,"select * from cuentas1 where
id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlPedido1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }

$numFilas=mysqli_num_rows($sqlPedido1);

// -------------------------------------------------------
if($numFilas>0)
{
 if(!isset($rand_num))
 { $rand_num=rand(); }
 $cuentaData=mysqli_fetch_array($sqlPedido1);
 include("../data/cuenta-data.php");
 if(isset($cuentaData))
 { $cid_cliente=$cuentaData['cid_cliente']; }
 $numFilas=0;
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
  if(isset($nivelprecio) and $nivelprecio<>"")
  {
   include("$dirRoot"."datafiles/find-nivel-precios.php");
   //echo " / NP: $nom_nivel";
  }
  $datos = "$nom_cliente";
  $datos .= " / CI/RIF: $cid_cliente";
  if($dir1_cliente<>"")
  { $datos .= " / ".$dir1_cliente;  }
  if($tel1_cliente<>"")
  { $datos .= " / ".$tel1_cliente;  }
  if($tel2_cliente<>"")
  { $datos .= " / ".$tel2_cliente;  }
  if($email_cliente<>"")
  { $datos .= " / ".$email_cliente;  }
// -------------------------------------------------------
  $datos2="#Cuenta: $id_cuenta";
  if($descuento>0)
  { $datos2 .= " / Descuento: ($descuento)"; }
  if($id_cuenta=="" and $rand_num<>"")
  { $datos2 .= " / #Num: $rand_num"; }
  if($fecha<>"")
  { $datos2 .= " / Fecha: ".$fecha;  }
  if($hora<>"")
  { $datos2 .= " / Hora: ".$hora;  }
  $datos2 .= " / Enviado: $dia/$mes/$ano";
// -------------------------------------------------------
 $to      = 'dags0207@gmail.com,com868@hotmail.com';
 $from    = 'ventas@novenobit.com';
 $subject = 'Pedido: $nom_cliente';
// -------------------------------------------------------

  $message = "<h2>$nom_cliente</h2>
   <div class='content'>$datos</div>
   <div class='content'>$datos2</div>
   <table style='width:600px;'>
    <thead>
     <tr>
      <th class='grey center aligned'>Cant</th>
      <th class='grey center aligned'>Bulto</th>
      <th class='grey center aligned'>Entrega</th>
      <th class='grey center aligned'>Und</th>
      <th class='grey'>Item / Producto</th>
      <th class='grey center aligned'>Precio</th>
     </tr>
    </thead>
    <tbody>";
    $reg=0;
    $num=1;
    $Ttotal=0;
    $numFilas=0;
    $sqlCuentas2=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta'");
    $numFilas=mysqli_num_rows($sqlCuentas2);
    if($numFilas>0)
    {
     while($cuentas2Data=mysqli_fetch_array($sqlCuentas2))
     {
       $id_cuenta=$cuentas2Data['id_cuenta'];
       $id_cuenta=$cuentas2Data['id_cuenta'];
       $id_producto=$cuentas2Data['id_producto'];
       $cantidad=$cuentas2Data['cantidad'];
       //$empaque=$cuentas2Data['empaque'];
       $precio_producto=$cuentas2Data['precio_producto'];
       //$precio=$cuentas2Data['precio'];
   // Find Oroducto
       $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where id_producto='$id_producto'");
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

         if($cuentas2Data['empaque']<>"")
         {
          $empaque=$cuentas2Data['empaque'];
         }
         else
         { $empaque=$proData['empaque']; }
         if($empaque==0 or $empaque=="")
         { $empaque=1; }
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
      // if($proData['empaque']<>$cuentas2Data['empaque'])
      // {
       //  $empaque="";
         //$Tcant="";
       //}
       //if($empaque=="" and $cantidad==1)
       //{ $cantidad=""; }
       //if($empaque=="")
       //{ $cantidad=""; }

       // Cesta Data
       // <td class='center aligned'>$num</td>
       $message .= "<tr>
        <td class='center aligned'>$cantidad</td>
        <td class='center aligned'>$empaque</td>
        <td class='center aligned font-bold font-red font-16'>$Tcant</td>
        <td class='center aligned'>$nom_unidad</td>
        <td>$nom_producto</td>
        <td class='center aligned'>". number_format($precio, 2, '.', '')."</td>
       </tr>";
       $num++;
       $reg++;
     }
    }
   $message .= "</tbody></table>";
   // -------------------------------------------------------
   $headers  = 'MIME-Version: 1.0' . "\r\n";
               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
               $headers .= 'From: ventas@novenobit.com <ventas@novenobit.com>' . "\r\n";
   $success = mail($to, $subject, $message, $headers);

   if (!$success) {
      print_r(error_get_last()['message']);
   }
   echo "<br>Num ".rand();
 }
}
// Imprimir Comandas -----------
$numFilas=0;
$sqlComandas=mysqli_query($conex1,"select id from comandas where id_cuenta='$id_cuenta' and cid_cliente='$cid_cliente'");
$numFilas=mysqli_num_rows($sqlComandas);
if($numFilas==0)
{
   $imprimio="N";
   $tabla="cuentas1";
   $query3="insert into comandas(id_cuenta, cid_cliente,tabla,rand_num, imprimio)
   values('$id_cuenta', '$cid_cliente','$tabla', '$rand_num', '$imprimio')";
   $result3=mysqli_query($conex1,$query3);
}
// ------------------------------
echo "<html><meta http-equiv=refresh content=0;url=outpage.php?sistema=$sistema>";
