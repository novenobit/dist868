<div class="ui attached message">
  <div class="header">
    Menu de Categorias
  </div>
</div>
<?php
//Buscr SubCat
$num=0;
$tableBucar="subcategoria";
$campo1="id_subcategoria";
$campo2="cod_categoria";
if(!isset($linkpage) or $linkpage=="")
{ $linkpage="agrega-cest2.php"; }
// include("menu-categoria.php");
?>

<div class="ui two column compact internally grid">
 <div class="row">
  <?php
    $num=1;
    $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
    while($catData=mysqli_fetch_array($sqlCat))
    {
      $idCat=$catData['id_categoria'];
      $codCat=$catData['cod_categoria'];
      $nom_categoria=$catData['nom_categoria'];
      $fotoCat=$catData['foto_categoria'];
      $icono=$catData['icono'];
      if($fotoCat=="")
      { $fotoCat="sinfoto.png"; }
      $idBuscar=$codCat;
      include("../libs1/getNumber.php");
      echo "<div class='column'>";
        if($numFilas>0)
        { echo "<a href='agrega-cesta2.php?id_cuenta=$id_cuenta&idCat=$idCat&codCat=$codCat&nivelprecio=$nivelprecio&sistema=$sistema'>"; }
          echo "<button class='fluid ui blue button' style='border-radius:12px;'>$nom_categoria</button>";
        if($numFilas>0)
        { echo "</a>"; }
      echo "</div>";
      $Data="";
      $num++;
      if($num>=3)
      { $num=1;
        echo "</div><div class='row'>";
      }
    }
    if(isset($sqlCat))
    { mysqli_free_result($sqlCat); }
    if($num<=2)
    { echo "</div>"; }
  ?>
 </div>
</div>
<?php
$idCat="";
$codCat="";
?>
