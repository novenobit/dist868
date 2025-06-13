<?php
// ------------------------------------------------------------------
// usuarios Data
// ------------------------------------------------------------------
if(!isset($mobile))
{ $mobile="N"; }

 $fecha="";
 $Tventas=0;
 $num=0;
 if($num==0)
 { $num=""; }
 $cid=$usuarioData['cid_usuario'];
 $nom=$usuarioData['nombre'];
 $mail="";
 if($usuarioData['email']<>"")
 { $mail=" / ".$usuarioData['email']; }
 if(!isset($dir))
 { $dir=""; }
 if(!isset($tel))
 { $tel=""; }

 $CliData="$nom $dir $tel $mail";
  echo "<tr>
   <td class='tdBorder'>
     <a href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['nombre']} {$usuarioData['apellido']}</a>
   </td>
   <td class='tdBorder center aligned'>
     <a href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['usuario']}</a>
   </td>
   <td class='tdBorder center aligned'>
    <a href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['cid_usuario']}</a>
   </td>
   <td class='tdBorder center aligned'>
     <a  href='usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}'>{$usuarioData['celular']}</a>
   </td>
  </tr>";
?>
