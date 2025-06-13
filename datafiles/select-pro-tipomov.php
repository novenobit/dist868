<?php
//include("$dirRoot"."datafiles/select-pro-tipomov.php");
$fileProTM="$dirRoot"."datafiles/data/productos_tipomov.txt";
$fileOpenProTM = fopen($fileProTM, 'r');
if($fileOpenProTM !== FALSE)
{
 echo "<select class='select' name='tipo_mov'>
  <option selected>seleccione</option>";
   while(($dataProTM = fgetcsv($fileOpenProTM, 100, '|')) !== FALSE)
   {
     $id_tmov=$dataProTM[0];
     $nom_mov=$dataProTM[1];
     $movimiento=$dataProTM[2];
     $tipo_mov=$dataProTM[3];
     echo "<option value='$tipo_mov'>$nom_mov</option>";
  }
 echo "</select>";
}
fclose($fileOpenProTM);
?>
