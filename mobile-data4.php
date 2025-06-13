<?php
//include("$dirRoot"."data/mobile-data.php");
$num=0;
$tableBucar="subcategoria";
$campo1="id_subcategoria";
$campo2="cod_categoria";
if(!isset($linkpage) or $linkpage=="")
{ $linkpage="vercat1.php"; }
?>

<style>
.scrolling-wrapper {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
}
.scrolling-wrapper .card {
  display: inline-block;
}

.scrolling-wrapper-flexbox {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
}
.scrolling-wrapper-flexbox .card {
  flex: 0 0 auto;
  margin-right: 3px;
}

.scrolling-wrapper, .scrolling-wrapper-flexbox {
  /*height: 80px; */
  margin-bottom: 20px;
  width: 100%;
  -webkit-overflow-scrolling: touch;
}
.scrolling-wrapper::-webkit-scrollbar, .scrolling-wrapper-flexbox::-webkit-scrollbar {
  display: none;
}

.card3 {
  width: 2000px;
  height: 200px;
  padding: 1rem .5rem;
}
</style>

<div class="ui hidden divider"></div>
<h3 class="ui center aligned blue header">Productos x Categoria</h3>

  <div class="scrolling-wrapper-flexbox">

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
    echo "<div class='card3'>";
      if($numFilas>0)
      { echo "<a href='$linkpage?op=pl&id=$idCat&codCat=$codCat'>"; }
        echo "<div class='ui raised fluid card hoverBox'>
         <div class='image'>
          <img class='ui image' src='./imagenes/menu/$foto' alt='$nom_categoria'>
        </div>
        <div class='content'>
          <span class='font-10'>$nom_categoria</span>
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
