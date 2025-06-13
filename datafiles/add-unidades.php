<?php
//include("$dirRoot"."datafiles/add-unidades.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'a+')  or die("can't open file -> $fileUnd");
if($fileOpenUnd !== FALSE)
{
 if(isset($nom_unidad) and $nom_unidad<>"")
 {
  $dataUnidad=array_values(array_filter(explode('|', end(file($fileUnd)))));
  $id_unidad=$dataUnidad[0]+1;
  $stringData="$id_unidad|$nom_unidad\r\n";
  fwrite($fileOpenUnd, $stringData);
 }
}fclose($fileOpenUnd);
?>
