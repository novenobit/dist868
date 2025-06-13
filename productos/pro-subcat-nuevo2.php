<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat-nievo2.php                                                   //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
if (ob_get_level() == 0) ob_start();
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
if(!isset($areasSistema))
{
 include("$dirRoot"."bots/AreasSistema.php");
}
FechayHora();
$autoPro="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }

$todoBien="N";
$cod="02";

if(isset($_POST['cod_categoria']))
{ $cod_categoria="$_POST[cod_categoria]"; }
if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }
if(isset($_POST['nom_subcategoria']))
{ $nom_subcategoria="$_POST[nom_subcategoria]"; }
if(isset($_GET['nom_subcategoria']))
{ $nom_subcategoria="$_GET[nom_subcategoria]"; }
if(isset($_GET['datos_subcategoria']))
{ $datos_subcategoria="$_GET[datos_subcategoria]"; }

 if(isset($cod_categoria))
 {
  $result=mysqli_query($conex1,"select id_subcategoria,cod_subcategoria,cod_categoria from subcategoria where cod_categoria='$cod_categoria' order by id_subcategoria desc limit 1");
  $numFilas=0;
  $numFilas=mysqli_num_rows($result);
  if($numFilas>0)
  {
   $data=mysqli_fetch_array($result);
   $cod_subcategoria=$data['cod_subcategoria'];
   $cod_categoria=$data['cod_categoria'];
   if(empty($cod_subcategoria))
   { $cod_subcategoria="$cod_categoria$cod"; }
   else
   { $cod_subcategoria=$cod_subcategoria+5; }
  }
  if(empty($cod_subcategoria))
  { $cod_subcategoria="$cod_categoria$cod"; }
  if(empty($nom_subcategoria) or $nom_subcategoria=="" or $cod_subcategoria=="seleccione02"  or $cod_subcategoria=="seleccione")
  {
   $error="falta algunos datos";
   error();
   exit();
  }
  else
  {
   $num_filas=0;
   $queryF="select cod_subcategoria from subcategoria where cod_subcategoria='$cod_subcategoria'";
   $resultF=mysqli_query($conex1,$queryF);
   $num_filas=mysqli_num_rows($resultF);
   if($num_filas>0)
   {
    $error="estos datos ya fue publicado ($cod_subcategoria) $num_filas";
    error();
    exit();
   }
   else
   {
    $num_filas=0;
    if(isset($cod_subcategoria) and $cod_subcategoria<>"")
    {
     if(isset($nom_subcategoria) and $nom_subcategoria<>"")
     {   
      $query2="select nom_subcategoria from subcategoria where  cod_subcategoria='$cod_subcategoria' and nom_subcategoria='$nom_subcategoria' limit 2";
      $result2=mysqli_query($conex1,$query2);
      $num_filas=mysqli_num_rows($result2);
     }
    } 
    if($num_filas>0)
    {
     $error="estos datos ya fue publicado ($nom_subcategoria)";
     error();
     exit();
    }
    else
    {
     $nom_subcategoria=ucwords($nom_subcategoria);
     // if(isset($_FILES['foto_subcategoria']))
     // {
     //  $foto="$_FILES[foto_subcategoria]";
     //  $foto=stripslashes($_FILES['foto_subcategoria']['name']);
     // }
     // ----------------------------------------------
// start copy foto ---------------------------------
     if(isset($_FILES['foto_subcategoria']))
     {
      $foto=stripslashes($_FILES['foto_subcategoria']['name']);
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
        $filename=stripslashes($_FILES['foto_subcategoria']['name']);
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
          $size=filesize($_FILES['foto_subcategoria']['tmp_name']);
          list($width, $height)=getimagesize($_FILES['foto_subcategoria']['tmp_name']);
          if ($size > MAX_SIZE*1024)
          {
          $error="<h1>El tama&ntilde;o del archivo es demasiado grande<br>El limite es de $filesize kb!</h1>";
          $errors=1;
          error();
          exit();
          }
          if(!file_exists("$dirRoot"."imagenes/menu"))
          {  mkdir("$dirRoot"."imagenes/menu", 0777, true);
          if(PHP_OS<>"WINNT")
          {
            chmod("$dirRoot"."imagenes", 0777);
          }
          }

          $newwidth="90";
          $newheight="90";
          $imagedir="$dirRoot"."imagenes/menu/";
    //  copy image --------------------------------------
          $foto_name=time().'.'.$extension;
          $newname="$dirRoot"."imagenes/menu/".$filename;
          $name2=$_FILES['foto_subcategoria']['tmp_name'];
          // echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto_subcategoria']}<br>";
          $copied=copy($_FILES['foto_subcategoria']['tmp_name'], $newname);
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
            $foto_subcategoria=$foto3;
          }
          else
          {
            @imagejpeg($thumb, $foto);
            $foto_subcategoria=$foto;
          }
          }
        }
        }
      }
     }
     if(!isset($foto_subcategoria))
     { $foto_subcategoria=""; }
     if(isset($foto_subcategoria))
     { $filename=basename($foto_subcategoria); }
     else
     { $filename=""; }
     if($foto_subcategoria<>"")
     {
      if(is_file($foto_subcategoria))
      {
        unlink($foto_subcategoria);
      }
      $mask = "*.jpg";
      array_map( "unlink", glob( $mask ) );
      $mask = "*.png";
      array_map( "unlink", glob( $mask ) );
     }
// end Foto ------------------------
// insert data here
    if(!isset($foto_subcategoria))
     { $foto_subcategoria=""; }
     if($foto_subcategoria=="Array")
     { $foto_subcategoria=""; }
     if(!isset($banner))
     { $banner=""; }
     if($banner=="Array")
     { $banner=""; }
     if(!isset($pedironline))
     { $pedironline=""; }
     if(!isset($datos_subcategoria))
     { $datos_subcategoria=""; }
     $query2="insert into subcategoria(cod_subcategoria, cod_categoria, nom_subcategoria, datos_subcategoria, foto_subcategoria)
     values('$cod_subcategoria', '$cod_categoria', '$nom_subcategoria', '$datos_subcategoria', '$foto_subcategoria')";
     $result2=mysqli_query($conex1,$query2);
     $todoBien="S";
    }
   }
  }
 }
 else
 { echo "error en los datos";
 }
 if($todoBien=="S")
 {
  echo "<html><meta http-equiv=refresh content=0;url=pro-subcat.php?cod=$cod_categoria>";
  exit();
 }
?>
