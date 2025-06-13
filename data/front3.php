<div class="ui stackable four column centered grid">
 <div class="stretched row">
    <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $valor=200;
     $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 4");
     while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
     {
      $idpro=$ProDataAdd['id_producto'];
      $codProducto=$ProDataAdd['cod_producto'];
      $nomProducto=$ProDataAdd['nom_producto'];
      $precio1_producto=$ProDataAdd['precio1_producto'];
      $precio2_producto=$ProDataAdd['precio2_producto'];
      $fotoProducto=$ProDataAdd['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
    ?>
      <div class="column padded">
       <div class="ui centered card aos-item" aos="flip-left" data-aos-delay='<?php echo $valor; ?>' style="border-radius:15px;">
        <div class=" ui centered image" style='background-color:#ffffff;'>
         <?php
          echo "<a href='vercat3.php?idpro=$idpro'>";
            if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
            {
             echo "<img class='ui rounded image' src='$dirRoot"."imagenes/sinfoto.png' style='width:200px;height:200px' alt='$nomProducto'>";
            }
            else
            {
             echo "<img class='ui rounded image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='width:200px;height:200px' alt='$nomProducto'>";
            }
          echo "</a>";
         ?>
        </div>
        <div class="content">
         <span class="ui small">
          <a><?php echo "$nomProducto Ref S:$precio1_producto <span class='font-red'>M:$precio2_producto</span>"; ?> </a>
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
