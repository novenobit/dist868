<?php
//include("$dirRoot"."datafiles/categoria-find-nom.php");
if(isset($_GET['cod_nom']))
{ $cod_nom="$_GET[cod_nom]"; }
if(isset($_POST['cod_nom']))
{ $cod_nom="$_POST[cod_nom]"; }
$numFind=0;
$fileCat="$dirRoot"."datafiles/data/categoria.txt";
$fileOpenCat = fopen($fileCat, 'r');
if($fileOpenCat !== FALSE)
{
 while(($dataCat = fgetcsv($fileOpenCat, 100, '|')) !== FALSE)
 {
   if(isset($nom_cat) and $nom_cat<>"")
   {
     if($dataCat[2]==$nom_cat)
     {
       $id_cat=$dataCat[0];
       $cod_cat=$dataCat[1];
       $cod_categoria=$dataCat[1];
       $nom_categoria=$dataCat[2];
       $foto_categoria=$dataCat[3];
       $id_printer=$dataCat[4];
       $pedironline=$dataCat[5];
       $numFind++;
       return;
     }
   }
 } // end DoWhile
}
fclose($fileOpenCat);
?>
