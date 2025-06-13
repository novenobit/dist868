<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  count-recored.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
$numFields=0;
if(!isset($op2))
{ $op2=""; }
if(isset($fieldCount) and $fieldCount<>"" and isset($tableCount) and $tableCount<>"")
{
 if($op2=="scb")
 {
  $sqldata="select id_producto from productos where codigo_barra='' and codigo_barra NOT REGEXP '[0-9]+'";
  $sqlCount=mysqli_query($conex1, $sqldata);
  $numFields=mysqli_num_rows($sqlCount);
  $op2="";
 }
 else
 {
  $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount where $fieldFind=''");
  $numFields=mysqli_num_rows($sqlCount);
 }
}
?>
