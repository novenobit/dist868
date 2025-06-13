<?php
//include("$dirRoot"."datafiles/select-unidades-nom.php");
$fileUnd="$dirRoot"."datafiles/data/nivelprecios.txt";
$fileOpenUnd = fopen($fileUnd, 'r');
if($fileOpenUnd !== FALSE)
{
 echo "<select class='ui fluid dropdown' name='nivelprecio'>";
  if(isset($nivelprecio) and $nivelprecio<>"")
  {
    echo "<option selected>$nivelprecio</option>";
  }
  else
  {
    //echo "<option selected>Nivel Precio</option>";
  }
  while(($dataNivel = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
  {
     $id_nivel=$dataNivel[0];
     $nom_nivel=$dataNivel[1];
     echo "<option value='$id_nivel'>$nom_nivel</option>";
  }
 echo "</select>";
}
fclose($fileOpenUnd);
?>

