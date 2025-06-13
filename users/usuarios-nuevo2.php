<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
$autoUsuarios="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("../includes/left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
  <?php include("../libs1/loader.php");
  if(isset($_POST['usuario']))
  { $usuario="$_POST[usuario]"; }
  if(isset($_POST['cid_usuario']))
  { $cid_usuario="$_POST[cid_usuario]"; }
  if(isset($_POST['nombre']))
  { $nombre="$_POST[nombre]"; }
  if(isset($_POST['apellido']))
  { $apellido="$_POST[apellido]"; }

  if(isset($_POST['dir1_usuario']))
  { $dir1_usuario="$_POST[dir1_usuario]"; }
  if(isset($_POST['dir2_usuario']))
  { $dir2_usuario="$_POST[dir2_usuario]"; }

  if(isset($_POST['ciudad']))
  { $ciudad="$_POST[ciudad]"; }
  if(isset($_POST['estado']))
  { $estado="$_POST[estado]"; }

  if(isset($_POST['email']))
  { $email="$_POST[email]"; }
  if(isset($_POST['telefono']))
  { $telefono="$_POST[telefono]"; }
  if(isset($_POST['celular']))
  { $celular="$_POST[celular]"; }
  if(isset($_POST['website']))
  { $website="$_POST[website]"; }
  if(isset($_POST['foto']))
  { $foto="$_POST[foto]"; }
  if(isset($_POST['id_tipoemp']))
  { $id_tipoemp="$_POST[id_tipoemp]"; }
  if(isset($_POST['idnivel']))
  { $idnivel="$_POST[idnivel]"; }
  if(isset($_POST['tipousuario']))
  { $tipousuario="$_POST[tipousuario]"; }
  if(isset($_POST['tipo_cliente']))
  { $tipo_cliente="$_POST[tipo_cliente]"; }
  if(isset($_POST['nivelprecio']))
  { $nivelprecio="$_POST[nivelprecio]"; }
  if(isset($_POST['lista_correo']))
  { $lista_correo="$_POST[lista_correo]"; }
  if(isset($_POST['vendedor']))
  { $vendedor="$_POST[vendedor]"; }
  if(isset($_POST['nota']))
  { $nota="$_POST[notar]"; }

  $tchas1=strlen($cid_usuario);
  $tchas2=strlen($nombre);
  if(empty($cid_usuario) or empty($nombre) or $tchas1 <= 5 or $tchas2 <= 5)
  {
   $error="falta algunos datos";
   error();
   exit();
  }
  else
  {
   $num_filas1=0;
   $num_filas2=0;
   $result1=mysqli_query($conex1,"select iduser from usuarios where usuario='$usuario'");
   $num_filas1=mysqli_num_rows($result1);
   $result2=mysqli_query($conex1,"select iduser from usuarios where cid_usuario='$cid_usuario'");
   $num_filas2=mysqli_num_rows($result2);

   if($num_filas1>0 or $num_filas2>0)
   {
    $error="esta usuario ya fue publicado";
    error();
    exit();
   }
   else
   {
    $nombre=ucwords($nombre);
    if(!empty($empresa))
    { $empresa=ucwords($empresa); }
    $textoremove=$nombre;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $nombre=ucwords($textoremove);
    if(!isset($foto))
    { $foto=""; }
//-----------------------
  if(empty($apellido))
  {
   $error="falta datos del Apellido";
   error();
   exit();
  }
  if(!isset($dir1_usuario))
  { $dir1_usuario=""; }
  if(!isset($dir2_usuario))
  { $dir2_usuario=""; }

  if(!isset($ciudad))
  { $ciudad=""; }
  if(!isset($estado))
  { $estado=""; }
  if(!isset($email))
  { $email=""; }
  if(!isset($telefono))
  { $telefono=""; }
  if(!isset($celular))
  { $celular=""; }
  if(!isset($website))
  { $website=""; }
  if(!isset($foto))
  { $foto=""; }
  if(!isset($id_tipoemp))
  { $id_tipoemp=""; }
  if(!isset($idnivel))
  { $idnivel="5"; }
  if(!isset($tipousuario))
  { $tipousuario="C"; }
  if(isset($tipo_cliente))
  { $tipo_cliente="DIS"; }
  if(!isset($nivelprecio))
  { $nivelprecio="1"; }
  if(!isset($lista_correo))
  { $lista_correo="S"; }
  if(!isset($vendedor))
  { $vendedor=""; }
  if(!isset($nota))
  { $nota=""; }
  if(!isset($submitted))
  { $submitted="$dia/$mes/$ano"; }
  if(!isset($activo))
  { $activo="S"; }

  $query2="insert into usuarios(usuario, cid_usuario, clave, empresa, nombre, apellido, dir1_usuario, dir2_usuario, ciudad, estado, email, telefono, celular, website, foto, id_tipoemp, idnivel, tipousuario, tipo_cliente, nivelprecio, lista_correo, vendedor, nota, submitted, activo)
  values('$usuario', '$cid_usuario', '$clave', '$empresa', '$nombre', '$apellido', '$dir1_usuario', '$dir2_usuario', '$ciudad', '$estado', '$email', '$telefono', '$celular', '$website', '$foto', '$id_tipoemp', '$idnivel', '$tipousuario', '$tipo_cliente', '$nivelprecio', '$lista_correo', '$vendedor', '$nota', '$submitted', '$activo')";
  $result2=mysqli_query($conex1,$query2);
  $todoBien="S";
 }
}
if($todoBien=="S")
{
 // if(isset($result))
 // { mysqli_free_result($result); }
 echo "<html><meta http-equiv=refresh content=0;url=usuarios-nuevo1.php?op=cl>";
 // echo "<html><meta http-equiv=refresh content=0;url=usuarios-list1.php?op=cl>";
 exit();
}

?>


 </div>
</div>

<br><br><br>
<?php
// include("$dirRoot"."includes/statusAdmin.php");
?>
