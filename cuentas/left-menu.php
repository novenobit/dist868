<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  left-menu.php                                              //
// ****************************************************************
$numFilas=0;
if($sistema=="e")
{
 if($idnivel<=1 or $AreaCuentas=="S")
 {
   // select id_cuenta,cid_cliente,monto_apagar from cuentas1 where id_cuenta<>'$id_cuenta'
   $sqlCuentas2=mysqli_query($conex1,"select id_cuenta,cid_cliente,monto_apagar from cuentas1");
   $numFilas=mysqli_num_rows($sqlCuentas2);
 }
}
if($sistema=="c" or $sistema=="o")
{
  $sqlCuentas2=mysqli_query($conex1,"select id_cuenta,cid_cliente,monto_apagar from cuentas1 where usuario='$usuario'");
  $numFilas=mysqli_num_rows($sqlCuentas2);
}

if($numFilas>0)
{
?>
  <h3>Cuentas Abiertas</h3>
  <table class="ui celled padded table">
   <tbody>
    <?php
     $reg=0;
     $num=1;
     if(isset($sqlCuentas2) and $numFilas>0)
     {
      while($cuentasData2=mysqli_fetch_array($sqlCuentas2))
      {
          $id_cuenta=$cuentasData2['id_cuenta'];
          $cid_cliente=$cuentasData2['cid_cliente'];
          $monto_apagar=$cuentasData2['monto_apagar'];
      // Datos Cesta
          $numCesta=0;
          $Tmonto_apagar=0;
          $sqlCuentas3=mysqli_query($conex1,"select id_cuenta,id_producto,cantidad from cuentas2 where id_cuenta='$id_cuenta'");
          while($cuentas2Data=mysqli_fetch_array($sqlCuentas3))
          {
            $id_cuenta=$cuentas2Data['id_cuenta'];
            $id_producto=$cuentas2Data['id_producto'];
            $cantidad=$cuentas2Data['cantidad'];
      // Producto Data
            $precio=0;
            $sqlPro=mysqli_query($conex1,"select nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos where id_producto='$id_producto'");
            $proData=mysqli_fetch_array($sqlPro);
            if(isset($proData))
            {
            $nom_producto=$proData['nom_producto'];
            $precio1_producto=$proData['precio1_producto'];
            $precio2_producto=$proData['precio2_producto'];
            $precio3_producto=$proData['precio3_producto'];
            $precio4_producto=$proData['precio4_producto'];
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
          echo "<tr><td>
          <a class='fluid ui button' href='$dirRoot"."cuentas/cuenta-ver1.php?id=$iduser&id_cuenta=$id_cuenta'>
            $cid_cliente<br>$nom_cliente
            <br>Items: ($numCesta) Total: $Tmonto_apagar</a>
          </td>
          </tr>";
          $num++;
          $reg++;
      }
     }
    ?>
   </tbody>
  </table>
<?php
 }
?>
