<?php
// *******************************************************************
// Sistema SiAdRe                                                   //
// Copyright (c) 2023-2007 NovenoBIT.com                            //
// *******************************************************************
include("../configFrame2.php");
include("$dirRoot"."libs/loader.php");

if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }
if(isset($_POST['iduser']))
{ $iduser="$_POST[iduser]"; }
if(isset($_GET['cid_usuario']))
{ $cid_usuario="$_GET[cid_usuario]"; }
if(isset($_GET['nombre']))
{ $nombre="$_GET[nombre]"; }
if(isset($_GET['apellido']))
{ $apellido="$_GET[apellido]"; }
if(isset($_POST['cid_usuario']))
{ $cid_usuario="$_POST[cid_usuario]"; }
if(isset($_POST['nombre']))
{ $nombre="$_POST[nombre]"; }
if(isset($_POST['apellido']))
{ $apellido="$_POST[apellido]"; }
if(isset($_POST['email']))
{ $email="$_POST[email]"; }
if(isset($_POST['celular']))
{ $celular="$_POST[celular]"; }
if(isset($_POST['foto']))
{ $foto="$_POST[foto]"; }
if(isset($_POST['idnivel']))
{ $idnivel="$_POST[idnivel]"; }
if(isset($_POST['tipousuario']))
{ $tipousuario="$_POST[tipousuario]"; }

if(!isset($activo))
{ $activo="S"; }

// Check Post Data --------------------------------------
 if($activo=="on")
 { $activo="S"; }
 else
 { $activo="N"; }
// --------------------------------------------------------

$todoBien="N";
if(empty($nombre))
{
 $error="falta algunos datos";
 error();
 exit();
}
else
{
 // $sqlbot=mysqli_query($conex1, "select * from usuarios where iduser='{$usuarioData['iduser']}");
 // $usuarioData=mysqli_fetch_array($sqlbot);
 // $cid_usuario="{$usuarioData['cid_usuario']}";
 // echo $cid_usuario.'<br>';
 // exit();
  include("$dirRoot"."bots/bot-usuario.php");
  $cid_usuario=$usuarioData['cid_usuario'];
  include("$dirRoot"."bots/bot-usuarios-ventas.php");
  if(!empty($nombre))
  {  $nombre=ucwords($nombre); }

  if(empty($activo))
  { $activo="S"; }
  if($numventas==0)
  {
   // echo "<br>1 $iduser/ $id<br>2 $cod_empresa<br>3 $cid_usuario<br>4 $nombre<br>5 $cumpleano_usuario<br>6 $empresa_usuario<br>7 $dir1_usuario<br>8 $dir2_usuario<br>9 $ciudad_usuario<br>0 $estado_usuario<br>1 $id_pais<br>2 $email<br>3 $celular<br>4 $tel3_usuario<br>5 $email<br>6 $url_usuario<br>7 $foto<br>8 $tipo_usuario<br>9 $descuento_usuario<br>0 $nivelprecio_usuario<br>1 $nota_usuario";
   // UPDATE usuarios SET cid_usuario='E81907663' WHERE usuarios.iduser=4 LIMIT 1 ;
   // $queryCLI="UPDATE usuarios set cid_usuario='$cid_usuario' where usuarios.iduser='{$usuarioData['iduser']}";
   $queryCLI="update usuarios set nombre='$nombre',apellido='$apellido', email='$email', telefono='$telefono', celular='$celular',tipousuario='$tipousuario' activo='$activo' where usuarios.iduser='{$usuarioData['iduser']}'";
  }
  else
  {
   $queryCLI="update usuarios set nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono', celular='$celular',tipousuario='$tipousuario', activo='$activo' where usuarios.iduser='{$usuarioData['iduser']}'";
  }
  $result=mysqli_query($conex1,$queryCLI);
  $todoBien="S";
}
if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=usuarios-ver3.php?op=cl&iduser={$usuarioData['iduser']}>";
 exit(); }
?>

