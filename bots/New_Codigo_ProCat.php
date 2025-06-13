<?php
//Function New_Codigo_ProCat()
//{ global $conex1, $cod_categoria, $categoriaData;
$numNCP=0;
$sqlNCP=mysqli_query($conex1, "select cod_categoria from categoria order by id_categoria desc limit 1");
$numNCP=mysqli_num_rows($sqlNCP);
if($numNCP>0)
{
 $Data=mysqli_fetch_array($sqlNCP);
 if($Data['cod_categoria']==0)
 { $cod_categoria=10; }
 else
 {  $cod_categoria=$Data['cod_categoria']+2; }
}
else
{  $cod_categoria=10; }
mysqli_free_result($sqlNCP);
// return $cod_categoria;
?>
