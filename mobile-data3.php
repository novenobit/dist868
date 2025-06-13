<style>
.overflow {
  background: #fff;
  overflow-x: scroll;
  -webkit-overflow-scrolling: touch;
  width: 100%;
  overflow-y: hidden;
  white-space: nowrap;
  position: relative;
  display: block;
  margin: 0;
}

.overflow-item {
  display: inline-block;
  list-style: none;
  margin-right: 10px;
  max-width: 200px;
}

.overflow-item img{
  width: 100%;
}
</style>

<?php
//include("$dirRoot"."data/mobile-data2.php");
$num=0;
$tableBucar="subcategoria";
$campo1="id_subcategoria";
$campo2="cod_categoria";
if(!isset($linkpage) or $linkpage=="")
{ $linkpage="vercat1.php"; }
?>

<div class="overflow">

 <?php
  $sqlCat=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  while($catData=mysqli_fetch_array($sqlCat))
  {
    $idCat=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=substr($catData['nom_categoria'], 0, 12);
    $foto=$catData['foto_categoria'];
    $icono=$catData['icono'];
    if($foto=="")
    { $foto="sinfoto.png"; }
    $idBuscar=$codCat;
    include("./libs1/getNumber.php");
    echo "<div class='overflow-item' style='text-align:center;padding: 10px 10px 10px 10px;'>";
      if($numFilas>0)
      { echo "<a href='$linkpage?op=pl&codCat=$codCat'>"; }
        echo "<i class='big circular teal $icono icon'></i>";
       //  <p class='font-10'>$nom_categoria</p>";
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

<?php
$idCat="";
$codCat="";
?>
