<?php
//include("$dirRoot"."data/categoria.php");
?>
<h2><i class="product hunt icon"></i> Otra Categoria</h2>
<?php
if($mobile=="S")
{
 $textAlign="center";
}
else
{
 $textAlign="left";
}
?>

<div class="ui horizontal center aligned divided list" style="text-align:<?php echo $textAlign; ?>">
 <?php
  if(!isset($textColor))
  { $textColor="blueTextBold"; }
  echo "<a class='item' href='index.php'><span class='$textColor'><b>Inicio</b></span></a>";
  $tableBucar="subcategoria";
  $campo1="cod_categoria";
  $campo2="cod_subcategoria";
  $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  while($catData=mysqli_fetch_array($sqlCat))
  {
    $idCat=$catData['id_categoria'];
    $codCatT=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $fotoCat=$catData['foto_categoria'];
    if($fotoCat=="")
    { $fotoCat="sinfoto.png"; }
    if(isset($codCat) and $codCat<>"" and $codCatT==$codCat)
    {  echo "<a class='item' href='vercat1.php?op=pl&id=$idCat&codCat=$codCatT'><span class='font-red'>$nom_categoria</span></a>"; }
    else
    { echo "<a class='item' href='vercat1.php?op=pl&id=$idCat&codCat=$codCatT'><span class='$textColor'>$nom_categoria</span></a>"; }
  }
  if(isset($sqlCat))
  { mysqli_free_result($sqlCat); }
 ?>
</div>
