<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  user-registrar2.php                                             //
// ****************************************************************
include_once("./includes/session.php");
$dirRoot="./";
if (ob_get_level() == 0) ob_start();
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("./libs1/libGeneral.php");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Standard Meta -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- Site Properties -->
<title>Login 868</title>
<link rel="stylesheet" type="text/css" href="./libs2/fomantic292/semantic.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/site.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/container.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/grid.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/card.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/header.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/image.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/menu.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/dropdown.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/divider.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/segment.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/form.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/input.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/button.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/list.min.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/message.css">
<link rel="stylesheet" type="text/css" href="./libs2/components/icon.min.css">
<style type="text/css">
    body {
      background-color: #DADADA;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
</style>
</head>
<body id="top" translate="no"  style="margin-top:80px;" onLoad="document.forms[0].elements[0].focus()">
<?php
 include_once('./includes/topfile.php');
?>
<div class='ui container'>
 <div class="ui message">
  <?php include_once('./libs1/loader.php'); ?>


<?php
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
   // echo "<html><meta http-equiv=refresh content=0;url=user-register1.php>";
   exit();
 }
}

if($captcha=="yes")
{
 if(isset($_POST['usuario']))
 { $usuario="$_POST[usuario]"; }
 if(isset($_POST['clave1']))
 { $clave1="$_POST[clave1]"; }
 if(!isset($usuario) or $usuario=="" and !isset($clave1) or $clave1=="")
 {
   echo "<h1 class='font-red'>Error de Usuario</h1>";
   $error="Error de User";
   error();
   echo "<html><meta http-equiv=refresh content=3;url=user-register1.php>";
   exit();
 }
//--------------------
 if(isset($clave1) and $clave1<>"")
 {
  if($clave1=="1234" or $clave1=="12345" or $clave1=="123456" or $clave1=="1234567" or $clave1=="12345678")
  {
   echo "<h1 class='font-red'>Error de Clave</h1>";
   $error="Error de Clave";
   error();
   // echo "<html><meta http-equiv=refresh content=3;url=user-login.php>";
   exit();
  }
 }

//--------------------------
if(isset($_POST['tipo']))
{ $tipo="$_POST[tipo]"; }
if(isset($_GET['cid_cliente']))
{ $cid_cliente="$_GET[cid_cliente]"; }
if(isset($_POST['cid_cliente']))
{ $cid_cliente="$_POST[cid_cliente]"; }
if(isset($_POST['empresa_cliente']))
{ $empresa_cliente="$_POST[empresa_cliente]"; }
if(isset($_POST['nombre']))
{ $nombre="$_POST[nombre]"; }
if(isset($_POST['apellido']))
{ $apellido="$_POST[apellido]"; }

if(isset($_POST['dir1_cliente']))
{ $dir1_cliente="$_POST[dir1_cliente]"; }
if(isset($_POST['dir2_cliente']))
{ $dir2_cliente="$_POST[dir2_cliente]"; }

if(isset($_POST['ciudad']))
{ $ciudad="$_POST[ciudad]"; }
if(isset($_POST['estado']))
{ $estado="$_POST[estado]"; }

if(isset($_POST['usuario']))
{ $usuario="$_POST[usuario]"; }
if(isset($_POST['clave1']))
{ $clave1="$_POST[clave1]"; }
if(isset($_POST['clave2']))
{ $clave2="$_POST[clave2]"; }
if(isset($_POST['email']))
{ $email="$_POST[email]"; }
if(isset($_POST['email2']))
{ $email2="$_POST[email2]"; }

if(isset($_POST['telefono']))
{ $telefono=$_POST['telefono']; }
if(isset($_POST['celular']))
{ $celular=$_POST['celular']; }
if(isset($_POST['website']))
{ $website=$_POST['website']; }

if(isset($_FILES['foto']))
{ $foto=$_FILES['foto']; }
if(isset($_POST['id_pais']))
{ $id_pais=$_POST['id_pais']; }

//--------------------------------------
//if(!isset($tipo) or $tipo=="")
//{ $error="No indico el Tipo de usuario"; }
//if(!isset($cid_cliente) or $cid_cliente=="")
//{ $error="No indico la Cedula o el RIF del usuario"; }
if(!isset($nombre) or $nombre=="")
{ $error="No indico el Nombre"; }
if(!isset($apellido) or $apellido=="")
{ $error="No indico el Apellido"; }
if(!isset($clave1) or $clave1=="")
{ $error="error en los datos de Seguridad"; }
if(!isset($usuario) or $usuario=="")
{ $error="error en los datos de Usuario"; }
if(!isset($email) or $email=="")
{ $error="error en los datos de Correo"; }
if(!isset($celular) or $celular=="")
{ $error="error en los datos de Celular"; }

if(isset($error) and $error<>"")
{
  error();
  exit();
}

//--------------------------------------

 $clave=md5($clave1);
 $usuario2=substr("$usuario",0,20);
 $usuario=$usuario2;
 //echo " $usuario &#124; $clave &#124; $clave1";
 $numFilas=0;
// echo "<br>select iduser,usuario,clave,idnivel from usuarios where usuario='$usuario' and clave='$clave' and activo='S'";
 $sqlUser=mysqli_query($conex1,"select iduser from usuarios where clave='$clave'");
 $numFilas=mysqli_num_rows($sqlUser);
 if($numFilas>0)
 {
  $error="Error en los Datos";
  error();
  exit();
 }

//--------------------------------------

 $clave=md5($clave1);
 $usuario2=substr("$usuario",0,20);
 $usuario=$usuario2;
 //echo " $usuario &#124; $clave &#124; $clave1";
 $numFilas=0;
// echo "<br>select iduser,usuario,clave,idnivel from usuarios where usuario='$usuario' and clave='$clave' and activo='S'";
 $sqlUser=mysqli_query($conex1,"select iduser from usuarios where usuario='$usuario' and activo='S'");
 $numFilas=mysqli_num_rows($sqlUser);
 if($numFilas>0)
 {
  $error="Un Usuario con estos Datos ya fue Registrado";
  error();
  exit();
 }

//----------------------------------
  $contribuyente="N";

//----------------------------------

 // $usuario
 //if(!issetcid_clienteio) orcid_clienteio=="")
 //{cid_clienteio="$usuario"; }
 //$clave
 if(!isset($empresa_cliente))
 { $empresa_cliente=""; }
 if(!isset($nombre))
 { $nombre=""; }
 if(!isset($apellido))
 { $apellido=""; }

 if(!isset($telefono))
 { $telefono=""; }

 //$email="";
 if(!isset($dir1_cliente))
 { $dir1_cliente=""; }
 if(!isset($dir2_cliente))
 { $dir2_cliente=""; }

 if(!isset($ciudad))
 { $ciudad=""; }
 if(!isset($estado))
 { $estado=""; }

 if(!isset($celular))
 { $celular=""; }
 if(!isset($website))
 { $website=""; }
 if(!isset($foto))
 { $foto=""; }
 if(!isset($id_tipoemp))
 { $id_tipoemp="7"; }
 if(!isset($idnivel))
 { $idnivel="4"; }
 if(!isset($tipousuario))
 { $tipousuario="C"; }
 if(!isset($nivelprecio))
 { $nivelprecio="1"; }
 if(!isset($lista_correo))
 { $lista_correo="S"; }
 if(!isset($vendedor))
 { $vendedor=""; }
 if(!isset($nota))
 { $nota=""; }
 $submitted="$dia/$mes/$ano";
 $activo="S";


 $nom_cliente=$nombre;
 $ape_cliente=$apellido;
 $tel1_cliente=$telefono;
 $tel2_cliente=$celular;
 $email_cliente=$email;
 $url_cliente=$website;
 $nota_cliente=$nota;

//------------------------------------
   $result=mysqli_query($conex1,"select id_cliente from clientes where email_cliente='$email_cliente'");
   $num_filas=mysqli_num_rows($result);
   if($num_filas>0)
   {
    $error="esta cliente ya fue registrado";
    error();
    exit();
   }
   else
   {
    $nom_cliente=ucwords($nom_cliente);
    if(!empty($empresa))
    { $empresa=ucwords($empresa); }
    if(!empty($dir1_cliente))
    { $dir1_cliente=ucwords($dir1_cliente); }
    if(!empty($dir2_cliente))
    { $dir2_cliente=ucwords($dir2_cliente); }
    $textoremove=$nom_cliente;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $nom_cliente=ucwords($textoremove);
    $textoremove=$dir1_cliente;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $dir1_cliente=ucwords($textoremove);
    //if(!isset($cid_cliente) or $cid_cliente=="")
    //{
    // $cid_cliente=crypt($cid_cliente);
     // $pin_cliente=crypt($cid_cliente);
    //}
    if(!isset($id_nivel))
    { $id_nivel=0; }
    if(!isset($nivelprecio))
    { $nivelprecio=0; }
    if(!isset($foto_cliente))
    { $foto_cliente=""; }
    if(isset($lista_correo))
    { $lista_correo=""; }
    if(!isset($descuento))
    { $descuento=""; }
    if(!isset($encargado))
    { $encargado=""; }

    if(!isset($vendedor))
    { $vendedor=""; }
    if(!isset($tipo_cliente))
    { $tipo_cliente="DET"; }
    if($id_nivel>0)
    { $nivelprecio=$id_nivel; }
    if(!isset($cod_cliente))
    { $cod_cliente="";
      if(isset($cid_cliente) and $cid_cliente<>"")
      {
        $cod_cliente=substr($cid_cliente, -5);
        // $cod_cliente=md5($cod_cliente);
      }
    }

    if(isset($nivelprecio) and $nivelprecio==2)
    {
     if($tipo_cliente<>"MAY")
     { $tipo_cliente="MAY"; }
    }
    if(isset($nivelprecio) and $nivelprecio==3)
    {
     if($tipo_cliente<>"ESP")
     { $tipo_cliente="ESP"; }
    }
    if(isset($cod_cliente) and $cod_cliente<>"")
    { $cod_cliente=md5($cod_cliente); }
    if(!isset($empresa_cliente))
    { $empresa_cliente=""; }
    if(!isset($ciudad_cliente))
    { $ciudad_cliente=""; }
    if(!isset($estado_cliente))
    { $estado_cliente=""; }
    $id_pais="ve";
    if(!isset($contribuyente))
    { $contribuyente="S"; }
    if(!isset($lista_correo))
    { $lista_correo=""; }
    if(!isset($ip_cliente))
    { $ip_cliente=""; }
    if(isset($clave) and $clave<>"")
    {
     $cod_cliente=$clave;
    }
    $query2="insert into clientes(cid_cliente, cod_cliente, nom_cliente, empresa_cliente, encargado, dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, id_pais, tel1_cliente, tel2_cliente,  email_cliente, url_cliente, foto_cliente, tipo_cliente, nivelprecio, nota_cliente, contribuyente, lista_correo, vendedor, ip_cliente, activo)
    values('$cid_cliente', '$cod_cliente', '$nom_cliente', '$empresa_cliente', '$encargado','$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$id_pais', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$url_cliente', '$foto_cliente', '$tipo_cliente', '$nivelprecio', '$nota_cliente', '$contribuyente', '$lista_correo', '$vendedor', '$ip_cliente','S')";
    $result2=mysqli_query($conex1,$query2);
    $todoBien="S";
 }
?>
 </div>
</div>
<?php
 echo "<html><meta http-equiv=refresh content=0;url=user-login.php>";
 exit();
}
?>
