<?php
//include("$dirRoot"."data/add1.php");
?>
<div class="ui computer only padded grid">
 <div class="column">
  <div class="ui vertical stripe">
   <div class="ui container">
    <?php
     //<h2 class="ui horizontal divider header font-orange"><i class="shipping fast icon"></i>Productos listos para enviar</h2>
    ?>
    <h2 class="ui horizontal divider header font-orange">Productos Varios</h2>
    <div class="ui stackable six column padded grid autoplay">
     <?php
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 6");
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
       <div class="column stretched padding2 center aligned">
        <div class="center aligned" style="height:260px;background-color:#ffffff;">
         <div class="image center aligned" style="background-color:#ffffff;">
          <?php
           echo "<a href='vercat3.php?idpro=$idpro'>";
            if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
            {
             echo "<img class='ui centered image' src='$dirRoot"."imagenes/sinfoto.png' style='height:160px;' alt='$nomProducto'>";
            }
            else
            {
             echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:160px;' alt='$nomProducto'>";
            }
           echo "</a>";
          ?>
         </div>
         <div class="content center aligned" style="background-color:#ffffff;text-align:center">
          <div class="meta center aligned font-10 font-black">
           <?php echo $nomProducto; ?>
          </div>
          <div class="center aligned font-greensalem">
           Ref <?php echo "S:".$precio1_producto; ?> <span class='font-red'>M:<?php echo $precio2_producto; ?></span>
          </div>
         </div>
        </div>
       </div>
     <?php
       $Data="";
      }
      if(isset($sqlProDataAdd))
      { mysqli_free_result($sqlProDataAdd); }
    ?>
    </div>
   </div>
  </div>
 </div>
</div>
