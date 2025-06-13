<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes-nuevo2.php                                                     //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs/config-db.php");
include_once("$dirRoot"."libs/libUsers.php");
include_once("$dirRoot"."libs/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
FechayHora();
$todoBien="N";

  if(isset($_POST['cid_cliente']))
  { $cid_cliente="$_POST[cid_cliente]"; }
  if(isset($_POST['cod_cliente']))
  { $cod_cliente="$_POST[cod_cliente]"; }
  if(isset($_POST['nom_cliente']))
  { $nom_cliente="$_POST[nom_cliente]"; }
  if(isset($_POST['empresa']))
  { $empresa="$_POST[empresa]"; }
  if(isset($_POST['dir1_cliente']))
  { $dir1_cliente="$_POST[dir1_cliente]"; }
  if(isset($_POST['dir2_cliente']))
  { $dir2_cliente="$_POST[dir2_cliente]"; }
  if(isset($_POST['tel1_cliente']))
  { $tel1_cliente="$_POST[tel1_cliente]"; }
  if(isset($_POST['tel2_cliente']))
  { $tel2_cliente="$_POST[tel2_cliente]"; }
  if(isset($_POST['email_cliente']))
  { $email_cliente="$_POST[email_cliente]"; }
  if(isset($_POST['url_cliente']))
  { $url_cliente="$_POST[url_cliente]"; }
  if(isset($_POST['foto_cliente']))
  { $foto_cliente="$_POST[foto_cliente]"; }
  if(isset($_POST['descuento']))
  { $descuento="$_POST[descuento]"; }
  if(isset($_POST['nivelprecio']))
  { $nivelprecio="$_POST[nivelprecio]"; }
  if(isset($_POST['id_nivel']))
  { $id_nivel="$_POST[id_nivel]"; }
  if(isset($_POST['nota_cliente']))
  { $nota_cliente="$_POST[nota_cliente]"; }
  if(isset($_POST['vendedor']))
  { $vendedor="$_POST[vendedor]"; }
  if(isset($_POST['encargado']))
  { $encargado="$_POST[encargado]"; }

  $tchas1=strlen($cid_cliente);
  $tchas2=strlen($nom_cliente);
  if(empty($cid_cliente) or empty($nom_cliente) or $tchas1 <= 5 or $tchas2 <= 5)
  {
   $error="falta algunos datos";
   error();
   exit();
  }
  else
  {
   $result=mysqli_query($conex1,"select id_cliente from clientes where cid_cliente='$cid_cliente'");
   $num_filas=mysqli_num_rows($result);
   if($num_filas>0)
   {
    $error="esta cliente ya fue publicado";
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

    $query2="insert into clientes(cid_cliente, cod_cliente, nom_cliente, empresa_cliente, encargado, dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, id_pais, tel1_cliente, tel2_cliente,  email_cliente, url_cliente, foto_cliente, tipo_cliente, nivelprecio, nota_cliente, contribuyente, lista_correo, vendedor, ip_cliente, activo)
    values('$cid_cliente', '$cod_cliente', '$nom_cliente', '$empresa_cliente', '$encargado','$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$id_pais', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$url_cliente', '$foto_cliente', '$tipo_cliente', '$nivelprecio', '$nota_cliente', '$contribuyente', '$lista_correo', '$vendedor', '$ip_cliente','S')";
    $result2=mysqli_query($conex1,$query2);
    $todoBien="S";
 }
}
if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=clientes-nuevo1.php?op=cl>";
 exit();
}
?>
