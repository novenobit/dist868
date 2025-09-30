<?php
// include("sub-menu.php");
?>
<div class="ui grid">
 <div class="eight wide column">
  <div class="ui breadcrumb">
    <a class='section'><?php echo $_SESSION['nombre']." ". $_SESSION['apellido']; ?></a>
     <div class="divider"> &#124; </div>
     <?php echo "<a class='section' href='producto-nuevo1.php'>Producto Nuevo</a>"; ?>
     <div class="divider"> &#124; </div>
     <?php echo "<a class='section' href='../cuentas/cuentas.php?sistema=o?id=$iduser'>Cuentas Abiertas</a>"; ?>
  </div>
  <div class="ui container">
    <?php
     echo "<a href='$dirRoot"."pro-cat-list.php'>Categoria</a> |
     <a href='pro-subcat.php'>Sub-Cat</a> |
     <a href='unidades-list1.php'>Unidades</a> |
     <a href='productos.php'>Productos</a>";
    ?>
  </div>
 </div>
 <div class="eight wide column  center aligned">
  <div class="ui one column stackable grid">
   <div class="column center alined">
    <div class="ui action left icon input">
     <i class="search icon"></i>
      <input type="text" id="search_data" placeholder="Nombre del Producto..." autocomplete="off" class="form-control input-lg" />
     <div class="ui teal button">Buscar</div>
    </div>
   </div>
  </div>
 </div>
</div>
