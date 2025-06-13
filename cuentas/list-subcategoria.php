<div class='ui blue message'>
  <h3 class='title is-3'><?php echo "$nom_categoria"; ?></h3>
</div>

<div class='ui grid'>
 <div class='sixteen wide column'>
   <a class='ui fluid blue button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a>
 </div>
</div>

<div class="ui grid padded">

   <?php
     $num=0;
     $tableBucar="productos";
     $campo1="id_producto";
     $campo2="cod_subcategoria";
     //$linkpage="agregar-cesta3.php";
     $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
     while($subCatData=mysqli_fetch_array($sqlSubCat))
     {
      $idSubCat=$subCatData['id_subcategoria'];
      $codSubCat=$subCatData['cod_subcategoria'];
      $nom_subcategoria=$subCatData['nom_subcategoria'];
      $fotoSubCat=$subCatData['foto_subcategoria'];
      if($fotoSubCat=="")
      { $fotoSubCat="sinfoto.png"; }
      $idBuscar=$codSubCat;
      include("../libs1/getNumber.php");
      echo "<div class='eight wide column padded'>";
       if($numFilas>0)
       { echo "<a href='$linkpage?op=pl&id_cuenta=$id_cuenta&id=$idCat&codCat=$codCat&codSubCat=$codSubCat&nivelprecio=$nivelprecio&sistema=$sistema'>"; }
         echo "<div class='ui card center aligned'>
          <div class='image center aligned' style='background-color:#fff;'>
            <img class='ui small rounded centered image' src='../imagenes/menu/$fotoSubCat' style='width:100px' alt='$nom_subcategoria'>
          </div>
          <div class='content center aligned'>
            $nom_subcategoria <span class='ui small red text'>($numFilas)</span>
          </div>
         </div>";
        // <span class='tag is-light'>($codSubCat)</span>
       if($numFilas>0)
       { echo "</a>"; }
      echo "</div>";
      $Data="";
      $num++;
     }
     if(isset($sqlSubCat))
     { mysqli_free_result($sqlSubCat); }
    ?>
</div>
<?php
$idCat="";
$codCat="";
?>
<div class="ui grid">
 <div class="sixteen wide column padded">
   <p><a class='ui fluid blue button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>
 </div>
</div>
<br><br>
