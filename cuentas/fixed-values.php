<?php
$dirRoot="../";
$subdir="../";
include_once("../includes/headfileFrame.php");
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
userid();
$todoBien="N";
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['idCat']))
{ $idCat=$_GET['idCat']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_GET['codSubCat']))
{ $codSubCat=$_GET['codSubCat']; }
if(isset($_GET['codPro']))
{ $codPro=$_GET['codPro']; }
$tableUse="cuentas1";
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
?>
