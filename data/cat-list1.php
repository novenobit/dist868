<div class="ui container center aligned">
 <?php
  $num=0;
  $tableBucar="subcategoria";
  $campo1="id_subcategoria";
  $campo2="cod_categoria";
  if(!isset($linkpage) or $linkpage=="")
  { $linkpage="vercat1.php"; }
  $sqlCat2=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria from categoria order by nom_categoria");
  while($catData2=mysqli_fetch_array($sqlCat2))
  {
    $idCat2=$catData2['id_categoria'];
    $codCat2=$catData2['cod_categoria'];
    $nom_categoria2=$catData2['nom_categoria'];
    $idBuscar=$codCat2;
    include("./libs1/getNumber.php");
    if($num>=1)
    { echo " - "; }
    if($numFilas>0)
    { echo "<a class='section' href='vercat1.php?op=pl&id=$idCat2&codCat=$codCat2'>"; }
    else
    { echo "<a class='section' href='#'>"; }
    echo "$nom_categoria2</a>  ";
    $num++;
  }
  if(isset($sqlCat2))
  { mysqli_free_result($sqlCat2); }
 ?>
</div>
<div class="ui divider"></div>
