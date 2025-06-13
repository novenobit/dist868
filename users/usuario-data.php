<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
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
  //{ echo "<a  href='../users/usuario-edit.php?op=cl&iduser={$usuarioData['iduser']}'>Editar <img src='$dirRoot"."imagenes/graphs/pen.gif' width='16' height='16' alt='' /></a>"; }
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

<div class="ui grid" style="background-color:#d2fbd0;color:#149e53;;border-radius:25px;padding:25px;">
  <div class="sixteen wide column">
    <?php
     echo "<h2>$nombre $apellido</h2>
     <p>CI/RIF: $cid_usuario</p>
     <p>Usuario: $Musuario</p>";
     if(isset($telefono) and $telefono<>"")
     { echo "<p>Tel&eacute;fono: $telefono</p>";
     }
     if(isset($celular) and $celular<>"")
     { echo "<p>Celular: $celular</p>";
     }
     if(isset($email) and $email<>"")
     {
      echo "<p>eMail: $email</p>";
     }
     if(isset($id_tipoemp) and $id_tipoemp<>"")
     {
       echo "<p>Tipo Empleado: $tipo_empleado</p>
       </p>Nivel: $nivel_empleado</p>";
     }
     if(isset($tipousuario) and $tipousuario<>"")
     {
       echo "<p>Tipo Usuario: $Mtipousuario</p>";
     }
   ?>
  </div>
</div>
<?php
 }
}
?>

