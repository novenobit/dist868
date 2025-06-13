<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                             //
//  list-cuentas2.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.    //
// ***************************************************************************
?>

<table class="ui celled padded table">
 <thead>
  <tr>
   <th class='black center aligned'>#</th>
   <th class='black center aligned'>Rif/Ci</th>
   <th class='black'>Cliente</th>
   <th class='black center aligned'>Telf</th>
   <th class='black center aligned'>Items</th>
   <th class='black center aligned'>Total</th>
   <th class='black center aligned'>OP</th>
  </tr>
 </thead>
 <tbody>
<?php
 $reg=0;
 $num=1;
 if($idnivel<=1 or $AreaCuentas=="S")
 { $sqlCuentas=mysqli_query($conex1,"select id_cuenta,cid_cliente,monto_apagar from cuentas1"); }
 else
 {  $sqlCuentas=mysqli_query($conex1,"select id_cuenta, cid_cliente, monto_apagar from cuentas1 where usuario='$usuario'"); }
 while($cuentasData=mysqli_fetch_array($sqlCuentas))
 {
    $id_cuenta=$cuentasData['id_cuenta'];
    $cid_cliente=$cuentasData['cid_cliente'];
    $monto_apagar=$cuentasData['monto_apagar'];
// Datos Cesta
    $numCesta=0;
    $Tmonto_apagar=0;
    $sqlCuentas2=mysqli_query($conex1,"select id_cuenta,id_producto,cantidad from cuentas2 where id_cuenta='$id_cuenta'");
    while($cuentas2Data=mysqli_fetch_array($sqlCuentas2))
    {
      $id_cuenta=$cuentas2Data['id_cuenta'];
      $id_producto=$cuentas2Data['id_producto'];
      $cantidad=$cuentas2Data['cantidad'];
// Producto Data
      $precio=0;
      $sqlPro=mysqli_query($conex1,"select nom_producto,precio1_producto from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPro);
      if(isset($proData))
      {
       $nom_producto=$proData['nom_producto'];
       $precio1_producto=$proData['precio1_producto'];
       $precio=$precio1_producto*$cantidad;
      }
      $Tmonto_apagar=$Tmonto_apagar+$precio;
      $numCesta++;
    }
    // Datos Cliente
    $sqlCliente=mysqli_query($conex1,"select nom_cliente,tel1_cliente from clientes where cid_cliente='$cid_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
    if(isset($clienteData))
    {
      $nom_cliente=$clienteData['nom_cliente'];
      $tel1_cliente=$clienteData['tel1_cliente'];
    }
    else
    {
      $nom_cliente="Sin Datos";
      $tel1_cliente="Sin Datos";
    }
    // Show Data
    echo "<tr>
     <td class='center aligned'>$num</td>
     <td class='center aligned'>$cid_cliente</td>
     <td>$nom_cliente</td>
     <td class='center aligned'>$tel1_cliente</td>
     <td class='center aligned'>$numCesta</td>
     <td class='center aligned'>$Tmonto_apagar</td>
     <td class='center aligned'>";
      if($numCesta==0)
      { echo "<a href='cuenta-del1.php?id_cuenta=$id_cuenta&sistema=$sistema'><i class='folder red delete icon'></i></a>"; }
      else
      { echo "<a href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'><i class='folder open icon'></i></a>"; }
     echo "</td>
    </tr>";
    $num++;
    $reg++;
 }
 if($reg==0)
 {
    echo "<tr><td class='center aligned' colspan='5' style='padding: 60px;'>
     <h1 class='title'>No Hay Datos</h1>
    </td></tr>";
 }
?>
 </tbody>
</table>


