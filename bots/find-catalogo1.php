<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  ffind-catalogo1.php                                                     //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************

$sqlCuentas=mysqli_query($conex1,"select * from catalogos1 where idcatalgo='$idcatalgo'");
$catalogData=mysqli_fetch_array($sqlCuentas);
if(isset($catalogData))
{
  $idcatalgo=$catalogData['idcatalgo'];
  $usuario=$catalogData['usuario'];
  $cid_cliente=$catalogData['cid_cliente'];
  $nombre=$catalogData['nombre'];
  $hora=$catalogData['hora'];
  $fecha=$catalogData['fecha'];
  $nota_extra=$catalogData['nota_extra'];
  $rand_num=$catalogData['rand_num'];
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
