<?php
//include("$dirRoot"."datafiles/unidades-auto.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'r');
if($fileOpenUnd !== FALSE)
{
   while(($dataUnidad = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
   {
     $id_unidad=$dataUnidad[0];
     $nom_unidad=$dataUnidad[1];
     //if($nom_unidad='%".$_REQUEST['term']."%')
     //$resultsAP[] = array('label' => $dataUnidad[1]);
  }
}
fclose($fileOpenUnd);
echo json_encode($resultsAP);
?>
