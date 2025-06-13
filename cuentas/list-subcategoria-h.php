<div class="ui one column doubling stackable grid container">
 <div class="column">
  <div class="ui segment"><b>Misma Categoria:</b>
   <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
     while($subCatData=mysqli_fetch_array($sqlSubCat))
     {
      $idSubCatT=$subCatData['id_subcategoria'];
      $codSubCatT=$subCatData['cod_subcategoria'];
      $nom_subcategoria=$subCatData['nom_subcategoria'];
      $fotoSubCat=$subCatData['foto_subcategoria'];
      if($fotoSubCat=="")
      { $fotoSubCat="sinfoto.png"; }
      $idBuscar=$codSubCat;
      // include("../libs1/getNumber.php");
      //if($numFilas>0)
      //{
       echo "<a href='$linkpage?id_cuenta=$id_cuenta&idCat=$idCat&codCat=$codCat&codSubCat=$codSubCat&sistema=$sistema'>$nom_subcategoria</a> / ";
      //}
      $Data="";
      $num++;
     }
     if(isset($sqlSubCat))
     { mysqli_free_result($sqlSubCat); }
   ?>
  </div>
 </div>
</div>
