<?php
//Function New_Codigo_ProSubCat()
//{ global $conex1, $cod_categoria, $cod_subcategoria;
 $numNCP=0;
 $sqlNCP=mysqli_query($conex1, "select cod_subcategoria from subcategoria where cod_categoria='$cod_categoria' order by id_subcategoria desc limit 1");
 $numNCP=mysqli_num_rows($sqlNCP);
 if($numNCP>0)
 {
  $Data=mysqli_fetch_array($sqlNCP);
  if($Data['cod_subcategoria']==0)
  { $cod_subcategoria=2; }
  else
  {  $cod_subcategoria=$Data['cod_subcategoria']+2; }
 }
 else
 { $cod_subcategoria=10; }
 //return $cod_subcategoria;
 mysqli_free_result($sqlNCP); 
?>
