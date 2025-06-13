<?php
// ------------------------------------------------------------------
// usuarios Data
// ------------------------------------------------------------------
if(!isset($mobile))
{ $mobile="N"; }

 $fecha="";
 $Tventas=0;
 //$num=0;
 //if($num==0)
 //{ $num=""; }
 $cid=$usuarioData['cid_usuario'];
 $nom=$usuarioData['nombre'];
 $nombreUser=$usuarioData['nombre']." ".$usuarioData['apellido'];
 $mail="";
 if($usuarioData['email']<>"")
 { $mail=" / ".$usuarioData['email']; }
 if(!isset($dir))
 { $dir=""; }
 if(!isset($tel))
 { $tel=""; }
 $numCuentas=0;
 $sqlCuentas="select id_cuenta from cuentas1 where usuario='{$usuarioData['usuario']}'";
 $sqlCuentas2=mysqli_query($conex1,$sqlCuentas);
 $numCuentas=mysqli_num_rows($sqlCuentas2);
 $CliData="$nom $dir $tel $mail";

  echo "<tr>
   <td class='tdBorder'>
     <a href='usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}' target='data2'>{$usuarioData['nombre']} {$usuarioData['apellido']}</a>
   </td>
   <td class='tdBorder center aligned'>
      {$usuarioData['usuario']}
   </td>
   <td class='tdBorder center aligned'>
    <a href='usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}' target='data2'>{$usuarioData['cid_usuario']}</a>
   </td>
   <td class='tdBorder center aligned'>
     <a href='usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}' target='data2'>{$usuarioData['celular']}</a>
   </td>
   <td class='tdBorder center aligned' style='width:140px;'>
     $numCuentas
   </td>
  </tr>";
?>
