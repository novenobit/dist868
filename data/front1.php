<?php
//include("$dirRoot"."data/front1.php");
?>
<div class="ui stackable five column grid">
 <?php
  $num=1;
  $reg=1;
  $sqlCat1=mysqli_query($conex1,"select * from categoria order by rand() limit 10");
  while($catData=mysqli_fetch_array($sqlCat1))
  {
    $id_categoria=$catData['id_categoria'];
    $codCat=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $foto_categoria=$catData['foto_categoria'];
    $icono=$catData['icono'];
    if(isset($icono) and $icono<>"")
    {
       //echo "<i class='$icono icon'></i>";
    }
    if($foto_categoria=="")
    { $foto_categoria="sinfoto.png"; }
    //<a class='header' href='vercat1.php?op=pl&id=$id_categoria&codCat=$codCat'><span class='blackText'>$nom_categoria</span></a>
 ?>
    <div class="column">
     <?php echo "<a class='ui card' href='vercat1.php?op=pl&id=$id_categoria&codCat=$codCat' style='border-radius: 15px;'>"; ?>
      <div class="image">
       <?php echo "<img class='ui medium rounded image' src='./imagenes/menu/$foto_categoria' alt='$nom_categoria'>"; ?>
      </div>
      <div class="centered" style="text-align: center;">
       <span class="font-10"><?php echo $nom_categoria; ?></span>
      </div>
     </a>
    </div>
 <?php
    $num++;
    if($num>=5)
    {
      $num=1;
      //  echo "</div>
      // <div class='ui stackable five column grid'>";
    }
  }
 ?>
</div>
