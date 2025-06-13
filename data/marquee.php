<?php

// Cuentas
// Pedidos Online = O
// Pedidos Clientes = C
// Pedidos Empleados = E

// Pedidos Online
$numCuentas=0;
$fieldCount="id_cuenta";
$tableCount="cuentas1";
$field="sistema";
include("../bots/count-records1.php");
$numCuentas=$numFields;

if($numCuentas>0)
{
?>
 <marquee border='0' scrolldelay='120' style='background-position: center' width='98%'>
  <span class='font-black font-16 font-pink'>
 <?php
   $num1=1;
   $sqlCuenta=mysqli_query($conex1,"select * from cuentas1");
   while($cuenta1Data=mysqli_fetch_array($sqlCuenta))
   {
    $id_cuenta=$cuenta1Data['id_cuenta'];
    $cid_cliente=$cuenta1Data['cid_cliente'];
    $fecha=$cuenta1Data['fecha'];
    $numFilasC=0;
    $sqlClientes=mysqli_query($conex1,"select cid_cliente,nom_cliente,tel1_cliente from clientes where cid_cliente='$cid_cliente'");
    $numFilasC=mysqli_num_rows($sqlClientes);
    if($numFilasC>0)
    {
     $clienteDataOL=mysqli_fetch_array($sqlClientes);
     $cid_cliente=$clienteDataOL['cid_cliente'];
     $nom_cliente=$clienteDataOL['nom_cliente'];
     echo "<a href='$dirRoot"."cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta'>Rif:".$cid_cliente." ".$nom_cliente." ".$fecha."</a>";
     if($numCuentas>1 and $num1<$numCuentas)
     {
      echo "<i class='angle double left icon'></i> ";
     }
     $num1++;
    }
   }
?>
  </span>
 </marquee>
<?php
}
?>
