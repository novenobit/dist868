    <h2 class="menu-label">Pedidos Online</h2>
    <table class="ui fixed unstackable celled table">
     <thead>
      <tr>
       <th class='center aligned inverted black'>#</th>
       <th class='center aligned inverted black'>RIF/CI</th>
       <th class='inverted black'>Cliente</th>
       <th class='inverted black center aligned'>Items</th>
       <th class='center aligned inverted black'>Total</th>
       <th class='center aligned inverted black'>OP</th>
      </tr>
     </thead>
     <tbody>
     <?php
      $num=1;
      $reg=0;
      $sqlCuentas=mysqli_query($conex1,"select * from pedido1");
      while($cartData=mysqli_fetch_array($sqlCuentas))
      {
       $idcart=$cartData['idcart'];
       $numsession=$cartData['numsession'];
       $usuario=$cartData['usuario'];
       $hora=$cartData['hora'];
// Datos Cesta
       $numCesta=0;
       $Tmonto_apagar=0;
       $sqlPedido2=mysqli_query($conex1,"select idcart,id_producto,cantidad,precio from pedido2 where numsession='$numsession'");
       while($Pedido2Data=mysqli_fetch_array($sqlPedido2))
       {
         $idcart=$Pedido2Data['idcart'];
         $id_producto=$Pedido2Data['id_producto'];
         $cantidad=$Pedido2Data['cantidad'];
   // Producto Data
         $precio=0;
         $sqlPro=mysqli_query($conex1,"select id_producto,precio1_producto from productos where id_producto='$id_producto'");
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


       // Cliente Data
       if(isset($usuario) and $usuario<>"")
       {
        $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente from clientes where email_cliente='$usuario'");
        $clienteData=mysqli_fetch_array($sqlCliente);
        if(isset($clienteData))
        {
         $cid_cliente=$clienteData['cid_cliente'];
         $nom_cliente=$clienteData['nom_cliente'];
        }
       }
       else
       { $cid_cliente="";
         $nom_cliente="";
       }
       // Cesta Data
       $total=0;
       $Ttotal=0;
       $numFilas=0;
       $sqlPedido2=mysqli_query($conex1,"select * from pedido2 where numsession='$numsession'");
       $numFilas=mysqli_num_rows($sqlPedido2);
       if($numFilas>0)
       {
          while($cartData2=mysqli_fetch_array($sqlPedido2))
          {
            $id_producto=$cartData2['id_producto'];
            $cantidad=$cartData2['cantidad'];
            $precio=$cartData2['precio'];
            $hora=$cartData2['hora'];
            $submitted=$cartData2['submitted'];
            $rand_num=$cartData2['rand_num'];
            if(!isset($cantidad) or $cantidad=="")
            { $cantidad=1;  }
            if($precio>0 and $cantidad>0)
            {
             $total=$precio*$cantidad;
             $Ttotal=$Ttotal+$total;
            }
          }
       }
       if(isset($nom_cliente) and $nom_cliente<>"")
       {
        echo "<tr><td class='center aligned'>$num</td>
         <td class='center aligned'>$cid_cliente</td>
         <td>";
          if(isset($idcart) and $idcart<>"")
          { echo "<a href='../pedidos/pedido-ver.php?idcart=$idcart'>$nom_cliente</a>"; }
          else
          { echo "$nom_cliente"; }
         echo "</td>
         <td class='center aligned'>$numCesta</td>         
         <td class='center aligned'>$Ttotal</td>
         <td class='center aligned'>";
          if($cid_cliente=="")
          { echo "<a href='../pedidos/pedido-limpiar.php?idcart=$idcart'><i class='eraser icon'></i></a>"; }
          else
          { echo "<a href='../pedidos/pedido-ver.php?idcart=$idcart'><i class='user tie icon'></i></a>"; }

         echo "</td>
        </tr>";
        $reg++;
        $num++;
       }
      }
      if($reg==0)
      {
       echo "<tr><td class='center aligned' colspan='5' style='padding: 60px;'>
        <h1 class='title'>No Hay Datos</h1>
       </td>
       </tr>";
      }
    ?>
    </tbody>
   </table>

