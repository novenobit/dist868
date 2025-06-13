<?php
//include("$dirRoot"."datafiles/find-unidades.php");
$fileUnidad="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnidad, 'r');
if($fileOpenUnd !== FALSE)
{
 while(($dataUnd = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
 {
  if(isset($id_unidad) and $id_unidad<>"")
  {
    if($id_unidad==$dataUnd[0])
    {
      $nom_unidad=$dataUnd[1];
      $num_filas=1;
      fclose($fileOpenUnd);
      return $nom_unidad;
    }
  }
  if(isset($nom_unidad) and $nom_unidad<>"")
  {
    if($nom_unidad==$dataUnd[1])
    {
      $id_unidad=$dataUnd[0];
      $num_filas=1;
      fclose($fileOpenUnd);
      return $id_unidad;
    }
  }
 }
}
fclose($fileOpenUnd);
?>
