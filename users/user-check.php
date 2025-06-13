<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  user-check.php                                             //
// ****************************************************************
include_once("../includes/session.php");
include_once("../libs1/loader.php");
$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$message="S";
$dirRoot="../";
$topAdmin="S";
//include_once("../includes/headfileFrame.php");
if (ob_get_level() == 0) ob_start();
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libGeneral.php");
include_once("$dirRoot"."libs1/libUsers.php");

if(isset($_GET['nd']))
{ $nd=$_GET['nd']; }
if(isset($_GET['id']))
{ $id=$_GET['id']; }
else
{ $id=""; }
if(isset($_GET['dirTra']))
{ $dirTra=$_GET['dirTra']; }
if(isset($dirTra) and $dirTra==1)
{ $dirTra="./"; }
if(isset($dirTra) and $dirTra==2)
{ $dirTra="../"; }
if(isset($dirTra) and $dirTra==3)
{ $dirTra="../../"; }
if(!isset($dirTra))
{ $dirTra=$dirRoot; }
else
{ $dirRoot=$dirTra; }

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
   echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."user-login.php>";
   exit();
 }
}
if(isset($captcha) and $captcha=="yes")
{
 if(isset($_POST['usuario']))
 { $usuario="$_POST[usuario]"; }
 if(isset($_POST['clave1']))
 { $claveUser="$_POST[clave1]"; }

 if(isset($claveUser) and $claveUser<>"")
 { $tipoCI=substr($claveUser,0,1); }
 if(isset($tipoCI) and $tipoCI=="'" or $tipoCI=="%")
 { echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."user-login.php>";
   exit();
 }
 if(!isset($usuario) or $usuario=="" and !isset($claveUser) or $claveUser=="")
 { echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."user-login.php>";
   exit();
 }
//--------------------
 if(isset($claveUser) and $claveUser<>"")
 {
  if($claveUser=="1234" or $claveUser=="12345" or $claveUser=="123456" or $claveUser=="1234567" or $claveUser=="12345678" or $claveUser=="'1=1")
  {
   $error="Error de Password";
   $dirRoot="./";
   error();
   echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."user-login.php>";
   exit();
  }
 }
}
else
{
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."user-login.php>";
  exit();
}

//---------------------
// User Data
//---------------------
$numFilas1=0;
$numFilas2=0;
if(isset($clave1) and $clave1<>"")
{
 $clave1=substr($clave1,0,20);
 $clave1=md5($claveUser);
}

$claveUser=md5($claveUser);
//$clave=substr($clave,0,20);
//$usuario=$usuario2;

$sqlUser=mysqli_query($conex1,"select * from usuarios where usuario='$usuario' and clave='$claveUser' and activo='S'");
$numFilas1=mysqli_num_rows($sqlUser);
if($numFilas1==0)
{
 //$sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,email_cliente,tipo_cliente from clientes where cod_cliente='$claveUser' and cid_cliente='$usuario' or email_cliente='$usuario' and activo='S'");
 $sqlCliente=mysqli_query($conex1,"select * from clientes where cod_cliente='$claveUser' and cid_cliente='$usuario' or email_cliente='$usuario' and activo='S'");
 $numFilas2=mysqli_num_rows($sqlCliente);
}

//------------------------------------------

if($numFilas1>0)
{
 $userData=mysqli_fetch_array($sqlUser);
 if(isset($userData))
 {
   $iduser=$userData['iduser'];
   $_SESSION['iduser']=$userData['iduser'];
   $_SESSION['usuario']=$userData['usuario'];
   $_SESSION['clave']=$userData['clave'];
   $_SESSION['nombre']=$userData['nombre'];
   $_SESSION['apellido']=$userData['apellido'];
   $_SESSION['idnivel']=$userData['idnivel'];
   $_SESSION['sistema']="e";
   $sistema=$_SESSION['sistema'];
   $idnivel=$userData['idnivel'];
   $tipousuario=$userData['tipousuario'];
   $usuario2=$userData['usuario'];

   if($idnivel<=3 and $tipousuario=="")
   {
     $tipousuario="E";
     $queryUser="update usuarios set tipousuario='E' where usuarios.iduser='$iduser'";
     $result=mysqli_query($conex1,$queryUser);
   }
   $time=time();
   $num_filas=0;
   $query="select * from useronline where usuario='$usuario2'";
   $sql2=mysqli_query($conex1,$query);
   $num_filas=mysqli_num_rows($sql2);
   if($num_filas==0)
   {
    $query="insert into useronline(usuario, time)
    values('$usuario2','$time')";
    $result=mysqli_query($conex1,$query);
   }
   if($tipousuario=="E" or $idnivel<=3)
   { echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."users/usersection.php?sistema=$sistema>"; }
   if($tipousuario=="C" or $tipousuario=="" or $idnivel>=4)
   { echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php?sistema=$sistema>"; }
   exit();
 }
 else
 { $numFilas1=0; }
}

if($numFilas1==0 and $numFilas2>0)
{
 $clienteData=mysqli_fetch_array($sqlCliente);
 if(isset($clienteData))
 {
   $_SESSION['iduser']=$clienteData['id_cliente'];
   $_SESSION['usuario']=$clienteData['cid_cliente'];
   $usuario=$clienteData['cid_cliente'];
   $_SESSION['clave']=$clienteData['cod_cliente'];
   $_SESSION['nombre']=$clienteData['nom_cliente'];
   $_SESSION['tipo_cliente']=$clienteData['tipo_cliente'];
   //$idnivel=$clienteData['nivelprecio'];
   $idnivel=4;
   $_SESSION['idnivel']=$idnivel;
   $_SESSION['sistema']="c";
   $sistema=$_SESSION['sistema'];
   $tipousuario=$clienteData['tipo_cliente'];
   if($clienteData['email_cliente']<>"")
   { $usuario2=$clienteData['email_cliente']; }
   $time=time();
   $num_filas=0;
   $tipousuario="C";
   if(isset($usuario2) and $usuario2<>"")
   {
    $query="select * from useronline where usuario='$usuario2'";
    $sql2=mysqli_query($conex1,$query);
    $num_filas=mysqli_num_rows($sql2);
   }
   if($num_filas==0)
   {
    $query="insert into useronline(usuario, time)
    values('$usuario','$time')";
    $result=mysqli_query($conex1,$query);
   }
   echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php?sistema=$sistema>";
   exit();
 }
 else
 { $numFilas2=0; }
}

if($numFilas1==0 and $numFilas2==0)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."user-login.php>";
 exit();
}
?>
