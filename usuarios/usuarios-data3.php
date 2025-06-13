<?php
// ------------------------------------------------------------------
// usuarios Data
// ------------------------------------------------------------------
if(!isset($mobile))
{ $mobile="N"; }

 $fecha="";
 $Tventas=0;
 $num=0;
 $sys_ventas="S";
 if($sys_ventas=="S")
 {
  $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from ventas where cid_usuario='{$usuarioData['cid_usuario']}'");
  while($ventasData=mysqli_fetch_array($sql2))
  {
   $Tventas=$Tventas+$ventasData['monto_apagar'];
   $num++;
   $fecha="{$ventasData['dia']}/{$ventasData['mes']}/{$ventasData['ano']}";
  }
 }
 if($num==0)
 { $num=""; }
 $cid=$usuarioData['cid_usuario'];
 $nom=$usuarioData['nombre'];
 $mail="";
 if($usuarioData['email']<>"")
 { $mail=" / ".$usuarioData['email']; }
 $CliData="$nom $dir $tel $mail";
 // ". number_format($Tventas,2,',', '.') . "
 echo "<tr>
  <td class='center aligned'>
    {$usuarioData['usuario']}
   </td>
  <td class='center aligned'>
   <a data-inverted='' data-tooltip='$CliData' data-position='top left' href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['cid_usuario']}</a>
  </td>
  <td>";
    echo "<a  href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['nombre']}</a>";
  echo "</td>";
  if($sys_ventas=="S")
  {
   echo "<td class='center aligned'>
    {$usuarioData['email']}
   </td>
   <td class='center aligned'>
    $num
   </td>
   <td class='center aligned'>
    $fecha
   </td>";
  }
 echo "</tr>";

if(isset($sql2))
{ mysqli_free_result($sql2); }

?>
