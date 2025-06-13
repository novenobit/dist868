<?php
// include("../libs1/config-db.php");
// Function Select_ProCat()
// global $conex1, $cod_categoria, $nom_categoria;
echo "<select name='cod_categoria'>
 <option selected>seleccione</option>
 <option></option>";
 $sqlSPC=mysqli_query($conex1,"select cod_categoria,nom_categoria,foto_categoria from categoria");
 while($procat=mysqli_fetch_array($sqlSPC))
 {
   echo "<option value='{$procat['cod_categoria']}'>{$procat['nom_categoria']}</option>";
 }
echo "</select>";
mysqli_free_result($sqlSPC);
?>
