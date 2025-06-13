<?php
//include("$dirRoot"."datafiles/categoria-find-cat.php");
$numFind=0;
$fileCat="$dirRoot"."datafiles/data/categoria.txt";
$fileOpenCat = fopen($fileCat, 'r');
if($fileOpenCat !== FALSE)
{
 while(($dataCat = fgetcsv($fileOpenCat, 100, '|')) !== FALSE)
 {
   if(isset($id_cat) and $id_cat<>"")
   {
     if($dataCat[0]==$id_cat)
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
   if(isset($cod_cat) and $cod_cat<>"")
   {
     if($dataCat[1]==$cod_cat)
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
   if(isset($cod_categoria) and $cod_categoria<>"")
   {
     if($dataCat[1]==$cod_categoria)
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
   if(isset($nom_categoria) and $nom_categoria<>"")
   {
     if($dataCat[2]==$nom_categoria)
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
