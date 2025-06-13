<style>
.spacer {
    height: 25px;
}
</style>
<!-- header -->
<div class="ui container pad-top-30 pad-bottom-30">
   <div class="center aligned segment">
    <div class="ui horizontal divider"><h2 class='font-red'>Ofertas</h2></div>
   </div>
</div>
<div class="spacer"></div>
<!-- cards -->
<div class="ui container">
  <div class="ui four column grid">
   <div class="row">
 <?php
      $num=1;
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where cod_subcategoria='1850020' and foto_producto<>'' and activo='S' order by rand() limit 4");
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
         <div class="column">
            <div class="ui card">
               <div class="image" style="background-color:#ffffff;">
                 <a class="ui red right ribbon label">Oferta</a>
                 <?php
                   echo "<a class='item' href='vercat3.php?idpro=$idpro'>";
                    if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
                    {
                      echo "<img class='ui small centered image' src='$dirRoot"."imagenes/sinfoto.png' style='height:160px;' alt='$nomProducto'>";
                    }
                    else
                    {
                      echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:160px;' alt='$nomProducto'>";
                    }
                   echo "</a>";
                 ?>
               </div>
               <div class="content">
                  <a class="header"><?php echo $nomProducto; ?></a>
                  <div class="description">
                     <?php echo $codProducto; ?>
                  </div>
               </div>
               <div class="extra content">
                  <a class="ui teal tag label"><?php echo $precio2_producto; ?></a>
               </div>
            </div>
         </div>
<?php
        $num++;
      }
      if(isset($sqlPro))
      { mysqli_free_result($sqlPro); }
?>
   </div>
 </div>
</div>
<div class="spacer"></div>
