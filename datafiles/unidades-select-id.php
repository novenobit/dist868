<?php
//include("$dirRoot"."datafiles/select-unidades-id.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'r');
if($fileOpenUnd !== FALSE)
{
 echo "<select class='ui input' name='id_unidad'>
  <option selected>Unidad / Medida</option>
  <option></option>";
   while(($dataUnidad = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
   {
     $id_unidad=$dataUnidad[0];
     $nom_unidad=$dataUnidad[1];
     echo "<option value='$id_unidad'>$nom_unidad</option>";
  }
 echo "</select>";
}
fclose($fileOpenUnd);
?>
