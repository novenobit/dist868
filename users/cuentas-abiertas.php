<h3 class="ui header"><i class="arrow alternate circle down outline icon"></i> Cuentas Abiertas</h3>
<table class="ui fixed unstackable celled table">
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
      $sqlCuentas=mysqli_query($conex1,"select id_cuenta,usuario, cid_cliente, monto_apagar from cuentas1 where usuario='$usuario' limit 100");
      while($cuentaData=mysqli_fetch_array($sqlCuentas))
      {
       $id_cuenta=$cuentaData['id_cuenta'];
       $usuario=$cuentaData['usuario'];
       $cid_cliente=$cuentaData['cid_cliente'];
       $monto_apagar=$cuentaData['monto_apagar'];
       // Cliente Data
       if(isset($cid_cliente) and $cid_cliente<>"")
       {
        $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
        $clienteData=mysqli_fetch_array($sqlCliente);
        if(isset($clienteData))
        {
         $nom_cliente=$clienteData['nom_cliente'];
        }
       }
       else
       { $cid_cliente="";
         $nom_cliente="";
       }
       // Cesta Data
       if(isset($nom_cliente) and $nom_cliente<>"")
       {
        echo "<tr><td class='center aligned'>$num</td>
         <td class='center aligned'>$cid_cliente</td>
         <td>";
          if(isset($id_cuenta) and $id_cuenta<>"")
          { echo "<a href='../cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta'>$nom_cliente</a>"; }
          else
          { echo "$nom_cliente"; }
         echo "</td>
         <td class='center aligned'>$monto_apagar</td>
         <td class='center aligned'>";
          if($cid_cliente=="")
          { echo "<a href='delete-cuenta1.php?id_cuenta=$id_cuenta'><i class='eraser icon'></i></a>"; }
          else
          { echo "<a href='../cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta'><i class='user tie icon'></i></a>"; }

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
       </td>
       </tr>";
      }
   ?>
  </tbody>
</table>

