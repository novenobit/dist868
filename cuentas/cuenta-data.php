<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  cuenta-data.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
?>
<div class="ui positive message">
 <?php
   // Cuenta Data
   $fields="id_cuenta,usuario,cid_cliente,monto_apagar,hora_abierta,fecha,rand_num";
   if(isset($rand_num) and $rand_num<>"")
   { $sqlCuentas=mysqli_query($conex1,"select $fields  from cuentas1 where rand_num='$rand_num'"); }
   if(isset($id_cuenta) and $id_cuenta<>"")
   { $sqlCuentas=mysqli_query($conex1,"select $fields from cuentas1 where id_cuenta='$id_cuenta'"); }
   $cuentaData=mysqli_fetch_array($sqlCuentas);
   if(isset($cuentaData))
   {
     $id_cuenta=$cuentaData['id_cuenta'];
     $usuario=$cuentaData['usuario'];
     $cid_cliente=$cuentaData['cid_cliente'];
     // $monto_apagar=$cuentaData['monto_apagar'];
     $hora_abierta=$cuentaData['hora_abierta'];
     $fecha=$cuentaData['fecha'];
     $rand_num=$cuentaData['rand_num'];
   }
   // Cliente Data
   $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente from clientes where cid_cliente='$cid_cliente'");
   $clienteData=mysqli_fetch_array($sqlCliente);
   if(isset($clienteData))
   {
    //$id=$clienteData['id_cliente'];
    $id_cliente=$clienteData['id_cliente'];
    $cid_cliente=$clienteData['cid_cliente'];
    $nom_cliente=$clienteData['nom_cliente'];
    $tel1_cliente=$clienteData['tel1_cliente'];
    echo "Cuenta:</b> RIF: $cid_cliente / <strong>$nom_cliente</strong>";
    if($tel1_cliente<>"")
    { echo "$tel1_cliente"; }
   }
 ?>
</div>
<?php
 // include("cuenta-menu.php");
?>
