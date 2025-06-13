<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
if($mobile=="S")
{ include("usuarios-ver-mobile.php"); }
else
{
 //include("usuarios-ver-data.php");
?>

  Datos del Usuario
<?php
  if(!isset($areasSistema))
  {
   echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
   exit();
  }
  if($areasSistema['Editausuarios']=="S")
  { echo "<a  href='../users/usuarios-edit1.php?op=cl&iduser={$usuarioData['iduser']}'>Editar <img src='$dirRoot"."imagenes/graphs/pen.gif' width='16' height='16' alt='' /></a>"; }
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
