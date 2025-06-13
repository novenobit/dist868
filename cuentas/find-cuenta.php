<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  find-cuenta.php                                                         //
// ***************************************************************************

// Datos Cuenta
$reg=0;
if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }
// Datos Cliente
$numFilas=mysqli_num_rows($sqlCuentas1);
if($numFilas>0)
{
 $cuentaData=mysqli_fetch_array($sqlCuentas1);
 include("$dirRoot"."data/cuenta-data.php");
 if(isset($cuentaData))
 { $cid_cliente=$cuentaData['cid_cliente']; }
 $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente,dir1_cliente,tel1_cliente,tel2_cliente,email_cliente,nivelprecio from clientes where cid_cliente='$cid_cliente'");
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
  if(isset($nivelprecio) and $nivelprecio<>"")
  {
   include("$dirRoot"."datafiles/find-nivel-precios.php");
   //$nom_nivel";
  }
 }
}
