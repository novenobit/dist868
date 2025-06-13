<div class="ui container raised segment ">
 <div class="ui sizer vertical segment">
  <div class="ui large dividing header">Otra Categoria</div>
 </div>
 <div class="ui horizontal center aligned divided list">
  <a class='item' href='index.php'><b>Inicio</b></a>
  <?php
   $tableBucar="subcategoria";
   $campo1="cod_categoria";
   $campo2="cod_subcategoria";
   $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
   while($catData=mysqli_fetch_array($sqlCat))
   {
      $idCat=$catData['id_categoria'];
      $codCat=$catData['cod_categoria'];
      $nom_categoria=$catData['nom_categoria'];
      $fotoCat=$catData['foto_categoria'];
      if($fotoCat=="")
      { $fotoCat="sinfoto.png"; }
      echo "<a class='item' href='vercat1.php?op=pl&id=$idCat&codCat=$codCat'><span class='blackText'>$nom_categoria</span></a>";
   }
   if(isset($sqlCat))
   { mysqli_free_result($sqlCat); }
  ?>
 </div>
</div>
