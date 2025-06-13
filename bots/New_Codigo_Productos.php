<?php
//Function New_Codigo_productos()
//{ global $conex1, $cod_categoria, $cod_subcategoria, $cod_producto;
 $numFilas=0;
 // $sqlNCP=mysqli_query($conex1, "select cod_producto from productos where cod_categoria='$cod_categoria' and  cod_subcategoria='$cod_subcategoria' order by id_producto desc limit 1");
$sqlNCP=mysqli_query($conex1, "select cod_producto from productos where cod_categoria='$cod_categoria' order by id_producto desc limit 1");
 $numFilas=mysqli_num_rows($sqlNCP);
 if($numFilas>0)
 {
  $data=mysqli_fetch_array($sqlNCP);
  $cod_producto=$data['cod_producto'];
  $cod_producto=$cod_producto+1;
  if($cod_producto==1)
  {
   $cod_producto="$cod_subcategoria$cod_categoria"."0".+2;
  }
  //---
  $sqlNCP2=mysqli_query($conex1,"select cod_producto from productos where cod_producto='$cod_producto'");
  $numNCP1=mysqli_num_rows($sqlNCP2);
  if($numNCP1>0)
  { $cod_producto=$cod_producto+2;
  //---
   $sqlNCP3=mysqli_query($conex1,"select cod_producto from productos where cod_producto='$cod_producto'");
   $numNCP3=mysqli_num_rows($sqlNCP3);
   if($numNCP3>0)
   { $cod_producto=$cod_producto+10;
  //---
    $sqlNCP4=mysqli_query($conex1,"select cod_producto from productos where cod_producto='$cod_producto'");
    $numNCP4=mysqli_num_rows($sqlNCP4);
    if($numNCP4>0)
    { $cod_producto=$cod_producto+10; }
   }
  }
  if(isset($sqlNCP))
  { mysqli_free_result($sqlNCP); }
  if(isset($sqlNCP2))
  { mysqli_free_result($sqlNCP2); }
  if(isset($sqlNCP3))
  { mysqli_free_result($sqlNCP3); }
  if(isset($sqlNCP4))
  { mysqli_free_result($sqlNCP4); }
  //return $cod_producto;
 }
?>

