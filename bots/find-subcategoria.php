<?php
// include("find-categoria.php")

if(isset($codSubCat) and $codSubCat<>"")
{
 // echo "select cod_categoria,nom_subcategoria,foto_subcategoria from subcategoria where cod_subcategoria='$codSubCat'";
 $sqlSubCat=mysqli_query($conex1,"select cod_categoria,nom_subcategoria,foto_subcategoria from subcategoria where cod_subcategoria='$codSubCat'");
 $subCatData=mysqli_fetch_array($sqlSubCat);
 if(isset($subCatData))
 {
   $codCat=$subCatData['cod_categoria'];
   $nomSubCat=$subCatData['nom_subcategoria'];
   $nom_subcategoria=$subCatData['nom_subcategoria'];
   $foto_subcategoria=$subCatData['foto_subcategoria'];
   if($foto_subcategoria=="")
   { $foto_subcategoria="sinfoto.png"; }
 }
 if(isset($sqlSubCat))
 { mysqli_free_result($sqlSubCat); }
}
?>
