<?php
//Function Find_ProSubCat_Cod()
if(isset($id_subcategoria) and $id_subcategoria<>"")
{
 $sqlFPSC=mysqli_query($conex1,"select * from subcategoria where id_subcategoria='$id_subcategoria'");
 $subCatData=mysqli_fetch_array($sqlFPSC);
 mysqli_free_result($sqlFPSC);
 // return $subCatData;
}
if(isset($cod_subcategoria) and $cod_subcategoria<>"")
{
 $sqlFPSC=mysqli_query($conex1,"select * from subcategoria where cod_subcategoria='$cod_subcategoria'");
 $subCatData=mysqli_fetch_array($sqlFPSC);
 mysqli_free_result($sqlFPSC);
}
if(isset($codSubCat) and $codSubCat<>"")
{
 $sqlFPSC=mysqli_query($conex1,"select * from subcategoria where cod_subcategoria='$codSubCata'");
 $subCatData=mysqli_fetch_array($sqlFPSC);
 mysqli_free_result($sqlFPSC);
}
?>
