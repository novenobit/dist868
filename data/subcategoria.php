<?php
//include("$dirRoot"."data/subcategoria.php");
?>
<h2><i class="product hunt icon"></i> MismaCategoria</h2>
<div class="ui horizontal center aligned divided list">
<?php
echo "select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria";
 if(!isset($textColor))
 { $textColor="blueTextBold"; }
 //echo "<a class='item' href='index.php'><span class='$textColor'><b>Inicio</b></span></a>";
 $tableBucar="productos";
 $campo1="id_producto";
 $campo2="cod_subcategoria";
 if(!isset($linkpage) or $linkpage=="")
 { $linkpage="vercat1.php"; }
 echo "<a class='item' href='index.php'><span class='$textColor'><i class='home icon'></i> Inicio</span></a>";
 $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
 while($subCatData=mysqli_fetch_array($sqlSubCat))
 {
  $idSubCat=$subCatData['id_subcategoria'];
  $codSubCat2=$subCatData['cod_subcategoria'];
  $nom_subcategoria=$subCatData['nom_subcategoria'];
  $fotoSubCat=$subCatData['foto_subcategoria'];
  if($fotoSubCat=="")
  { $fotoSubCat="sinfoto.png"; }
  $idBuscar=$codSubCat2;
  include("./libs1/getNumber.php");
  if(!isset($idCat))
  { $idCat=""; }
  echo "<div class='item'>";
   if($numFilas>0)
   { echo "<a class='item' href='vercat-foto3.php?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
   else
   { echo "<a class='item' href='#'>"; }
    echo "<span class='$textColor'>$nom_subcategoria</span></a>
    <span class='font-yellow'>$numFilas</span>
  </div>";
  $Data="";
 }
 if(isset($sqlSubCat))
 { mysqli_free_result($sqlSubCat); }
?>
<a class='item' href='javascript:history.back(1)'><span class='<?php echo $textColor;?>'><i class="left arrow icon"></i> Regresa</span></a>
</div>
