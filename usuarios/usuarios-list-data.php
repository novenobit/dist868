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
  // <a href='#' onclick='loadPage(\"$dirRoot"."usuarios/usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}\");return false;'>
  echo "<tr>
   <td class='tdBorder'>
     {$usuarioData['nombre']} {$usuarioData['apellido']}
   </td>
   <td class='tdBorder center aligned'>
      {$usuarioData['usuario']}
   </td>
   <td class='tdBorder center aligned'>
    {$usuarioData['cid_usuario']}
   </td>
   <td class='tdBorder center aligned'>
     {$usuarioData['celular']}
   </td>
   <td class='tdBorder center aligned' style='width:140px;'>
     $numCuentas
   </td>
   <td class='tdBorder center aligned' style='width:140px;'>";
   // <a class='tiny ui orange button' href='#' onclick='loadPage(\"$dirRoot"."usuarios/usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}\");return false;'>Ver</a>
?>
    <center style="padding:0px;">
    <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php echo $num; ?>" class="ui orange button">Ver</button>
    </center>
    <div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
    <div class="header"><?php echo $nombreUser; ?></div>
    <div class="scrolling content"  style="background-color:#ededed;">
      <iframe src="<?php echo "usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}&modalId=$num"; ?>" height='520px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
    </div>
    <div class="actions">
      <a class="ui animated button" tabindex="0" href='#'>
      <div class="visible content">Retornar</div>
      <div class="hidden content">
        <i class="left arrow icon"></i>
      </div>
      </a>
      <div class="ui blue deny button">
      Cerrar/Close
      </div>
    </div>
    </div>
    <?php

   echo "</td>
  </tr>";
?>
