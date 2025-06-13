<?php
//include("$dirRoot"."datafiles/find-nivel-precios.php");
$fileNP="$dirRoot"."datafiles/data/nivelprecios.txt";
$fileOpenNP=fopen($fileNP,'r');
if($fileOpenNP !== FALSE)
{
  while(($dataNivel = fgetcsv($fileOpenNP, 100, '|')) !== FALSE)
  {
    if($nivelprecio==$dataNivel[0])
    {
     $id_nivel=$dataNivel[0];
     $nom_nivel=$dataNivel[1];
     fclose($fileOpenNP);
     return;
    }
  }
}
fclose($fileOpenNP);
?>
