    <h2 class="menu-label">Cesta Online</h2>
    <table class="ui fixed unstackable celled inverted table">
     <thead>
      <tr>
       <th class='center aligned inverted grey'>Fecha</th>
       <th class='center aligned inverted grey'>RIF/CI</th>
       <th class='inverted grey'>Cliente</th>
       <th class='inverted grey center aligned'>Items</th>
       <th class='center aligned inverted grey'>Total</th>
       <th class='center aligned inverted grey'>OP</th>
      </tr>
     </thead>
     <tbody>
     <?php
      $num=1;
      $reg=0;
      $sqlCuentas=mysqli_query($conex1,"select * from pedironline1");
      while($pedirOnline1Data=mysqli_fetch_array($sqlCuentas))
      {
       $idcart=$pedirOnline1Data['idcart'];
       $numsession=$pedirOnline1Data['numsession'];
       $usuario=$pedirOnline1Data['usuario'];
       $hora=$pedirOnline1Data['hora'];
       $submitted=$pedirOnline1Data['submitted'];

       // Cliente Data
       if(isset($usuario) and $usuario<>"")
       {
        $numFilas1=0;
        $numFilas2=0;
        $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente from clientes where email_cliente='$usuario'");
        $numFilas1=mysqli_num_rows($sqlCliente);
        if($numFilas1==0)
        {
         $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente from pedido_cliente where email_cliente='$usuario'");
         $numFilas1=mysqli_num_rows($sqlCliente);
        }
        if($numFilas1==0)
        {
         $sqlCliente=mysqli_query($conex1,"select cid_usuario,nombre,apellido from usuarios where email='$usuario'");
         $numFilas2=mysqli_num_rows($sqlCliente);
        }
        if($numFilas1>0 and $numFilas2==0)
        {
          $clienteData=mysqli_fetch_array($sqlCliente);
          if(isset($clienteData))
          {
           $cid_cliente=$clienteData['cid_cliente'];
           $nom_cliente=$clienteData['nom_cliente'];
          }
          mysqli_free_result($sqlCliente);
        }
        if($numFilas1==0 and $numFilas2>0)
        {
          $clienteData=mysqli_fetch_array($sqlCliente);
          if(isset($clienteData))
          {
           $cid_cliente=$clienteData['cid_usuario'];
           $nom_cliente=$clienteData['nombre']."".$clienteData['apellido'];
          }
          mysqli_free_result($sqlCliente);
        }
       }
       else
       { $cid_cliente="Sin Datos";
         $nom_cliente="Sin Nombre ";
       }

// Datos Cesta
       $numCesta=0;
       $Tmonto_apagar=0;
       $sqlpedirOnline2=mysqli_query($conex1,"select * from pedironline2 where numsession='$numsession'");
       while($pedirOnline2Data=mysqli_fetch_array($sqlpedirOnline2))
       {
         $idcart=$pedirOnline2Data['idcart'];
         $id_producto=$pedirOnline2Data['id_producto'];
         $cantidad=$pedirOnline2Data['cantidad'];
   // Producto Data
         $precio=0;
         $sqlPro=mysqli_query($conex1,"select id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos where id_producto='$id_producto'");
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
       // Cesta Data
       $total=0;
       $Ttotal=0;
       $numFilas=0;
       $sqlpedirOnline2=mysqli_query($conex1,"select * from pedironline2 where numsession='$numsession'");
       $numFilas=mysqli_num_rows($sqlpedirOnline2);
       if($numFilas>0)
       {
          while($pedirOnline2Data=mysqli_fetch_array($sqlpedirOnline2))
          {
            $id_producto=$pedirOnline2Data['id_producto'];
            $cantidad=$pedirOnline2Data['cantidad'];
            $precio=$pedirOnline2Data['precio'];
            $hora=$pedirOnline2Data['hora'];
            $submitted=$pedirOnline2Data['submitted'];
            $rand_num=$pedirOnline2Data['rand_num'];
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
        echo "<tr><td class='center aligned'>$submitted</td>
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
          { echo "<a class='ui orange button' href='../pedidos/pedido-ver.php?idcart=$idcart'>ver</a>"; }

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

