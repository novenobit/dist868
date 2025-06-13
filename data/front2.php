<div class="ui container">
 <div class="ui stackable five column grid">
  <?php
    $num=1;
    $reg=1;
    $sqlCat1=mysqli_query($conex1,"select * from categoria order by nom_categoria");
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
     echo "<div class='column'>
      <a class='ui raised card' href='vercat1.php?op=pl&id=$id_categoria&codCat=$codCat'>
        <div class='image'><img src='./imagenes/menu/$foto_categoria' alt='$nom_categoria'></div>
        <div class='content'><i class='$icono icon'></i> $nom_categoria</div>
      </a>
     </div>";
    }
  ?>
 </div>
</div>
<!--Section-->

