<div class="ui secondary vertical menu">
 <a class="active item">Sub-Categorias</a>
 <a class='item' href='index.php'><b>Inicio</b></a>
 <?php
     $sqlSubCat1=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
     while($subCatData1=mysqli_fetch_array($sqlSubCat1))
     {
      $idCat=$subCatData1['id_subcategoria'];
      $codCat=$subCatData1['cod_subcategoria'];
      $nom_subcategoria=$subCatData1['nom_subcategoria'];
      $fotoCat=$subCatData1['foto_subcategoria'];
      if($fotoCat=="")
      { $fotoCat="sinfoto.png"; }
      echo "<a class='item' href='vercat1.php?op=pl&id=$idCat&codCat=$codCat'><span class='blackText'>$nom_subcategoria</span></a>";
     }
     if(isset($sqlSubCat1))
     { mysqli_free_result($sqlSubCat1); }
 ?>
</div>
