<div class="ui hidden divider"></div>
<div class="ui container">
 <div class="ui grid">

<?php
if(!isset($sqldata) or empty($sqldata))
{
 $error="No hay Datos, ningun producto o la fecha no fue seleccionado";
 error();
 exit();
}
else
{
 $num=0;
 $ves=0;
 FlushData();
 $sql=mysqli_query($conex1,"$sqldata");
 while($proData=mysqli_fetch_array($sql))
 {
  if(isset($proData))
  {
    $id_producto=$proData['id_producto'];
    $nomProducto=$proData['nom_producto'];
    //$codSubCat=$proData['cod_subcategoria'];
    $codigo_barra=$proData['codigo_barra'];
    $precio1_producto=$proData['precio1_producto'];
    $nom_unidad=$proData['nom_unidad'];
    $empaque=$proData['empaque'];
    $foto_producto=$proData['foto_producto'];
    //$precio1_producto="". number_format($precio1_producto,2,',', '.') . "";
    if($precio1_producto=="0")
    { $precio1_producto=""; }
    // <a href='#' onclick='loadPage(\"$dirRoot"."productos/producto-ver1.php?op=$op&id={$proData['id_producto']}\"); return false;'>
    echo "<div class='sixteen wide column'>";
     echo "<div class='ui horizontal card' style='background-color:#ffffff;color:#000000;'>";
      if($foto_producto<>"" and $foto_producto<>"Array")
      {
        echo "<div class='image' style='width:100px;' style='background-color:#ffffff;color:#000000;'>
          <img class='ui image' src='./imagenes/productos/$foto_producto'>
        </div>";
      }
      echo "<div class='content'>
       <div class='header'>$nomProducto</div>
       <div class='meta'>
         <span class='category'>$codigo_barra</span>
       </div>
       <div class='description'>
        <p>Unidad: $nom_unidad / Empaque $empaque / Precio: $precio1_producto</p>
       </div>
       <div class='extra content'>
        <div class='right floated author'>
          <a class='ui orange button' href='vercat3.php?idpro=$id_producto'>Ver</a>
        </div>
       </div>
      </div>
     </div>
    </div> ";
    $ves++;
    $num++;
    if($ves==3)
    { $ves=1; }
  }
 }
}
if($num==0)
{
?>
<div class="ui hidden divider"></div>
<div class="ui center aligned red message">
  <div class="content">
    <div class="header">
       <h1>NO HAY DATOS</h1>
    </div>
    <h3>No hay Datos con el nombre: <?php echo $buscar; ?> * Prueba con otro nombre.</h3>
  </div>
</div>
<div class="ui hidden divider"></div>
<?php
}
?>
</div>
