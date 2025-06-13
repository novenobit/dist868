<?php
// Cliente Data - Nivel de Precio
// include("nivel-precio.php");
if(isset($cid_cliente) and $cid_cliente<>"")
{
  $sqlCliente=mysqli_query($conex1,"select nivelprecio from clientes where cid_cliente='$cid_cliente'");
  $clienteData=mysqli_fetch_array($sqlCliente);
  if(isset($clienteData))
  {
   $id_nivel=4;
   $nivelprecio=$clienteData['nivelprecio'];
   if(!isset($nivelprecio) or $nivelprecio=="")
   { $nivelprecio=1; }
  // include("$dirRoot"."datafiles/find-nivel-precios.php");
  }
}
?>
