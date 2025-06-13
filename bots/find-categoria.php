<?php
// include("find-categoria.php")

if(isset($codCat) and $codCat<>"")
{
  $sqlCat=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,foto_categoria from categoria where cod_categoria='$codCat'");
  $catData=mysqli_fetch_array($sqlCat);
  if(isset($catData))
  {
    $idCat=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $fotoCat=$catData['foto_categoria'];
    if($fotoCat=="")
    { $fotoCat="sinfoto.png"; }
  }
  if(isset($sqlCat))
  { mysqli_free_result($sqlCat); }
}
?>
