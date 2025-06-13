<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  count-recored.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
$numFields=0;
// echo "<br>select $fieldCount from $tableCount";
if(isset($fieldCount) and $fieldCount<>"" and isset($tableCount) and $tableCount<>"")
{
 if($fieldCount=="activo" and $tableCount=="productos")
 {
   $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount where activo='S'");
   $numProductosActivos=mysqli_num_rows($sqlCount);
   $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount where activo='N'");
   $numProductosDesActivos=mysqli_num_rows($sqlCount);
 }
 else
 {
  $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount");
  $numFields=mysqli_num_rows($sqlCount);
 }
}

