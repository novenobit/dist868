<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (ob_get_level() == 0) ob_start();

//$DBuser="nvbitcom_root";
//$DBpass="Admin$868&demo";
$DBase1="nvbitcom_dist868";
$webtitle="ven868.net";
$DBuser="nvbitcom";
$DBpass="Nov.218421*";
// ------------------------------------

$conex1=mysqli_connect("$DBhost", "$DBuser", "$DBpass");
if (mysqli_connect_errno()) {
   echo "<br><br><font size='+2' color='red'>NO se pudo realizar la conexi&oacute;n</font>";
  // echo "<html><meta http-equiv=refresh content=2;url=../index.php>";
  exit();
}

if(!mysqli_ping($conex1))
{
 mysqli_close($conex1);
 $conex1=mysqli_connect("$DBhost", "$DBuser", "$DBpass");
 if (mysqli_connect_errno() or !$conex1)
 {
   echo "<br><br><font size='+2' color='red'>NO se pudo realizar la conexi&oacute;n<br><br>Error de Conexion, Revisa el Servidor, PHP o MySQL Server</font>";
  // echo "<html><meta http-equiv=refresh content=2;url=../index.php>";
   exit();
 }
}

$db_selected1=mysqli_select_db($conex1,"$DBase1");
if(!$db_selected1)
{
 if($DBase1<>"")
 {
   //include("libGeneral.php");
   $mensaje="La base de datos ($DBase1) no existe, Voy a Crearlo, esta Operacion puede tardar unos minutos ";
   mensaje();
   include("loader.php");
   //include("dataBase/createDataBase.php");
   $db_selected1=mysqli_select_db($conex1,"$DBase1");
   //include("libCreateTables.php");
   //include("libInsertaData.php");
 }
 $db_selected2=mysqli_select_db($conex1,"$DBase1");
 if(!$db_selected2)
 {
  echo "<br><br><font size='+2' color='red'>La base de datos ($DBase1) no existe</font>";
  $inif="dbase.php";
  $fh=fopen($inif, 'w') or die("can't open file");
  $pfdata="";
  fwrite($fh, $pfdata);
  fclose($fh);
  echo "<html><meta http-equiv=refresh content=2;url=../index.php>";
  exit();
 }
}

// $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =\"$DBase1\"";
// SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'DBName'
?>
