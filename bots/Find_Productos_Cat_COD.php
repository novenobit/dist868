<?php
//Function Find_Productos_Cat_COD()
// global $conex1, $cod_categoria, $proCatData;
$numCCOD=0;
$sqCCOD=mysqli_query($conex1, "select * from categoria where cod_categoria='$cod_categoria'");
$numCCOD=mysqli_num_rows($sqCCOD);
if($numCCOD>0)
{
  $proCatData=mysqli_fetch_array($sqCCOD);
  mysqli_free_result($sqCCOD);
  //return $proCatData;
}
?>
