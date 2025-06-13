<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                                  //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
//if($areasSistema['CambiarDatos']=="N")
//{
//  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
//  exit();
//}

if($mobile=="S")
{ include("usuarios-ver-mobile.php"); }
else
{
  //if($areasSistema['EditaUsuarios']=="S")
  //{ echo "<a  href='../usuarios/usuario-edit.php?op=cl&iduser={$usuarioData['iduser']}'>Editar <img src='$dirRoot"."siadre-imagenes/graphs/pen.gif' width='16' height='16' alt='' /></a>"; }
  $Musuario="";
  $nombre="";
  $apellido="";
  $cid_usuario="";
  $cid="";
  $email="sin datos";
  $celular="";
  $telefono="";

  if(isset($usuarioData))
  {
     $Musuario=$usuarioData['usuario'];
     $nombre=$usuarioData['nombre'];
     $apellido=$usuarioData['apellido'];
     $cid_usuario=$usuarioData['cid_usuario'];
     $cid=$usuarioData['cid_usuario'];
     $email=$usuarioData['email'];
     $celular=$usuarioData['celular'];
     $telefono=$usuarioData['telefono'];
     $id_tipoemp=$usuarioData['id_tipoemp'];
     $tipousuario=$usuarioData['tipousuario'];
     $Mtipousuario="Nada";
     if($tipousuario=="C")
     { $Mtipousuario="Cliente"; }
     if($tipousuario=="E")
     { $Mtipousuario="Empleado"; }


     $title="{$usuarioData['nombre']} {$usuarioData['apellido']}";
     // echo "<h2>$title</h2>";
     if($id_tipoemp<>"")
     {
       include("$dirRoot"."bots/tipo-usuario-find.php");
     }
?>
   <table class='ui selectable inverted table'>
    <?php
     echo "<tr><td width='120'>
      Usuario
      </td>
      <td>
       $Musuario
     </td></tr>
     <tr><td width='120'>
      CI/RIF
      </td>
      <td>
       $cid_usuario
     </td></tr>
     <tr><td width='120'>
      Nombre
     </td>
     <td>
     $nombre $apellido
     </td></tr>";
     if(isset($telefono) and $telefono<>"")
     { echo "<tr><td width='120'>
          Tel&eacute;fono</td>
          <td>
          $telefono
         </td></tr>";
     }
     if(isset($celular) and $celular<>"")
     { echo "<tr><td width='120'>
           Celular</td>
          <td>
           $celular
         </td></tr>";
     }
     if(isset($email) and $email<>"")
     {
      echo "<tr><td  width='120'>
       eMail</td><td >
        $email
      </td></tr>";
     }
     if(isset($id_tipoemp) and $id_tipoemp<>"")
     {
       echo "<tr><td  width='120'>
       Tipo Empleado</td><td >
        $tipo_empleado (Nivel: $nivel_empleado)
      </td></tr>";
     }
     if(isset($tipousuario) and $tipousuario<>"")
     {
       echo "<tr><td  width='120'>
       Tipo Usuario</td><td >
        $Mtipousuario
      </td></tr>";
     }

   ?>
   </table>

<?php
 }
}
?>
