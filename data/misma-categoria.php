<?php
//include("$dirRoot"."data/misma-categoria.php");

if(isset($cod_categoria) and $cod_categoria<>"")
{
?>
 <div class="ui container raised segment ">
  <div class="ui sizer vertical segment">
    <div class="ui large dividing header">Misma Categoria</div>
  </div>
  <div class="ui horizontal center aligned divided list">
    <a class='item' href='index.php'>Inicio</a>
    <?php
     $tableBucar="productos";
     $campo1="id_producto";
     $campo2="cod_subcategoria";
     $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$cod_categoria' order by nom_subcategoria");
     while($subCatData=mysqli_fetch_array($sqlSubCat))
     {
      $idSubCat=$subCatData['id_subcategoria'];
      $codCat=$subCatData['cod_categoria'];
      $codSubCat2=$subCatData['cod_subcategoria'];
      $nom_subcategoria=$subCatData['nom_subcategoria'];
      $fotoSubCat=$subCatData['foto_subcategoria'];
      if($fotoSubCat=="")
      { $fotoSubCat="sinfoto.png"; }
      $idBuscar=$codSubCat2;
      include("./libs1/getNumber.php");
      if($numFilas>0)
      { echo "<a class='item' href='vercat-foto2.php?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
      else
      { echo "<a class='item' href='#'>"; }
         echo "<span class='blackText'>$nom_subcategoria</span>";
         //<span class='tag is-light'>($codSubCat)</span>
      echo "</a>";
      $Data="";
     }
     if(isset($sqlSubCat))
     { mysqli_free_result($sqlSubCat); }
   ?>
  </div>
 </div>
<?php
}
?>
