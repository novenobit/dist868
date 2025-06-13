<div class="ui horizontal raised card">
 <div class="image">
    <?php echo "<img class='ui image' src='../imagenes/productos/$foto_producto'>"; ?>
 </div>
 <div class="content">
  <div class="header"><?php echo $proData['nom_producto']; ?></div>
  <div class="meta">
    <span class="category">Categor&iacute;a Actual: <?php echo $nom_categoria; ?> </span>
  </div>
  <div class="description">
    datos
  </div>
 </div>
 <div class="extra content">
  <div class="right floated author">
   <a href='javascript:history.back(1)' >&#171;&#171; Ret</a> &#124;
    <?php
    if(!isset($op))
    { $op="lis"; }
    if(isset($proData['id_producto']))
    {
      echo "<a  href='producto-ver1.php?op=ver&id={$proData['id_producto']}&mobile=$mobile'>Ver</a> &#124;
      <a  href='productos-edit1.php?op=edit&id={$proData['id_producto']}&mobile=$mobile'>Edita</a> &#124;
      <a  href='productos-del1.php?op=eli&id={$proData['id_producto']}&mobile=$mobile'>Del</a> &#124;
      <a  href='productos-proveedor.php?op=prov&id={$proData['id_producto']}&mobile=$mobile'>Prov</a> &#124; ";
      echo "<a href='producto-proveedor1.php?id={$proData['id_producto']}&mobile=$mobile'>Prov2</a> &#124; ";
      echo "<a href='producto-relate1.php?id={$proData['id_producto']}&mobile=$mobile'>Misma Cat</a>";
    }
    ?>
  </div>
 </div>
