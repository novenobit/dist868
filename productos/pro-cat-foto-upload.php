<?php
// start copy foto ---------------------------------
if(isset($_FILES['foto_categoria']))
{
   $foto=stripslashes($_FILES['foto_categoria']['name']);
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
     $filename=stripslashes($_FILES['foto_categoria']['name']);
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
      $size=filesize($_FILES['foto_categoria']['tmp_name']);
      list($width, $height)=getimagesize($_FILES['foto_categoria']['tmp_name']);
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
      $name2=$_FILES['foto_categoria']['tmp_name'];
      // echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto_categoria']}<br>";
      $copied=copy($_FILES['foto_categoria']['tmp_name'], $newname);
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
        $foto_categoria=$foto3;
       }
       else
       {
        @imagejpeg($thumb, $foto);
        $foto_categoria=$foto;
       }
      }
     }
    }
   }
}
if(!isset($foto_categoria))
{ $foto_categoria=""; }
if(isset($foto_categoria))
{ $filename=basename($foto_categoria); }
else
{ $filename=""; }
if($foto_categoria<>"")
{
   if(is_file($foto_categoria))
   {
    unlink($foto_categoria);
   }
   $mask = "*.jpg";
   array_map( "unlink", glob( $mask ) );
   $mask = "*.png";
   array_map( "unlink", glob( $mask ) );
}
// end Foto ------------------------
?>
