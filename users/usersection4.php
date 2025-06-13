<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  usersection2.php                                                        //  
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform�tica, C.A.          //
// ***************************************************************************
$bgcolor1="#ffffff";
$bgcolor2="#e9e9e9";
$height=10;
?>
<center>
<table cellpadding=4 cellspacing=1 border=0 width='<?php echo "$webwidth"; ?>' bgcolor=#ffffff>
 <tr>
  <td valign=top align=left width=180>
   <?php include("userleft.php");
   include("userright.php"); ?>
  </td>
  <td valign=top align=left>

<?php
 //showuser();
 getuser($userdata['iduser']);
 $maintitleT=$_SESSION['usuario'];
 $id_pais="{$userdata['id_pais']}";
 if(!empty($id_pais))
 { findpais();
   $pais="{$paisdata['pais']}"; }
 else
  $pais="";
?>
<center>
<table cellSpacing=0 cellPadding=0 border=0 bgColor='#c6c6c6' width="100%">
<tr><td valign=top>
<table cellSpacing=0 cellPadding=4 border=0 bgColor='#c6c6c6' width="100%">
 <tr><td align=left colspan=2 class=white12 bgcolor=#00688B height=30>&nbsp;&nbsp;<?php echo "({$userdata['usuario']}) {$userdata['nombre']   } {$userdata['apellido']}"; ?><br></td></tr>
 <tr>
  <td valign=top align=center width=130 bgColor='#cccccc'>
   <?php
    $imageydir="../imagenes/people/{$userdata['usuario']}/{$userdata['foto']}";
    $imsize="100";
    $imalign="";
    $alt="{$userdata['nombre']} {$userdata['apellido']}";
    imageexit($imageydir,$imsize,$alt,$imalign);
  echo "</td><td><table cellSpacing=1 cellPadding=4 width=100%>
  <tr><td align=left height=$height bgcolor=$bgcolor1 width=100>Usuario:</td><td align=left bgcolor=$bgcolor1>{$userdata['usuario']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor2>Clave:</td><td align=left bgcolor=$bgcolor2>**********</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor1>Nombre:</td><td align=left bgcolor=$bgcolor1>{$userdata['nombre']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor2>Apellido:</td><td align=left bgcolor=$bgcolor2>{$userdata['apellido']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor1>eMail:</td><td align=left bgcolor=$bgcolor1>{$userdata['email']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor2>Direccion:</td><td align=left bgcolor=$bgcolor2>{$userdata['direccion']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor1>Pais:</td><td align=left bgcolor=$bgcolor1>$pais</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor2>Estado:</td><td align=left bgcolor=$bgcolor2>{$userdata['estado']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor1>Ciudad:</td><td align=left bgcolor=$bgcolor1>{$userdata['ciudad']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor2>Telefono:</td><td align=left bgcolor=$bgcolor2>{$userdata['telefono']}</td></tr>
  <tr><td align=left height=$height bgcolor=$bgcolor1>Celular:</td><td align=left bgcolor=$bgcolor1>{$userdata['celular']}</td></tr>";
  $idnivel=$userdata['idnivel'];
  nivel2();
  if($idnivel<='3')
  {
   echo "<tr><td align=left height=$height bgcolor=$bgcolor2>Nivel:</td><td align=left bgcolor=$bgcolor2>{$niveldata['nivel']}</td></tr>
   <tr><td align=left height=$height bgcolor=$bgcolor1>Acepta Mail:</td><td align=left bgcolor=$bgcolor1>";
   $aceptmail="{$userdata['aceptmail']}";
   if($aceptmail=='S')
   { echo "Si"; }
   elseif($aceptmail=='N')
   { echo "No"; }
   $activo="{$userdata['activo']}";
   if($activo=='S')
   { $activo="Si"; }
   else
   { $activo="No"; }
   echo "</td></tr>
   <tr><td align=left height=$height bgcolor=$bgcolor2>Activo:</td><td align=left bgcolor=$bgcolor2>$activo</td></tr>
   <tr><td align=left height=$height bgcolor=$bgcolor1>Fecha:</td><td align=left bgcolor=$bgcolor1>{$userdata['submitted']}</td></tr>";
  } 
  echo "</table>
  </td></tr><tr><td align=right height=10 colspan=2 ></td></tr>
  </td></tr><tr><td align=right class=white10 bgcolor=#104E8B colspan=2 height=30><a href='useredit.php?op=cd&id={$userdata['iduser']}'><span class=white10>Cambiar Datos</span></a>
  &nbsp;|&nbsp;
  <a href='usercp.php?op=cp&id={$userdata['iduser']}'><span class=white10>Cambiar Contrase&ntilde;a</span></a>
  &nbsp;|&nbsp;
  <a href='userfotos.php?op=cp&id={$userdata['iduser']}'><span class=white10>Cambiar Foto</span></a>&nbsp;&nbsp;
</td></tr>";
?>
</table>
</td></tr>
</table>
</center>
<br><br><br><br><br><br>
  </td>
 </tr>
</table>
</center>
<?php include("../statusbar2.php"); ?>


