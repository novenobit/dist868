<?php
$numCuenta=0;
$sqlCuenta=mysqli_query($conex1,"select * from cuentas1");
$numCuenta=mysqli_num_rows($sqlCuenta);

if($numCuenta>0)
{
?>
   <h2>Cuentas</h2>
   <table class="ui five column celled table">
    <thead>
     <tr>
      <th class='blue center aligned' style='width:80px'>#</th>
      <th class='blue center aligned'>Fecha</th>
      <th class='blue'>Cliente</th>
      <th class='blue center aligned'>Prod</th>
      <th class='blue center aligned' style='width:100px'>OP</th>
      </tr>
    </thead>
    <tbody>
   <?php
     $reg=0;
     $num=1;
     $Ttotal=0;
     $numFilas=0;
     while($cuentaData=mysqli_fetch_array($sqlCuenta))
     {
       $id_cuenta=$cuentaData['id_cuenta'];
       $cid_cliente=$cuentaData['cid_cliente'];
       $total_venta1=$cuentaData['total_venta1'];
       $fecha=$cuentaData['fecha'];
       // Cliente Data
       $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
       $clienteData=mysqli_fetch_array($sqlCliente);
       if(isset($clienteData))
       {
         $nom_cliente=$clienteData['nom_cliente'];
       }
       else
       {
         $nom_cliente="";
       }
       // Productos Data
       $numPro=0;
       $sql=mysqli_query($conex1, "select id_cuenta from cuentas2 where id_cuenta='$id_cuenta'");
       $numPro=mysqli_num_rows($sql);

       // Ventas Data
       echo "<tr>
        <td class='center aligned' style='width:80px'>$num</td>
        <td class='center aligned'>$fecha</td>
        <td>$nom_cliente</td>
        <td class='center aligned'>$numPro</td>
        <td class='center aligned' style='width:100px'>";
       // echo "<a class='ui orange button' href=\"javascript:popup_center('../cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta','800','600'); \">Ver</a>
       echo "<a class='ui orange button' href='../cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta' target='_blank'>Ver</a>
        </td>
       </tr>";
       $num++;
       $reg++;
     }

     if($reg==0)
     {
         echo "<tr><td class='center aligned' colspan='5' style='padding:60px;'>
         <h1 class='title'><strong>No Hay Datos</strong></h1>
         </td></tr>";
     }
     if($Ttotal>0)
     {
         echo "<tr>
         <td class='center aligned black' style='width:100px'></td>
         <td class='center aligned black'><b>Total</b></td>
         <td class='center aligned black'></td>
         <td class='center aligned black'></td>
         <td class='center aligned black'><b>$Ttotal</b></td>
         <td class='center aligned black' style='width:100px'></td>
         </tr>";
     }

   ?>
    </tbody>
   </table>
<?php
}
if($numPedido>0)
{
?>
   <h2>Pedidos</h2>
   <table class="ui five column celled table">
    <thead>
     <tr>
      <th class='blue center aligned' style='width:80px'>#</th>
      <th class='blue center aligned'>Fecha</th>
      <th class='blue'>Cliente</th>
      <th class='blue center aligned'>Prod</th>
      <th class='blue center aligned' style='width:100px'>OP</th>
      </tr>
    </thead>
    <tbody>
   <?php
     $reg=0;
     $num=1;
     $Ttotal=0;
     $numFilas=0;
     while($pedidoData=mysqli_fetch_array($sqlPedido))
     {
       $id_cuenta=$pedidoData['id_cuenta'];
       $cid_cliente=$pedidoData['cid_cliente'];
       $total_venta1=$pedidoData['total_venta1'];
       $fecha=$pedidoData['fecha'];
       // Cliente Data
       $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
       $clienteData=mysqli_fetch_array($sqlCliente);
       if(isset($clienteData))
       {
         $nom_cliente=$clienteData['nom_cliente'];
       }
       else
       {
         $nom_cliente="";
       }
       // Productos Data
       $numPro=0;
       $sql=mysqli_query($conex1, "select id_cuenta from cuentas2 where id_cuenta='$id_cuenta'");
       $numPro=mysqli_num_rows($sql);

       // Ventas Data
       echo "<tr>
        <td class='center aligned' style='width:80px'>$num</td>
        <td class='center aligned'>$fecha</td>
        <td>$nom_cliente</td>
        <td class='center aligned'>$numPro</td>
        <td class='center aligned' style='width:100px'>";
         //echo "<a class='ui orange button' href=\"javascript:popup_center('cuentas/cuentas-ver1.php?id_cuenta=$id_cuenta','800','600'); \">Ver</a>
         echo "<a class='ui orange button' href='cuentas/cuentas-ver1.php?id_cuenta=$id_cuenta' target='_blank'>Ver</a>
        </td>
       </tr>";
       $num++;
       $reg++;
     }

     if($reg==0)
     {
         echo "<tr><td class='center aligned' colspan='5' style='padding:60px;'>
         <h1 class='title'><strong>No Hay Datos</strong></h1>
         </td></tr>";
     }
     if($Ttotal>0)
     {
         echo "<tr>
         <td class='center aligned black' style='width:100px'></td>
         <td class='center aligned black'><b>Total</b></td>
         <td class='center aligned black'></td>
         <td class='center aligned black'></td>
         <td class='center aligned black'><b>$Ttotal</b></td>
         <td class='center aligned black' style='width:100px'></td>
         </tr>";
     }

   ?>
    </tbody>
   </table>
<?php
}
if($numPedirOL>0)
{
?>
   <h2>OnLine</h2>
   <table class="ui five column celled table">
    <thead>
     <tr>
      <th class='blue center aligned' style='width:80px'>#</th>
      <th class='blue center aligned'>Fecha</th>
      <th class='blue'>Cliente</th>
      <th class='blue center aligned'>Prod</th>
      <th class='blue center aligned' style='width:100px'>OP</th>
      </tr>
    </thead>
    <tbody>
   <?php
     $reg=0;
     $num=1;
     $Ttotal=0;
     $numFilas=0;
     while($pedidoOLData=mysqli_fetch_array($sqlCartOL))
     {
       $idcart=$pedidoOLData['idcart'];
       $usuario=$pedidoOLData['usuario'];
       $submitted=$pedidoOLData['submitted'];
       // Cliente Data
       $sqlCliente=mysqli_query($conex1,"select nom_cliente from cuentas_cliente where cid_cliente='$usuario' or email_cliente='$usuario'");
       $clienteData=mysqli_fetch_array($sqlCliente);
       if(isset($clienteData))
       {
         $nom_cliente=$clienteData['nom_cliente'];
       }
       else
       {
         $nom_cliente="";
       }
       // Productos Data
       $numPro=0;
       $sql=mysqli_query($conex1, "select id_cuenta from cuentas2 where idcart='$idcart'");
       $numPro=mysqli_num_rows($sql);

       // Ventas Data
       echo "<tr>
        <td class='center aligned' style='width:80px'>$num</td>
        <td class='center aligned'>$fecha</td>
        <td>$nom_cliente</td>
        <td class='center aligned'>$numPro</td>
        <td class='center aligned' style='width:100px'>";
         //echo "<a class='ui orange button' href=\"javascript:popup_center('../cta-publico/pedido-ver.php?idcart=$idcart','800','600');\">Ver</a>
         echo "<a class='ui orange button' href='../cta-publico/pedido-ver.php?idcart=$idcart' target='_blank'>Ver</a>
        </td>
       </tr>";
       $num++;
       $reg++;
     }

     if($reg==0)
     {
         echo "<tr><td class='center aligned' colspan='5' style='padding:60px;'>
         <h1 class='title'><strong>No Hay Datos</strong></h1>
         </td></tr>";
     }
   ?>
    </tbody>
   </table>
<?php
}
?>
