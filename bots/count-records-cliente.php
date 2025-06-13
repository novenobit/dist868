<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  /count-records-cliente.php                                              //
// ***************************************************************************
$numCtaDeCliente=0;
// echo "<br>select $fieldCount from $tableCount";
if(isset($id_cuenta) and $id_cuenta<>"")
{
 $sqlCount=mysqli_query($conex1, "select id_cuenta from cuentas1 where id_cuenta='$id_cuenta'");
 $numCtaDeCliente=mysqli_num_rows($sqlCount);
}
?>
