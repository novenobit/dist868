<?php
//include("$dirRoot"."data/one-dolar.php");
?>
<div class="ui computer only padded grid">
 <div class="column">
  <div class="ui vertical stripe">
   <div class="ui container">
    <h2 class="ui horizontal divider header">Productos por menos de <span class='font-brightOrange'>un Dolar</span></h2>
    <div class="ui stackable six column padded grid autoplay">
     <?php
      $num=1;
      $sqlOneDolar=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where precio1_producto<1 and foto_producto<>'' and activo='S' order by rand() limit 21");
      while($proDolarData=mysqli_fetch_array($sqlOneDolar))
      {
       $idpro=$proDolarData['id_producto'];
       $codProducto=$proDolarData['cod_producto'];
       $nomProducto=$proDolarData['nom_producto'];
       $precio1_producto=$proDolarData['precio1_producto'];
       $precio2_producto=$proDolarData['precio2_producto'];
       $fotoProducto=$proDolarData['foto_producto'];
       if($fotoProducto=="")
       { $fotoProducto="sinfoto.png"; }
       if($precio1_producto>0)
       {
     ?>
       <div class="column stretched padding2 center aligned">
        <div class="center aligned" style="height:180px;background-color:#ffffff;">
         <div class="image center aligned" style="background-color:#ffffff;">
          <?php
            echo "<a href='vercat3.php?idpro=$idpro'>";
             if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
             {
               echo "<img class='ui small centered image' src='$dirRoot"."imagenes/sinfoto.png' style='height:120px;'  alt='$nomProducto'>";
             }
             else
             {
               echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto'  style='height:120px;'  alt='$nomProducto'>";
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
      }
      if(isset($sqlOneDolar))
      { mysqli_free_result($sqlOneDolar); }
    ?>
    </div>
   </div>
  </div>
 </div>
</div>
