<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-foto2.php                                                     //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
FechayHora();
if(isset($_GET['id']))
{ $id="$_GET[id]"; }
if(isset($_POST['id']))
{ $id="$_POST[id]"; }
$testData="N";
$ok="S";
$todoBien="N";

// ----------------------------------------------
// start copy foto ------------------------------
if(isset($_FILES['foto_producto']))
{
   $foto=stripslashes($_FILES['foto_producto']['name']);
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
     $filename=stripslashes($_FILES['foto_producto']['name']);
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
      $size=filesize($_FILES['foto_producto']['tmp_name']);
      //list($width, $height)=getimagesize($_FILES['foto_producto']['tmp_name']);
      if ($size > MAX_SIZE*1024)
      {
       $error="<h1>El tama&ntilde;o del archivo es demasiado grande<br>El limite es de $filesize kb!</h1>";
       $errors=1;
       error();
       exit();
      }
      if(!file_exists("$dirRoot"."imagenes/productos"))
      {  mkdir("$dirRoot"."imagenes/productos", 0777, true);
       if(PHP_OS<>"WINNT")
       {
        chmod("$dirRoot"."imagenes", 0777);
       }
      }

      $newwidth="90";
      $newheight="90";
      $imagedir="$dirRoot"."imagenes/productos/";
//  copy image --------------------------------------
      $foto_name=time().'.'.$extension;
      $newname="$dirRoot"."imagenes/productos/".$filename;
      $name2=$_FILES['foto_producto']['tmp_name'];
      // echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto_producto']}<br>";
      $copied=copy($_FILES['foto_producto']['tmp_name'], $newname);
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
        $foto_producto=$foto3;
       }
       else
       {
        @imagejpeg($thumb, $foto);
        $foto_producto=$foto;
       }
      }
     }
    }
   }
}
if(!isset($foto_producto))
{ $foto_producto=""; }
if(isset($foto_producto))
{ $filename=basename($foto_producto); }
else
{ $filename=""; }
if($foto_producto<>"")
{
   if(is_file($foto_producto))
   {
    unlink($foto_producto);
   }
   $mask = "*.jpg";
   array_map( "unlink", glob( $mask ) );
   $mask = "*.png";
   array_map( "unlink", glob( $mask ) );
}
// end Foto -------------------------------------
// ----------------------------------------------
// insert data here
// echo "<br>1 $cod_producto  <br>2 $cod_categoria  <br>3 $cod_subcategoria  <br>4 $nom_producto  <br>5 $datos_producto  <br>6 $precio1_producto  <br>7 $precio_compra  <br>8 $ultimo_costo  <br>9 $costo_promedio  <br>0 $stock_actual  <br>1 $unidad_medida  <br>11 $bultos_producto <br>2 $minima  <br>3 $maxima  <br>4 $filename";

 if(isset($foto_producto) and $foto_producto<>"")
 {
  if(!isset($foto_producto))
  { $foto_producto=""; }
  if($foto_producto=="Array")
  { $foto_producto=""; }
  if(isset($foto_producto) and $foto_producto<>"" and $foto_producto<>"Array")
  {
    $query="update productos set foto_producto='$foto_producto' where id_producto='$id'";
    $result=mysqli_query($conex1,$query);
  }
  //echo "<html><meta http-equiv=refresh content=0;url=producto-ver1.php?op=pl&id=$id>";
  echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."productos/producto-ver3.php?op=ver&id=$id>";
  exit();
 }
 else
 {
  if(isset($foto) and $foto<>"" and $foto<>"Array")
  {
    $query="update productos set foto_producto='$foto' where id_producto='$id'";
    $result=mysqli_query($conex1,$query);
  }
  // echo "<html><meta http-equiv=refresh content=0;url=producto-ver1.php?op=pl&id=$id>";
  echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."productos/producto-ver3.php?op=ver&id=$id>";
  exit();
 }

// echo "<br>1 $cod_producto  <br>2 $cod_categoria  <br>3 $cod_subcategoria  <br>4 $nom_producto  <br>5 $datos_producto  <br>6 $precio1_producto  <br>7 $precio_compra  <br>8 $ultimo_costo  <br>9 $costo_promedio  <br>0 $stock_actual  <br>1 $unidad_medida  <br>11 $bultos_producto <br>2 $minima  <br>3 $maxima  <br>4 $filename";
if($todoBien=="S")
{
?>
  <div class="container">
    <h1>Listo</h1>
    <div class="yellow">
      <p>Los Datos Fueron Agregados a la Base de Datos</p>
    </div>
  </div>
  <p><br></br></p>
<?php
//   echo "<html><meta http-equiv=refresh content=1;url=producto-ver1.php?id=$id>";
echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."productos/producto-ver3.php?op=ver&id=$id>";
}

function floatvalue($val){
            $val = str_replace(",",".",$val);
            $val = preg_replace('/\.(?=.*\.)/', '', $val);
            return floatval($val);
}
?>
