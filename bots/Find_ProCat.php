<?php
//Function Find_ProCat()
//{ global $conex1, $id_categoria, $proCatData;
if(isset($id_categoria) and $id_categoria<>"")
{
 $sqlFPC=mysqli_query($conex1,"select * from categoria where id_categoria='$id_categoria'");
 $proCatData=mysqli_fetch_array($sqlFPC);
 mysqli_free_result($sqlFPC);
 // return $proCatData;
}
if(isset($cod_categoria) and $cod_categoria<>"")
{
 $sqlFPC=mysqli_query($conex1,"select * from categoria where cod_categoria='$cod_categoria'");
 $proCatData=mysqli_fetch_array($sqlFPC);
 mysqli_free_result($sqlFPC);
}
if(isset($codCat) and $codCat<>"")
{
 $sqlFPC=mysqli_query($conex1,"select * from categoria where cod_categoria='$codCata'");
 $proCatData=mysqli_fetch_array($sqlFPC);
 mysqli_free_result($sqlFPC);
}
?>
