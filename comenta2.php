<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  coments2.php                                               //
// ****************************************************************
include_once("./includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="N";
$message="N";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$divider="S";
$dropdown="S";
$dirRoot="./";
include_once("./includes/config.ini.php");
?>

<div class='ui container'>

 <div class="ui grid">
  <div class="six wide column">
    <div class="ui message">
     <?php include_once('./libs1/loader.php'); ?>
    </div>
  </div>
  <div class="ten wide column">

   <?php
      $numFilas=0;
      FechayHora();
      if(isset($_SESSION['check']) and isset($_POST['captcha']))
      {
       if($_SESSION['check']==$_POST['captcha'])
       {  $captcha="yes"; }
       else
       { $captcha="No";
         $error="Error de Captcha";
         error();
         echo "<div class='ui negative centered message'>
           <div class='header'>$error</div> <p>Regresa y agrega los Datos</p>
         </div>";
         // echo "<html><meta http-equiv=refresh content=0;url=user-comenta1.php>";
         exit();
       }
      }
      if($captcha=="yes")
      {
       if(isset($_POST['nombre']))
       { $nombre="$_POST[nombre]"; }
       if(isset($_POST['mensaje']))
       { $mensaje="$_POST[mensaje]"; }
       if(!isset($nombre) or $nombre=="" and !isset($mensaje) or $mensaje=="")
       {
         echo "<h1 class='font-red'>Error en los datos de Nombrey Mensaje</h1>";
         $error="Error de Datos";
         error();
         echo "<html><meta http-equiv=refresh content=3;url=user-comenta1.php>";
         exit();
       }
      //--------------------
       if(isset($mensaje) and $mensaje<>"")
       {
        if($mensaje=="1234" or $mensaje=="12345" or $mensaje=="123456" or $mensaje=="1234567" or $mensaje=="12345678")
        {
         echo "<h1 class='font-red'>Error de Datos</h1>";
         $error="Error de Mensaje";
         error();
         // echo "<html><meta http-equiv=refresh content=3;url=user-login.php>";
         exit();
        }
       }

      //--------------------------
      if(isset($_POST['nombre']))
      { $nombre="$_POST[nombre]"; }
      if(isset($_POST['mensaje']))
      { $mensaje="$_POST[mensaje]"; }
      if(isset($_POST['email']))
      { $email="$_POST[email]"; }
      if(isset($_POST['celular']))
      { $celular=$_POST['celular']; }
      //--------------------------------------

      if(!isset($nombre) or $nombre=="")
      { $error="error en los datos de Nombre"; }
      if(!isset($mensaje) or $mensaje=="")
      { $error="error en los datos del Mensaje"; }

      //if(!isset($email) or $email=="")
      //{ $error="error en los datos de Correo"; }
      //if(!isset($celular) or $celular=="")
      //{ $error="error en los datos de Celular"; }

      if($email=="" and $celular=="")
      { $error="error en los datos de Correo"; }

      if(isset($error) and $error<>"")
      {
        error();
        exit();
      }

      //--------------------------------------
       //echo " $nombre / $clave / $mensaje";
        $randnum=rand();
        $query2="insert into comentarios(nombre,email,celular,mensaje,dia,mes,ano,hora,randnum)
        values('$nombre','$email','$celular','$mensaje','$dia','$mes','$ano','$hora','$randnum')";
        $result2=mysqli_query($conex1,$query2);

        $numFilas=0;
        $sqlComenta=mysqli_query($conex1,"select id from comentarios where dia='$dia' and randnum='$randnum'");
        $numFilas=mysqli_num_rows($sqlComenta);
        if($numFilas==0)
        {
         $error="Los Datos NO fue Registrado";
         error();
         exit();
        }
        else
        {
       ?>
          <div class="ui floating violet message">
            <p>Tu mensaje fue registrado con exito. Pronto te daremos una repuesta.</p>
          </div>
       <?php
        }
      }
   ?>
  </div>
 </div>
 <?php
  if($numFilas>0)
  {
   // sleep(20);
   echo "<html><meta http-equiv=refresh content=5;url=index.php>";
   exit();
  }
 ?>
</div>
