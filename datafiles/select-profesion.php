<?php
//include("$dirRoot"."datafiles/select-profesion.php");
$fileProf="$dirRoot"."datafiles/data/profesion.txt";
$fileOpenProf = fopen($fileProf, 'r');
if($fileOpenProf !== FALSE)
{
 echo "<select class='select' name='idprof'>
  <option selected>seleccione</option>";
   while(($dataProf = fgetcsv($fileOpenProf, 100, '|')) !== FALSE)
   {
     $idprof=$dataProf[0];
     $profesion=$dataProf[1];
     echo "<option value='$idprof'>$profesion</option>";
  }
 echo "</select>";
}
fclose($fileOpenProf);
?>
