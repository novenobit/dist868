<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th style='background-color:#1549e6;color:#fff;'>Cliente</th>
   <th class='center aligned' style='background-color:#1549e6;color:#fff;'>Consumo</th>
  </tr>
 </thead>
 <tbody>
 <?php
  if(!isset($mobile))
  { $mobile="N"; }
  $num=0;
  while($clienteData=mysqli_fetch_array($sqlCliente))
  {
    $fecha="";
    $Tventas=0;
    $sys_ventas="S";
    if($sys_ventas=="S")
    {
      $numVentas=0;
      $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from ventas where cid_cliente='{$clienteData['cid_cliente']}'");
      while($ventasData=mysqli_fetch_array($sql2))
      {
      $Tventas=$Tventas+$ventasData['monto_apagar'];
      $numVentas++;
      $fecha="{$ventasData['dia']}/{$ventasData['mes']}/{$ventasData['ano']}";
      }
    }
    if($numVentas==0)
    { $numVentas=""; }
    $cid=$clienteData['cid_cliente'];
    $nom=$clienteData['nom_cliente'];
    $dir="";
    if($clienteData['dir1_cliente']<>"")
    { $dir=" / ".$clienteData['dir1_cliente']; }
    $tel="";
    if($clienteData['tel1_cliente']<>"")
    { $tel=" / ".$clienteData['tel1_cliente']; }
    $mail="";
    if($clienteData['email_cliente']<>"")
    { $mail=" / ".$clienteData['email_cliente']; }
    $CliData="$nom $dir $tel $mail";
    // ". number_format($Tventas,2,',', '.') . "
    echo "<tr>
      <td class='tdBorder'>
      <a href='abrir-cuenta2.php?id={$clienteData['id_cliente']}sistema=$sistema'>{$clienteData['nom_cliente']}
      <br>CI: {$clienteData['cid_cliente']}  Tel: {$clienteData['tel1_cliente']}</a>
      </td>";
      //if($sys_ventas=="S")
      //{
      echo "<td class='tdBorder center aligned'>";
       if($numVentas<>"" and $numVentas>0)
       {
         echo "Ven: $numVentas Fecha: $fecha";
       }
       else
       {
         echo "nada";
       }

      echo "</td>";

      $num++;
      //}
    echo "</tr>";
  }
  if(isset($sql2))
  { mysqli_free_result($sql2); }
 ?>
 </tbody>
</table>
