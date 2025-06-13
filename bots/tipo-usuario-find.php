<?php
//include("$dirRoot"."bots/tipo-usuario-find.php");
if(isset($Mid_tipoemp))
{ $id_tipoemp=$Mid_tipoemp; }
if(isset($id_tipoemp) and $id_tipoemp<>"")
{
 $sqlTU="select tipo_empleado,nivel_empleado from tipodeempleados where id_tipoemp='$id_tipoemp'";
 $resultTU=mysqli_query($conex1,$sqlTU);
 $tipoEmp=mysqli_fetch_array($resultTU);
 if(isset($tipoEmp))
 {
  $tipo_empleado=$tipoEmp['tipo_empleado'];
  $nivel_empleado=$tipoEmp['nivel_empleado'];
 }
}
?>
