<?php
// *******************************************************************
// Sistema SiAdRe                                                   //
// Copyright (c) 2023-2007 NovenoBIT.com                            //
// *******************************************************************
//include("../configFrame2.php");
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("$dirRoot"."libs/loader.php");

if(isset($_GET['id_cliente']))
{ $id_cliente="$_GET[id_cliente]"; }
if(isset($_POST['id_cliente']))
{ $id_cliente="$_POST[id_cliente]"; }
if(isset($_GET['cid_cliente']))
{ $cid_cliente="$_GET[cid_cliente]"; }
if(isset($_GET['nom_cliente']))
{ $nom_cliente="$_GET[nom_cliente]"; }
if(isset($_POST['cid_cliente']))
{ $cid_cliente="$_POST[cid_cliente]"; }
if(isset($_POST['nom_cliente']))
{ $nom_cliente="$_POST[nom_cliente]"; }
if(isset($_POST['cod_cliente']))
{ $cod_cliente="$_POST[cod_cliente]"; }
if(isset($_POST['empresa_cliente']))
{ $empresa_cliente="$_POST[empresa_cliente]"; }
if(isset($_POST['cumpleano_cliente']))
{ $cumpleano_cliente="$_POST[cumpleano_cliente]"; }
if(isset($_POST['dir1_cliente']))
{ $dir1_cliente="$_POST[dir1_cliente]"; }
if(isset($_POST['dir2_cliente']))
{ $dir2_cliente="$_POST[dir2_cliente]"; }
//if(isset($_POST['dir3_cliente']))
//{ $dir3_cliente="$_POST[dir3_cliente]"; }
if(isset($_POST['ciudad_cliente']))
{ $ciudad_cliente="$_POST[ciudad_cliente]"; }
if(isset($_POST['estado_cliente']))
{ $estado_cliente="$_POST[estado_cliente]"; }
if(isset($_POST['tel1_cliente']))
{ $tel1_cliente="$_POST[tel1_cliente]"; }
if(isset($_POST['tel2_cliente']))
{ $tel2_cliente="$_POST[tel2_cliente]"; }
if(isset($_POST['tel3_cliente']))
{ $tel3_cliente="$_POST[tel3_cliente]"; }
if(isset($_POST['fax_cliente']))
{ $fax_cliente="$_POST[fax_cliente]"; }
if(isset($_POST['email_cliente']))
{ $email_cliente="$_POST[email_cliente]"; }
if(isset($_POST['url_cliente']))
{ $url_cliente="$_POST[url_cliente]"; }
if(isset($_POST['foto_cliente']))
{ $foto_cliente="$_POST[foto_cliente]"; }
if(isset($_POST['tipo_cliente']))
{ $tipo_cliente="$_POST[tipo_cliente]"; }
if(isset($_POST['descuento_cliente']))
{ $descuento_cliente="$_POST[descuento_cliente]"; }
if(isset($_POST['nivelprecio']))
{ $nivelprecio="$_POST[nivelprecio]"; }
if(isset($_POST['id_nivel']))
{ $id_nivel="$_POST[id_nivel]"; }
if(isset($_POST['nota_cliente']))
{ $nota_cliente="$_POST[nota_cliente]"; }
if(isset($_POST['contribuyente']))
{ $contribuyente="$_POST[contribuyente]"; }
if(isset($_POST['id_pais']))
{ $id_pais="$_POST[id_pais]"; }
if(isset($_POST['paisData']))
{ $paisData="$_POST[paisData]"; }
if(isset($_POST['lista_correo']))
{ $lista_correo="$_POST[lista_correo]"; }
if(isset($_POST['vendedor']))
{ $vendedor="$_POST[vendedor]"; }
if(isset($_POST['encargado']))
{ $encargado="$_POST[encargado]"; }

if(!isset($lista_correo))
{ $lista_correo=""; }
if(!isset($contribuyente))
{ $contribuyente=""; }
if(!isset($activo))
{ $activo="S"; }


if(!isset($id_nivel))
{ $id_nivel=0; }
if(!isset($nivelprecio))
{ $nivelprecio=0; }
if($id_nivel>0)
{ $nivelprecio=$id_nivel; }
if(!isset($cod_cliente))
{ $cod_cliente=""; }
if(isset($cod_cliente) and $cod_cliente<>"")
{ $cod_cliente=md5($cod_cliente); }


