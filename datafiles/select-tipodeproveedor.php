<?php
//include("$dirRoot"."datafiles/select-tipodeproveedor.php");
$fileTipoProv="$dirRoot"."datafiles/data/tipodeproveedor.txt";
$fileOpenTipoProv = fopen($fileTipoProv, 'r');
if($fileOpenTipoProv !== FALSE)
{
 echo "<select class='select' name='cod_tipoprov'>
  <option selected>seleccione</option>";
   while(($dataTipoProv = fgetcsv($fileOpenTipoProv, 100, '|')) !== FALSE)
   {
     $id_tipoprov=$dataTipoProv[0];
     $cod_tipoprov=$dataTipoProv[1];
     $tipo_proveedor=$dataTipoProv[2];
     echo "<option value='$cod_tipoprov'>$tipo_proveedor</option>";
  }
 echo "</select>";
}
fclose($fileOpenTipoProv);
?>
