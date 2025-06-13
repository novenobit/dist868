<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  find-pedido1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************

if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlCuentas=mysqli_query($conex1,"select usuario,id_cuenta, cid_cliente, monto_apagar,preparado,chequeado,despachado,nota_venta,rand_num from cuentas1 where id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlPedido1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }

$cuentaData=mysqli_fetch_array($sqlCuentas);
if(isset($cuentaData))
{
  $id_cuenta=$cuentaData['id_cuenta'];
  $usuario=$cuentaData['usuario'];
  $cid_cliente=$cuentaData['cid_cliente'];
  $monto_apagar=$cuentaData['monto_apagar'];
  $preparado=$cuentaData['preparado'];
  $chequeado=$cuentaData['chequeado'];
  $despachado=$cuentaData['despachado'];
  $rand_num=$cuentaData['rand_num'];
  if(!isset($clienteData))
  {
   if($cid_cliente<>"")
   {
    $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
   }
  }
}
?>
