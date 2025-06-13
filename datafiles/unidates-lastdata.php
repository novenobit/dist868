<?php
//include("$dirRoot"."datafiles/unidades-lastadata.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'a+')  or die("can't open file -> $fileUnd");
if($fileOpenUnd !== FALSE)
{
 $dataUnidad=array_values(array_filter(explode('|', end(file($file)))));
 $id_unidad=$dataUnidad[0]+1;
}
fclose($fileOpenUnd);
?>
