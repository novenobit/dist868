<div class="ui grid">
 <div class="sixteen wide column">
  <div class="ui buttons">
      <?php
      // if(isset($CambiarDatos) and $CambiarDatos=="S")
       echo "<a class='ui blue button' href='goto-page.php?id=$id_producto'><i class='redo icon'></i> Rel</a>";
       if(isset($CrearProductos) and $CrearProductos=="S")
       { echo "<a class='ui blue button' href='producto-edit1.php?id=$id_producto'><i class='edit icon'></i> Edt</a>
         <a class='ui blue button' href='producto-cc1.php?id=$id_producto'><i class='puzzle piece icon'></i> Cat</a>";
       }
       else
       { echo "<a class='ui blue button'><i class='edit icon'></i> Edt</a>
         <a class='ui blue button'><i class='puzzle piece icon'></i> Cat</a>";
       }
       if(isset($CambiaFotos) and $CambiaFotos=="S")
       { echo "<a class='ui blue button' href='producto-foto1.php?id=$id_producto'><i class='image icon'></i> Img</a>"; }
       else
       { echo "<a class='ui blue button'><i class='image icon'></i> Img</a>"; }
        if(isset($CrearProductos) and $CrearProductos=="S")
       { echo "<a class='ui blue button' href='producto-del1.php?id=$id_producto'><i class='trash alternate outline icon'></i> Bor</a>"; }
       else
       { echo "<a class='ui blue button'><i class='trash alternate outline icon'></i> Bor</a>"; }
//      <a class='ui blue button' href="javascript:window.close()"><i class="times circle outline icon"></i> Cierra</a>
      ?>
  </div>
 </div>
</div>