// Check Post Data --------------------------------------

 if($lista_correo=="on")
 { $lista_correo="S"; }
 else
 { $lista_correo="N"; }
 if($contribuyente=="on")
 { $contribuyente="S"; }
 else
 { $contribuyente="N"; }
 if($activo=="on")
 { $activo="S"; }
 else
 { $activo="N"; }
 if(!isset($id_pais))
 { $id_pais="ve"; }
 if(!isset( $cumpleano_cliente))
 {  $cumpleano_cliente=""; }
// --------------------------------------------------------

 if($lista_correo=="S" and $email_cliente=="")
 { $lista_correo="N"; }

// --------------------------------------------------------

$todoBien="N";
if(empty($nom_cliente))
{
 $error="falta algunos datos";
 error();
 exit();
}
else
{
 // $sqlbot=mysqli_query($conex1, "select * from clientes where id_cliente='{$clienteData['id_cliente']}'");
 // $clienteData=mysqli_fetch_array($sqlbot);
 // $cid_cliente="{$clienteData['cid_cliente']}";
 // echo $cid_cliente.'<br>';
 // exit();
  include("$dirRoot"."bots/bot-cliente.php");
  $cid_cliente=$clienteData['cid_cliente'];
  include("$dirRoot"."bots/bot-clientes-ventas.php");
  if(!empty($nom_cliente))
  {  $nom_cliente=ucwords($nom_cliente); }
  if(!empty($dir1_cliente))
  {  $dir1_cliente=ucwords($dir1_cliente); }
  if(!empty($dir2_cliente))
  {  $dir2_cliente=ucwords($dir2_cliente); }
  if(!empty($ciudad_cliente))
  {  $ciudad_cliente=ucwords($ciudad_cliente); }
  if(!empty($estado_cliente))
  {  $estado_cliente=ucwords($estado_cliente); }
  if(!empty($empresa_cliente))
  {  $empresa_cliente=ucwords($empresa_cliente); }
  if(!isset($tel3_cliente))
  {  $tel3_cliente=""; }
  if(isset($lista_correo))
  { $lista_correo="N"; }
  if(!isset($encargado))
  { $encargado=""; }
  if(empty($activo))
  { $activo="S"; }
  // echo "<br>1 $id_cliente / $id<br>2 $cod_empresa<br>3 $cid_cliente<br>4 $nom_cliente<br>5 $cumpleano_cliente<br>6 $empresa_cliente<br>7 $dir1_cliente<br>8 $dir2_cliente<br>9 $ciudad_cliente<br>0 $estado_cliente<br>1 $id_pais<br>2 $tel1_cliente<br>3 $tel2_cliente<br>4 $tel3_cliente<br>5 $email_cliente<br>6 $url_cliente<br>7 $foto_cliente<br>8 $tipo_cliente<br>9 $descuento_cliente<br>0 $nivelprecio_cliente<br>1 $nota_cliente";
  // UPDATE clientes SET cid_cliente='E81907663' WHERE clientes.id_cliente =4 LIMIT 1 ;
  // $queryCLI="UPDATE clientes set cid_cliente='$cid_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
  //$queryCLI="update clientes set nom_cliente='$nom_cliente', cumpleano_cliente='$cumpleano_cliente', empresa_cliente='$empresa_cliente', dir1_cliente='$dir1_cliente', dir2_cliente='$dir2_cliente', ciudad_cliente='$ciudad_cliente', estado_cliente='$estado_cliente', id_pais='$id_pais', tel1_cliente='$tel1_cliente', tel2_cliente='$tel2_cliente', tel3_cliente='$tel3_cliente', email_cliente='$email_cliente', url_cliente='$url_cliente', nota_cliente='$nota_cliente', contribuyente='$contribuyente',lista_correo='$lista_correo',activo='$activo' where clientes.id_cliente='{$clienteData['id_cliente']}'";

  if($numventas==0)
  {
    if($clienteData['cid_cliente']<>$cid_cliente and $cid_cliente<>"")
    {
     $queryCLI="UPDATE clientes set cid_cliente='$cid_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
    }
  }
  // $queryCLI="update clientes set nom_cliente='$nom_cliente', cumpleano_cliente='$cumpleano_cliente', empresa_cliente='$empresa_cliente', dir1_cliente='$dir1_cliente', dir2_cliente='$dir2_cliente', ciudad_cliente='$ciudad_cliente', estado_cliente='$estado_cliente', id_pais='$id_pais', tel1_cliente='$tel1_cliente', tel2_cliente='$tel2_cliente', tel3_cliente='$tel3_cliente', email_cliente='$email_cliente', url_cliente='$url_cliente', nota_cliente='$nota_cliente', contribuyente='$contribuyente',lista_correo='$lista_correo',activo='$activo' where clientes.id_cliente='{$clienteData['id_cliente']}'";
  if($clienteData['nom_cliente']<>$nom_cliente and $nom_cliente<>"")
  {
     $queryCLI="UPDATE clientes set nom_cliente='$nom_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['empresa_cliente']<>$empresa_cliente and $empresa_cliente<>"")
  {
     $queryCLI="UPDATE clientes set empresa_cliente='$empresa_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }

  if($clienteData['encargado']<>$encargado and $encargado<>"")
  {
     $queryCLI="UPDATE clientes set encargado='$encargado' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }

  if($clienteData['ciudad_cliente']<>$ciudad_cliente and $ciudad_cliente<>"")
  {
     $queryCLI="UPDATE clientes set ciudad_cliente='$ciudad_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['estado_cliente']<>$estado_cliente and $estado_cliente<>"")
  {
     $queryCLI="UPDATE clientes set estado_cliente='$estado_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['dir1_cliente']<>$dir1_cliente and $dir1_cliente<>"")
  {
     $queryCLI="UPDATE clientes set dir1_cliente='$dir1_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['dir2_cliente']<>$dir2_cliente and $dir2_cliente<>"")
  {
     $queryCLI="UPDATE clientes set dir2_cliente='$dir2_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['tel1_cliente']<>$tel1_cliente and $tel1_cliente<>"")
  {
     $queryCLI="UPDATE clientes set tel1_cliente='$tel1_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['tel2_cliente']<>$tel2_cliente and $tel2_cliente<>"")
  {
     $queryCLI="UPDATE clientes set tel2_cliente='$tel2_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['email_cliente']<>$email_cliente and $email_cliente<>"")
  {
     $queryCLI="UPDATE clientes set email_cliente='$email_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['url_cliente']<>$url_cliente and $url_cliente<>"")
  {
     $queryCLI="UPDATE clientes set url_cliente='$url_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }  if($clienteData['url_cliente']<>$url_cliente and $url_cliente<>"")
  if($clienteData['nota_cliente']<>$nota_cliente and $nota_cliente<>"")
  {
     $queryCLI="UPDATE clientes set nota_cliente='$nota_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  //if($clienteData['cumpleano_cliente']<>$cumpleano_cliente and $cumpleano_cliente<>"")
  //{
  //   $queryCLI="UPDATE clientes set cumpleano_cliente='$cumpleano_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
  //   $result=mysqli_query($conex1,$queryCLI);
  //}
  if($clienteData['cod_cliente']<>$cod_cliente and $cod_cliente<>"")
  {
     $queryCLI="UPDATE clientes set cod_cliente='$cod_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }

  if($clienteData['lista_correo']<>$lista_correo and $lista_correo<>"")
  {
     $queryCLI="UPDATE clientes set lista_correo='$lista_correo' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['contribuyente']<>$contribuyente and $contribuyente<>"")
  {
     $queryCLI="UPDATE clientes set contribuyente='$contribuyente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['vendedor']<>$vendedor and $vendedor<>"")
  {
     $queryCLI="UPDATE clientes set vendedor='$vendedor' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }

  if($clienteData['tipo_cliente']<>$tipo_cliente and $tipo_cliente<>"")
  {
     $queryCLI="UPDATE clientes set tipo_cliente='$tipo_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }
  if($clienteData['nivelprecio']<>$nivelprecio and $nivelprecio<>"")
  {
     $queryCLI="UPDATE clientes set nivelprecio='$nivelprecio' where clientes.id_cliente='{$clienteData['id_cliente']}'";
     $result=mysqli_query($conex1,$queryCLI);
  }

  $todoBien="S";
}
if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=cliente-ver3.php?op=cl&id={$clienteData['id_cliente']}>";
 exit(); }
?>
