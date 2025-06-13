<h3 class="ui header"><i class="arrow alternate circle down outline icon"></i> Pedidos Online</h3>
<table class="ui fixed unstackable celled long scrolling table">
  <thead>
      <tr>
       <th class='center aligned black'>#</th>
       <th class='center aligned black'>RIF/CI</th>
       <th class='black'>Cliente</th>
       <th class='center aligned black'>Total</th>
       <th class='center aligned black'>OP</th>
      </tr>
  </thead>
  <tbody>
   <?php
      $num=1;
      $reg=0;
      $sqlCuentas=mysqli_query($conex1,"select * from cuentas1");
      while($cartData=mysqli_fetch_array($sqlCuentas))
      {
       $idcart=$cartData['idcart'];
       $numsession=$cartData['numsession'];
       $usuario=$cartData['usuario'];
       $hora=$cartData['hora'];
       // Find Data
       $numFilas1=0;
       $numFilas2=0;
       if(isset($usuario) and $usuario<>"")
       {
        $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente from clientes where email_cliente='$usuario'");
        $numFilas1=mysqli_num_rows($sqlCliente);
        if($numFilas1==0)
        {
         $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente from  cuentas_cliente where email_cliente='$usuario'");
         $numFilas2=mysqli_num_rows($sqlCliente);
        }
        if($numFilas1>0 or $numFilas2>0)
        {
         $clienteData=mysqli_fetch_array($sqlCliente);
        }
       }
       // Cliente Data
       if(isset($clienteData))
       {
         $cid_cliente=$clienteData['cid_cliente'];
         $nom_cliente=$clienteData['nom_cliente'];
       }
       else
       { $cid_cliente="";
         $nom_cliente="";
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
       $sqlPedido2=mysqli_query($conex1,"select * from cuentas2 where numsession='$numsession'");
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
          { echo "<a href='../cta-publico/pedido-ver.php?idcart=$idcart'>$nom_cliente</a>"; }
          else
          { echo "$nom_cliente"; }
         echo "</td>
         <td class='center aligned'>$Ttotal</td>
         <td class='center aligned'>";
          if($cid_cliente=="")
          { echo "<a href='../cta-publico/pedido-limpiar.php?idcart=$idcart'><i class='eraser icon'></i></a>"; }
          else
          { echo "<a href='../cta-publico/pedido-ver.php?idcart=$idcart'><i class='user tie icon'></i></a>"; }

         echo "</td>
        </tr>";
        $reg++;
        $num++;
       }
      }
      if($reg==0)
      {
       echo "<tr><td class='center aligned grey-background' colspan='5' style='padding: 60px;'>
        <h1 class='title'>No Hay Datos</h1>
       </td></tr>";
      }
   ?>
  </tbody>
</table>

