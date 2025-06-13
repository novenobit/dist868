<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pcd.php                                                                 //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../libs1/loader.php");
include_once("../includes/headfileFrame.php");
//include_once("../includes/headfileFrame.php");
FechayHora();
$todoBien="N";

if(isset($_GET['op1']))
{ $op1=$_GET['op1']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(isset($_GET['op3']))
{ $op3=$_GET['op3']; }

if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if(!isset($cuentaData))
 { include_once("../bots/find-cuenta1.php"); }

 if(isset($op1) and $op1<>"")
 {
  if($op1=="S")
  {
   $update1="update cuentas1 set preparado='S' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
  else
  {
   $update1="update cuentas1 set preparado='N' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
 }
 if(isset($op2) and $op2<>"")
 {
  if($op2=="S")
  {
   $update1="update cuentas1 set chequeado='S' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
  else
  {
   $update1="update cuentas1 set chequeado='N' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
 }
 if(isset($op3) and $op3<>"")
 {
  if($op3=="S")
  {
   $update1="update cuentas1 set despachado='S' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
  else
  {
   $update1="update cuentas1 set despachado='N' where id_cuenta='$id_cuenta'";
   $result1=mysqli_query($conex1,$update1);
  }
 }
}
?>
<script>
window.parent.location = window.parent.location
</script>
<?php
echo "<html><meta http-equiv=refresh content=0;url=cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema>";
?>
