<div class="ui hidden divider"></div>
<h2>SiteMap por Categoria</h2>
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
      <div class="ui center aligned column container">
        <p><div class="ui hidden divider"></div></p>
        <h2 class="ui horizontal divider header aos-item" aos='fade-up-right'><span class='font-sanMarino'><?php echo "<i class='$icono icon'></i> ".$nom_categoria; ?></span></h2>
        <p><div class="ui hidden divider"></div></p>
        <?php
         include("./data/showCat.php");
        ?>
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

