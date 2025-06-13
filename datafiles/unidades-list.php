<?php
//include("$dirRoot"."datafiles/unidades-list.php");
$fileUnd="$dirRoot"."datafiles/data/unidades.txt";
$fileOpenUnd = fopen($fileUnd, 'r');
if($fileOpenUnd !== FALSE)
{
  echo "<table class='ui celled table'>";
   while(($dataUnidad = fgetcsv($fileOpenUnd, 100, '|')) !== FALSE)
   {
     $id_unidad=$dataUnidad[0];
     $nom_unidad=$dataUnidad[1];
     echo "<tr>
      <td class='center aligned'>$id_unidad</td>
      <td>";
       if(!isset($linkFile) or $linkFile=="")
       { echo "$nom_unidad"; }
       else
       { echo "<a href='$linkFile?op=em&id=$id_unidad&nom_unidad=$nom_unidad'>$nom_unidad</a>"; }
      echo "</td>
     </tr>\n";
  }
 echo "</table>";
}
fclose($fileOpenUnd);
?>
