<?php
//include("$dirRoot"."data/categoria5.php");
if(!isset($codCat))
{ $codCat="125"; }
$codCat="125";
?>
<div class="ui centered computer only grid container">
 <div class="four wide left aligned column">
    <img src="./imagenes/banners/cat-tools.png" width="400" height="600" alt="" />
 </div>
 <div class="computer only twelve wide center aligned column mobile hidden">

   <div class="ui relaxed list">
    <?php
     $sqlCat1=mysqli_query($conex1,"select * from categoria where cod_categoria='$codCat'");
     while($catData=mysqli_fetch_array($sqlCat1))
     {
      $id_categoria=$catData['id_categoria'];
      $codCat=$catData['cod_categoria'];
      $nom_categoria=$catData['nom_categoria'];
      $icono=$catData['icono'];
      echo "<div class='item'>";
       if(isset($icono) and $icono<>"")
       { echo "<i class='$icono icon'></i>"; }
       echo "<div class='content'>
        <a class='header' href='vercat1.php?op=pl&id=$id_categoria&codCat=$codCat'><span class='blackText'>$nom_categoria</span></a>
       </div>
      </div>";
     }
    ?>
   </div>

 </div>
</div>
