<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  count-recored.php                                                       //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
$numFields=0;
// echo "<br>select $fieldCount from $tableCount";
if(isset($fieldCount) and $fieldCount<>"" and isset($tableCount) and $tableCount<>"")
{
 $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount");
 $numFields=mysqli_num_rows($sqlCount);
}
?>
