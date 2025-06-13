<div class="ui hidden divider"></div>
<div class="ui centered computer only grid container">
 <?php
  $sqlCat1=mysqli_query($conex1,"select * from categoria order by id_categoria");
  while($catData=mysqli_fetch_array($sqlCat1))
  {
    $id_categoria=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $icono=$catData['icono'];
//----------------------------------
?>
    <div class="ui column container">
     <h2><span class='font-sanMarino'><?php echo "<i class='$icono icon'></i> ".$nom_categoria; ?></span></h2>
     <div class="ui breadcrumb">
<?php
        $tableBucar="subcategoria";
        $campo1="id_subcategoria";
        $campo2="cod_categoria";
        $linkpage="vercat1.php";
        $num=0;
        $sqlSubCat2=mysqli_query($conex1,"select id_subcategoria,cod_subcategoria,nom_subcategoria from subcategoria where cod_categoria='$codCat' order by rand()");
        while($subCatDataB=mysqli_fetch_array($sqlSubCat2))
        {
          $idSubCat2=$subCatDataB['id_subcategoria'];
          $codSubCat2=$subCatDataB['cod_subcategoria'];
          $nom_subcategoria2=$subCatDataB['nom_subcategoria'];
          $idBuscar=$codSubCat2;
          //include("./libs1/getNumber.php");
          if($num>0)
          {  echo "<div class='divider'> / </div>"; }
          echo "<a class='section' href='vercat-foto3.php?op=pl&id=$idSubCat2&codCat=$codCat&codSubCat=$codSubCat2'><span class='font-black'>$nom_subcategoria2</span></a>";
          $num++;
        }
        if(isset($sqlCat2))
        { mysqli_free_result($sqlCat2); }
?>
       </div>
      </div>
      <?php
//----------------------------------
  }
 ?>
 <p><div class="ui hidden divider"></div></p>
 <?php
  //include("./data/buscar-datos.php");
  // include("./data/add1.php");
 ?>
</div>

