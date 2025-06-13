<?php
//Function New_Codigo_Productos2()
//{ global $conex1, $cod_producto, $cod_subcategoria;
$numFilas=0;
$sqlFNCP=mysqli_query($conex1, "select cod_producto, cod_subcategoria from productos where cod_producto='$cod_producto' and cod_subcategoria='$cod_subcategoria' order by cod_producto desc limit 1");
$numFilas=mysqli_num_rows($sqlFNCP);
if($numFilas>0)
{
  $Data=mysqli_fetch_array($sqlFNCP);
  if(!isset($Data['cod_producto']))
  {
   $cod_producto=$Data['cod_producto']+1;
  }
}
else
{
  $cod_producto="{$Data['cod_subcategoria']}"."100";
}
mysqli_free_result($sqlFPID);
return $cod_producto;
?>
