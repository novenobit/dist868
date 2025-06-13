<?php
//Function Find_ProCat_Cod()
//{ global $conex1, $cod_categoria, $proCatData;
 $sqlPCC=mysqli_query($conex1,"select * from categoria where cod_categoria='$cod_categoria'");
 $proCatData=mysqli_fetch_array($sqlPCC);
 mysqli_free_result($sqlPCC);
// return $proCatData;
?>
