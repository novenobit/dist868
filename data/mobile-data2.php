<?php
//include("$dirRoot"."data/mobile-data2.php");
$num=0;
$tableBucar="subcategoria";
$campo1="id_subcategoria";
$campo2="cod_categoria";
if(!isset($linkpage) or $linkpage=="")
{ $linkpage="vercat1.php"; }
?>

<div class="ui hidden divider"></div>
<h3 class="ui center aligned blue header">Productos x Categoria</h3>
<div class="center aligned ui three column grid container">
 <?php
  $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  while($catData=mysqli_fetch_array($sqlCat))
  {
    $idCat=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $foto=$catData['foto_categoria'];
    $icono=$catData['icono'];
    if($foto=="")
    { $foto="sinfoto.png"; }
    $idBuscar=$codCat;
    include("./libs/getNumber.php");
    echo "<div class='column'>";
      if($numFilas>0)
      { echo "<a href='$linkpage?op=pl'>"; }
        echo "<i class='big circular inverted teal $icono icon'></i>
         <p class='font-10'>$nom_categoria</p>";
      if($numFilas>0)
      { echo "</a>"; }
    echo "</div>";
    $Data="";
    $num++;
  }
  if(isset($sqlCat))
  { mysqli_free_result($sqlCat); }
 ?>
</div>
<div class="ui hidden divider"></div>
<?php
$idCat="";
$codCat="";
?>
