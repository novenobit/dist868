<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                 //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
if($mobile=="S")
{ include("usuarios-ver-mobile.php"); }
else
{
 //include("usuarios-ver-data.php");
?>

  Datos del Usuario
<?php
  if($areasSistema['Editausuarios']=="S")
  { echo "<a  href='../usuarios/usuarios-edit1.php?op=cl&iduser={$usuarioData['iduser']}'>Editar <img src='$dirRoot"."siadre-imagenes/graphs/pen.gif' width='16' height='16' alt='' /></a>"; }
?>

   <?php
    $foto="{$usuarioData['foto']}";
    if(!empty($foto))
    {
     echo "<tr>
      <td colspan='2'>
       <img src='$dirRoot"."imagenes/people/{$usuarioData['foto']}'>
     </td></tr>";
    }
    else
    { echo "<tr><td colspan='2'>
       <img src='$dirRoot"."imagenes/people/sinfoto.png'>
     </td></tr>";
    }
    echo "<tr><td width='120'>
      CI/RIF
     </td>
     <td>
      {$usuarioData['cid_usuario']}
    </td></tr>
    <tr><td width='120'>
      Nombre
    </td>
    <td>
     {$usuarioData['nombre']}
    </td></tr>";
    if(isset($usuarioData['email']) and $usuarioData['email']<>"")
    { echo "<tr><td width='120'>
       Tel&eacute;fono 1</td>
       <td>
       {$usuarioData['email']} / {$usuarioData['celular']}
      </td></tr>";
    }
    if(isset($usuarioData['email']) and $usuarioData['email']<>"")
    {
     echo "<tr><td  width='120'>
      eMail</td><td >
      {$usuarioData['email']}
     </td></tr>";
    }
   ?>
   </table>
 </div>


 </div>
</div>
<?php
}
?>
