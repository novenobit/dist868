<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// ****************************************************************
//if(!isset($_SESSION))
//{ session_start(); }
//if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
 }
 else
 {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 }
//initialize cart if not set or is unset
if(!isset($_SESSION['pedido'])){
  $_SESSION['pedido'] = array();
}
//unset qunatity
unset($_SESSION['qty_array']);
if(!headers_sent())
{ header("Cache-control: private");  }
ini_set("max_execution_time", "0");
//userid();
if(!isset($usuario) or $usuario=="")
{
 if(isset($_SESSION['usuario']) and $_SESSION['usuario']<>"")
 {
  $usuario=$_SESSION['usuario'];
 }
}
if(!isset($_SESSION['pedido']))
{
  $_SESSION['pedido'] = array();
}
if(isset($_SESSION['pedido']) and $_SESSION['pedido']<>"")
{ $cart=count($_SESSION['pedido']); }

if (ob_get_level() == 0) ob_start();
include_once("../libs1/config-db.php");
include_once("../libs1/libUsers.php");
include_once("../libs1/libGeneral.php");
FechayHora();
$todoBien="N";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($id_cuenta) and $id_cuenta<>"")
{ include_once("../bots/find-cuenta1.php"); }

$filename="$cid_cliente-$id_cuenta-$dia$mes$ano.xls";
$todobien="S";
$header2="";
$data2="";

if($cid_cliente=="")
{
  echo "<center><br><br>error en los datos del Cliente<br><br></center>";
  $todobien="N";
  exit();
}

if($todobien=="S")
{
 header("Expires: Sat, 01 Jan 2022 00:00:00 GMT");
 header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
 header("Pragma: public");
 header("Expires: 0");
 header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
 header("Cache-Control: public");
 header("Content-Description: File Transfer");
 //session_cache_limiter("must-revalidate");
 header("Content-Type: application/vnd.ms-excel");
 header('Content-Disposition: attachment; filename="' . $filename .'"');
// include("../libs/dataBase/config-siadre.php");
 $select2="select * from excel1 where Cuenta='$id_cuenta'";
 $export2=mysqli_query($conex1,$select2);
 $fields2=mysqli_num_fields($export2);
 for ($i2 =0; $i2 < $fields2; $i2++)
 {
  $header2="\"Cuenta\" \"RIF\" \"Cliente\" \"Codigo\" \"Producto\" \"Cantidad\" \"Empaque\" \"Precio\" \"Total\" \"Fecha\"";
 }
 while($row2=mysqli_fetch_row($export2))
 {
  $line2='';
  foreach($row2 as $value2)
  {
   if ((!isset($value2)) OR ($value2 == "")) {
    $value2="\t";
  } else {
   $value2=str_replace('"', '""', $value2);
   $value2=str_replace(',', '.', $value2);
   $value2='"' . $value2 . '"' . "\t";
  }
  $line2 .= $value2;
 }
 $data2 .= trim($line2)."\n";
 }
 $data2=str_replace("\r","",$data2);
 print "$header2\n$data2";
 $todobien="S2";
 if(isset($export2))
 { mysqli_free_result($export2); }
}
?>
