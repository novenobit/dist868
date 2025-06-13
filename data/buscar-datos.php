<?php
//include("$dirRoot"."data/buscar-datos.php");
// ************************************************************************
// breadcrumbs.php
// Buscr SubCat
$num=0;
$tableBucar="subcategoria";
$campo1="id_subcategoria";
$campo2="cod_categoria";
if(!isset($linkpage) or $linkpage=="")
{ $linkpage="vercat1.php"; }
?>

<div class="ui computer only grid container">
 <div class="column">
  <div class="ui horizontal divider">
     <h3 class="ui center aligned blue header"><i class="product hunt icon"></i>  Productos x Categoria</h3>
  </div>
 </div>
</div>
<div class="ui mobile only grid container center aligned">
 <div class="column">
  <h3 class="ui center aligned blue header">Productos x Categoria</h3>
  <div class="ui hidden divider"></div>
 </div>
</div>

<div class="ui doubling grid container">
 <?php
  $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  while($catData=mysqli_fetch_array($sqlCat))
  {
    $idCat=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $foto=$catData['foto_categoria'];
    if($foto=="")
    { $foto="sinfoto.png"; }
    $idBuscar=$codCat;
    include("./libs1/getNumber.php");
    echo "<div class='eight wide tablet four wide computer column'>";
      if($numFilas>0)
      { echo "<a href='$linkpage?op=pl&id=$idCat&codCat=$codCat'>"; }
        echo "<div class='ui raised fluid card hoverBox'>
        <div class='image'>
          <img class='image' src='./imagenes/menu/$foto'  alt='$nom_categoria'>
        </div>
        <div class='content'>
          $nom_categoria
        </div>
        </div>";
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
