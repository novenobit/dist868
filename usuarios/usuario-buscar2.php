<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='black center aligned'>CI/RIF</th>
   <th class='black'>Nombre Cliente</th>
   <th class='black center aligned'>Telf</th>
   <th class='black center aligned'>Consumo</th>
   <th class='black center aligned'>Fecha</th>
  </tr>
 </thead>
 <tbody>
<?php
if(!isset($mobile))
{ $mobile="N"; }

while($clienteData=mysqli_fetch_array($sqlCliente))
{
 $fecha="";
 $Tventas=0;
 $num=0;
 $sys_ventas="S";
 if($sys_ventas=="S")
 {
  $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from ventas where cid_cliente='{$clienteData['cid_cliente']}'");
  while($ventasData=mysqli_fetch_array($sql2))
  {
   $Tventas=$Tventas+$ventasData['monto_apagar'];
   $num++;
   $fecha="{$ventasData['dia']}/{$ventasData['mes']}/{$ventasData['ano']}";
  }
 }
 if($num==0)
 { $num=""; }
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
  <td class='center aligned'>
   <a data-inverted='' data-tooltip='$CliData' data-position='top left' href='cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}'>{$clienteData['cid_cliente']}</a>
  </td>
  <td>";
    echo "<a  href='cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}'>{$clienteData['nom_cliente']}</a>";
  echo "</td>";
  if($sys_ventas=="S")
  {
   echo "<td class='center aligned'>
    {$clienteData['tel1_cliente']}
   </td>
   <td class='center aligned'>
    $num
   </td>
   <td class='center aligned'>
    $fecha
   </td>";
  }
 echo "</tr>";
}
if(isset($sql2))
{ mysqli_free_result($sql2); }

?>
</table>
