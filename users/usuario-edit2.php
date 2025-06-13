<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
//include("../configFrame2.php");
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("$dirRoot"."libs1/loader.php");

if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }
if(isset($_POST['iduser']))
{ $iduser="$_POST[iduser]"; }

if(isset($_POST['cid_usuario']))
{ $Mcid_usuario="$_POST[cid_usuario]"; }
if(isset($_POST['nombre']))
{ $Mnombre="$_POST[nombre]"; }
if(isset($_POST['apellido']))
{ $Mapellido="$_POST[apellido]"; }
if(isset($_POST['email']))
{ $Memail="$_POST[email]"; }

if(isset($_POST['telefono']))
{ $Mtelefono="$_POST[telefono]"; }
if(isset($_POST['celular']))
{ $Mcelular="$_POST[celular]"; }

if(isset($_POST['foto']))
{ $Mfoto="$_POST[foto]"; }

if(isset($_POST['usuario']))
{ $Musuario="$_POST[usuario]"; }
if(isset($_POST['clave']))
{ $Mclave="$_POST[clave]"; }
if(isset($_POST['idnivel']))
{ $idnivel="$_POST[idnivel]";
  $Midnivel="$_POST[idnivel]";
}
if(isset($_POST['id_tipoemp']))
{ $Mid_tipoemp="$_POST[id_tipoemp]"; }
if(isset($_POST['tipousuario']))
{ $Mtipousuario="$_POST[tipousuario]"; }
if(isset($_POST['activo']))
{ $Mactivo="$_POST[activo]"; }

if(isset($Mactivo) and $Mactivo=="on")
{ $Mactivo="S"; }
else
{ $Mactivo="N"; }
if(!isset($numventas))
{ $numventas=0; }
// --------------------------------------------------------

$todoBien="N";
if(empty($Mnombre))
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
  include("$dirRoot"."bots/bot-usuarios.php");
  $cid_usuario=$usuarioData['cid_usuario'];
  //include("$dirRoot"."bots/bot-user-ventas.php");
  if(!empty($mnombre))
  {  $mnombre=ucwords($mnombre); }

//-----------------------------------
  $tchas1=strlen($Musuario);
  if(empty($Musuario) or  $tchas1 <= 4)
  {
   $error="los datos del usuario ($Musuario) es muy corto, recomiendo mas de 8 caracteres";
   error();
   exit();
  }
  else
  {
    $Musuario=ucwords($Musuario);
    $textoremove=$Mnombre;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $Musuario=ucwords($textoremove);
  }

//-----------------------------------
  $tchas1=strlen($Mclave);
  if(!empty($Mclave) and  $tchas1 <= 4)
  {
   $error="los datos de la clave es muy corto, recomiendo mas de 5 caracteres";
   error();
   exit();
  }
  if(!empty($Mclave) and  $tchas1 > 4)
  {
   $Mclave=md5($Mclave);
   $result=mysqli_query($conex1,"select iduser from usuarios where clave='$Mclave'");
   $num_filas=mysqli_num_rows($result);
   if($num_filas>0)
   {
     $error="error en los datos de la clave, prueba con otra clave";
     error();
     exit();
   }
  }

// Update Data -----------------------------------
  if($Mcid_usuario<>"" and $Mcid_usuario<>$usuarioData['cid_usuario'])
  {
    $query2="update usuarios set cid_usuario='$Mcid_usuario' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Mnombre<>"" and $Mnombre<>$usuarioData['nombre'])
  {
    $query2="update usuarios set nombre='$Mnombre' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Mapellido<>"" and $Mapellido<>$usuarioData['apellido'])
  {
    $query2="update usuarios set apellido='$Mapellido' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Memail<>"" and $Memail<>$usuarioData['email'])
  {
    $query2="update usuarios set email='$Memail' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Mtelefono<>"" and $Mtelefono<>$usuarioData['telefono'])
  {
    $query2="update usuarios set telefono='$Mtelefono' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Mcelular<>"" and $Mcelular<>$usuarioData['celular'])
  {
    $query2="update usuarios set celular='$Mcelular' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }
  if($Mclave<>"" and $Mclave<>$usuarioData['clave'])
  {
    $query2="update usuarios set clave='$Mclave' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }

  if($Mtipousuario<>"" and $Mtipousuario<>$usuarioData['tipousuario'])
  {
    $query2="update usuarios set tipousuario='$Mtipousuario' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }

  if($Mid_tipoemp<>"" and $Mid_tipoemp<>$usuarioData['id_tipoemp'])
  {

    $consTU="select nivel_empleado from tipodeempleados where id_tipoemp='$Mid_tipoemp'";
    $tipoUser=mysqli_query($conex1,$consTU);
    $tipoEmp=mysqli_fetch_array($tipoUser);
    $nivel_empleado=$tipoEmp['nivel_empleado'];
    $query2="update usuarios set id_tipoemp='$Mid_tipoemp',idnivel='$nivel_empleado' where usuarios.iduser='{$usuarioData['iduser']}'";
    $result2=mysqli_query($conex1,$query2);
    $todobien="S";
  }

  if(empty($activo))
  { $activo="S"; }
  if($numventas==0)
  {
   // echo "<br>1 $idusers/ $id<br>2 $cod_empresa<br>3 $cid_usuario<br>4 $nombre<br>5 $cumpleano_usuario<br>6 $empresa_usuario<br>7 $dir1_usuario<br>8 $dir2_usuario<br>9 $ciudad_usuario<br>0 $estado_usuario<br>1 $id_pais<br>2 $email<br>3 $celular<br>4 $tel3_usuario<br>5 $email<br>6 $url_usuario<br>7 $foto<br>8 $tipo_usuario<br>9 $descuento_usuario<br>0 $nivelprecio_usuario<br>1 $nota_usuario";
   // UPDATE usuarios SET cid_usuario='E81907663' WHERE usuarios.iduser=4 LIMIT 1 ;
   // $queryCLI="UPDATE usuarios set cid_usuario='$cid_usuario' where usuarios.iduser='{$usuarioData['iduser']}";
  // $queryCLI="update usuarios set nombre='$nombre',apellido='$apellido', email='$email', telefono='$telefono', celular='$celular', activo='$activo' where usuarios.iduser='{$usuarioData['iduser']}'";
  }
  else
  {
 // $queryCLI="update usuarios set nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono', celular='$celular', activo='$activo' where usuarios.iduser='{$usuarioData['iduser']}'";
  }
  //$result=mysqli_query($conex1,$queryCLI);
  $todoBien="S";
}
if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=usuario-ver.php?op=cl&iduser={$usuarioData['iduser']}>";
 exit(); }
?>

