<div class="ui container">
 <div class="ui stackable five column centered grid">
  <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $valor=200;
     $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where cod_subcategoria='1250060' and foto_producto<>'' and activo='S' order by rand() limit 5");
     while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
     {
      $idpro=$ProDataAdd['id_producto'];
      $codProducto=$ProDataAdd['cod_producto'];
      $nomProducto=$ProDataAdd['nom_producto'];
      $precio1_producto=$ProDataAdd['precio1_producto'];
      $fotoProducto=$ProDataAdd['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
  ?>
      <div class="column">
        <div class="card aos-item" aos="flip-left" data-aos-delay='<?php echo $valor; ?>'>
          <div class="image">
           <?php
            echo "<a href='vercat3.php?idpro=$idpro'>";
              if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
              {
               echo "<img class='ui tiny image' src='$dirRoot"."imagenes/sinfoto.png' alt='$nomProducto'>";
              }
              else
              {
               echo "<img class='ui small image' src='$dirRoot"."imagenes/productos/$fotoProducto' alt='$nomProducto'>";
              }
            echo "</a>";
           ?>
          </div>
          <div class="content">
            <span class="ui small red text">
              <a><?php echo $nomProducto; ?></a>
            </span>
          </div>
        </div>
      </div>
  <?php
      $valor=$valor+100;
      $Data="";
     }
     if(isset($sqlProDataAdd))
     { mysqli_free_result($sqlProDataAdd); }
  ?>
 </div>
</div>
