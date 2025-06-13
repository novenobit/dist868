<?php
//include("$dirRoot"."datafiles/select-unidades-nom.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'r');
if($fileOpenUnd !== FALSE)
{
 echo "<select class='ui input' name='nom_unidad'>";
  if(isset($nom_unidad) and $nom_unidad<>"")
  {
    echo "<option selected>$nom_unidad</option>";
  }
  else
  {
    echo "<option selected>Unidad / Medida</option>";
  }
  while(($dataUnidad = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
  {
     $id_unidad=$dataUnidad[0];
     $nom_unidad=$dataUnidad[1];
     echo "<option value='$nom_unidad'>$nom_unidad</option>";
  }
 echo "</select>";
}
fclose($fileOpenUnd);
?>

