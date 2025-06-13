<?php
//include("$dirRoot"."data/add-vertical.php");
?>

 <div class="ui one column grid">
  <?php
   $num=0;
   $ves=1;
   if(!isset($numSubCat) or $numSubCat==0)
   { $numSubCat=4; }
   $tableBucar="productos";
   $campo1="id_productos";
   $campo2="cod_subcategoria";
   $valor=200;
   if(!isset($cod_categoria) or $cod_categoria=="")
   {
    $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where activo='S' order by rand() limit $numSubCat");
   }
   else
   {
    $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where cod_categoria='$cod_categoria' and activo='S' order by rand() limit $numSubCat");
   }
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
     <div class="column aos-item" aos="flip-left" data-aos-delay='<?php echo $valor; ?>'>

<div class="ui horizontal raised card" style="padding:12px;border-radius:15px;">

      <div class="ui two column grid">
       <div class="column">
         <div class="image">
          <?php
           echo "<a href='vercat3.php?idpro=$idpro'>";
            if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
            {
             echo "<img class='ui small rounded image' src='$dirRoot"."imagenes/sinfoto.png' style='width:80px;' alt='$nomProducto'>";
            }
            else
            {
             echo "<img class='ui small rounded image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='width:80px;' alt='$nomProducto'>";
            }
           echo "</a>";
          ?>
         </div>
       </div>
       <div class="column">
        <span class="ui small text">
         <a><?php echo $nomProducto; ?></a>
         <p>Ref <?php echo $precio1_producto; ?></p>
         <p><i class="heart icon"></i>
         <i class="heart icon"></i>
         <i class="heart icon"></i>
         <i class="heart icon"></i>
         <i class="heart outline icon"></i></p>
        </span>
       </div>
      </div>
</div>

     </div>
  <?php
    $valor=$valor+100;
    $Data="";
    $num++;
    if($num>=4 and $ves==1)
    {
    // <div class='column center alined'>
    //  echo "<img class='ui image' src='./imagenes/banners/$codCat.png'>";
    // </div>
    // $ves=0;
   }
   }
   if(isset($sqlProDataAdd))
   { mysqli_free_result($sqlProDataAdd); }
  ?>
 </div>
