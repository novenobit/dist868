<?php
//include("$dirRoot"."datafiles/tipodeproveedor-find.php");
$fileTipoProv="$dirRoot"."datafiles/data/tipodeproveedor.txt";
$fileOpenTipoProv = fopen($fileTipoProv, 'r');
if($fileOpenTipoProv !== FALSE)
{
 while(($dataIipoProv = fgetcsv($fileOpenTipoProv, 100, '|')) !== FALSE)
 {
  if($id_tipoprov==$dataIipoProv[0])
  {
    $cod_tipoprov=$dataIipoProv[1];
    $tipo_proveedor=$dataIipoProv[2];
    fclose($fileOpenTipoProv);
    return;
  }
 }
}
fclose($fileOpenTipoProv);
?>
