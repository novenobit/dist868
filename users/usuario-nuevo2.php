<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuario-nuevo2.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$todoBien="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
include_once("$dirRoot"."bots/getExtension.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
FechayHora();
$todoBien="N";

  if(isset($_POST['usuario']))
  { $Musuario="$_POST[usuario]"; }
  if(isset($_POST['clave']))
  { $Mclave="$_POST[clave]"; }
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
  if(isset($_POST['id_tipoemp']))
  { $Mid_tipoemp="$_POST[id_tipoemp]"; }
  if(isset($_POST['tipousuario']))
  { $Mtipousuario="$_POST[tipousuario]"; }

  //$idnivel=3;
  $submitted="$dia/$mes/$ano";
  $activo="";
// --------------------------
  $tchas1=strlen($Musuario);
  if(empty($Musuario) or  $tchas1 <= 4)
  {
   $error="los datos del usuario es muy corto, recomiendo mas de 8 caracteres";
   error();
   exit();
  }
  else
  {
    $Musuario=str_replace(' ', '', $Musuario);
    $textoremove=$Mnombre;
    include("$dirRoot"."bots/Remove_Simbols.php");
  }
// --------------------------
  $tchas1=strlen($Mclave);
  if(empty($Mclave) or  $tchas1 <= 4)
  {
   $error="los datos de la clave es muy corto, recomiendo mas de 8 caracteres";
   error();
   exit();
  }
  $Mclave=md5($Mclave);
  $result=mysqli_query($conex1,"select iduser from usuarios where clave='$Mclave'");
  $num_filas=mysqli_num_rows($result);
  if($num_filas>0)
  {
    $error="error en los datos de la clave, prueba con otra clave";
    error();
    exit();
  }
//----------------------------
  $tchas1=strlen($Mnombre);
  if(empty($Mnombre) or $tchas1 <= 2)
  {
   $error="falta el nombre";
   error();
   exit();
  }
  else
  {
    $Mnombre=ucwords($Mnombre);
    $textoremove=$Mnombre;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $Mnombre=ucwords($textoremove);
  }
//----------------------------
  $tchas1=strlen($Mapellido);
  if(empty($Mapellido) or $tchas1 <= 2)
  {
   $error="falta el apellido";
   error();
   exit();
  }
  else
  {
    $Mapellido=ucwords($Mapellido);
    $textoremove=$Mapellido;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $Mapellido=ucwords($textoremove);
  }
//----------------------------
  if(!isset($Mcid_usuario) or $Mcid_usuario=="")
  {
   $error="falta los datos de Rif or CI del usuario";
   error();
   exit();
  }
  $tchas1=strlen($Mcid_usuario);
  if(empty($Mcid_usuario) or $tchas1 <= 5)
  {
   $error="falta los datos de Rif or CI";
   error();
   exit();
  }
  else
  {
   $result=mysqli_query($conex1,"select iduser from usuarios where cid_usuario='$Mcid_usuario'");
   $num_filas=mysqli_num_rows($result);
   if($num_filas>0)
   {
    $error="esta usuario ya fue publicado";
    error();
    exit();
   }
  }
// ----------------------------------------------
// start copy foto ---------------------------------

// echo "<br>xxxx  ".$_FILES['foto'];

  if(isset($_FILES['foto']) and $_FILES['foto']<>"")
  {
   $foto=stripslashes($_FILES['foto']['name']);
   if(empty($foto))
   { $foto=""; }
   if(isset($foto) and !empty($foto))
   {
    if(!defined("MAX_SIZE"))
    { define ("MAX_SIZE","1024"); }
    $filesize= MAX_SIZE;
    $errors=0;
    if(!empty($foto))
    {
     $filename=stripslashes($_FILES['foto']['name']);
     $extension = new SplFileInfo($filename);
     $extension=$extension->getExtension();
     // $extension=getExtension($filename);
     $extension=strtolower($extension);
     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
     {
      $error="<h1>No se acepta este tipo de archivo!</h1>";
      $errors=1;
      error();
      exit();
     }
     else
     {
      $size=filesize($_FILES['foto']['tmp_name']);
      list($width, $height)=getimagesize($_FILES['foto']['tmp_name']);
      if ($size > MAX_SIZE*1024)
      {
       $error="<h1>El tama&ntilde;o del archivo es demasiado grande<br>El limite es de $filesize kb!</h1>";
       $errors=1;
       error();
       exit();
      }
      if(!file_exists("$dirRoot"."imagenes/usuarios"))
      {  mkdir("$dirRoot"."imagenes/usuarios", 0777, true);
       if(PHP_OS<>"WINNT")
       {
        chmod("$dirRoot"."imagenes", 0777);
       }
      }
      $newwidth="90";
      $newheight="90";
      $imagedir="$dirRoot"."imagenes/users/";
//  copy image --------------------------------------
      $foto_name=time().'.'.$extension;
      $newname="$dirRoot"."imagenes/users/".$filename;
      $name2=$_FILES['foto']['tmp_name'];
    //  echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto']}<br>";
      $copied=copy($_FILES['foto']['tmp_name'], $newname);
//  resize -----------------------------------------
      $olddir=getcwd();
      $userdir=opendir($imagedir);
      $fotoanddir="$imagedir/$foto";
      $thumbdir=$imagedir;
      $format='';
      // echo "<br>1 $imagedir <br>2 $thumbdir <br>3 $foto <br>4 $newwidth <br>5 $newheight <br>";
      if(preg_match("/.jpg/i", "$foto"))
      { $format='image/jpeg'; }
      if (preg_match("/.gif/i", "$foto"))
      { $format='image/gif'; }
      if(preg_match("/.png/i", "$foto"))
      { $format='image/png'; }
      if($format!='')
      {
       // list($width, $height)=getimagesize("$fotoanddir");
       switch($format)
       {
        case 'image/jpeg':
        { $source=imagecreatefromjpeg($fotoanddir);
         $ext=".jpg";
         break; }
        case 'image/gif';
        { $source=imagecreatefromgif($fotoanddir);
          $ext=".gif";
         break; }
        case 'image/png':
        {
        // $source=imagecreatefrompng($fotoanddir);
          $ext=".png";
         break; }
       }
       $thumb=imagecreatetruecolor($newwidth,$newheight);
       imagealphablending($thumb, false);
       $source=@imagecreatefromjpeg($fotoanddir);
       //imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

       if(strlen($foto)>=30)
       { $foto2=substr($foto,0,30);
        $foto3="$foto2$ext";
        $newfile="$thumbdir/$foto3";
        @imagejpeg($thumb, $newfile);
        $foto=$foto3;
       }
       else
       {
        @imagejpeg($thumb, $foto);
        $foto=$foto;
       }
      }
     }
    }
   }
  }
  if(!isset($foto))
  { $foto=""; }
  if(isset($foto))
  { $filename=basename($foto); }
  else
  { $filename=""; }
  if($foto<>"")
  {
   if(is_file($foto))
   {
    unlink($foto);
   }
   $mask = "*.jpg";
   array_map( "unlink", glob( $mask ) );
   $mask = "*.png";
   array_map( "unlink", glob( $mask ) );
  }

// end Foto ------------------------
// insert data here

if(isset($Mid_tipoemp) and $Mid_tipoemp<>"")
{
 $cons="select id_tipoemp,tipo_empleado,nivel_empleado from tipodeempleados where id_tipoemp='$Mid_tipoemp'";
 $resultado=mysqli_query($conex1,$cons);
 $tipoEmp=mysqli_fetch_array($resultado);
 $Midnivel=$tipoEmp['nivel_empleado'];
}

if(!isset($foto) or $foto=="foto")
{ $foto=""; }
if(!isset($Memail))
{ $Memail=""; }
if(!isset($Mtelefono))
{ $Mtelefono=""; }
if(!isset($Midnivel))
{ $Midnivel="4"; }
if(!isset($Mtipousuario))
{ $Mtipousuario="E"; }

$numReg=0;
$result=mysqli_query($conex1,"select iduser from usuarios where cid_usuario='$Mcid_usuario'");
$numReg=mysqli_num_rows($result);
if($numReg==0)
{
 $query2="insert into usuarios(usuario, cid_usuario, clave, nombre, apellido, email, telefono, celular, foto, id_tipoemp, idnivel, tipousuario, submitted, activo)
 values('$Musuario', '$Mcid_usuario', '$Mclave', '$Mnombre', '$Mapellido', '$Memail', '$Mtelefono', '$Mcelular', '$foto', '$Mid_tipoemp', '$Midnivel', '$Mtipousuario','$submitted', 'S')";
 $result2=mysqli_query($conex1,$query2);
}

$numReg=0;
$result=mysqli_query($conex1,"select iduser from usuarios where cid_usuario='$Mcid_usuario'");
$numReg=mysqli_num_rows($result);

if($numReg>0)
{
  $todoBien="S";
  include("usuario-areas.php");
}

if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=usuarios.php>";
}
?>
