<?php
//include("$dirRoot"."datafiles/select-pais.php");
$filePais="$dirRoot"."datafiles/data/pais.txt";
$fileOpenPais = fopen($filePais, 'r');
if($fileOpenPais !== FALSE)
{
 echo "<select class='select' name='id_pais'>
  <option selected>seleccione</option>";
   while(($dataPais = fgetcsv($fileOpenPais, 100, '|')) !== FALSE)
   {
     $id_pais=$dataPais[1];
     $pais=$dataPais[2];
     echo "<option value='$id_pais'>$pais</option>";
  }
 echo "</select>";
}
fclose($fileOpenPais);
?>
