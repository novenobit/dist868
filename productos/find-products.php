<?php
// include("find-products.php");
//<form class="ui form"  action="pro-buscar1.php" method="POST" onsubmit="window.open('pro-buscar1.php','width=500,height=300');return false;">
echo "<form class='ui form' action='pro-buscar2.php' method='POST'>";
?>
<div class="ui grid">
  <div class="eight wide column">
       <input type="text" name="buscar" maxlength="50" placeholder="Datos del Producto">
  </div>
  <div class="four wide column">
    <select class="ui fluid search dropdown" name="dondebuscar">
             <option value="codbarra">CodBarra</option>
             <option value="nombre">Nombre</option>
             <option value="precio">Precio</option>
             <option value="ultimos">Ultimos 20</option>
             <option value="pais">Pais Origen</option>
             <option value="upcean">UPC/EAN</option>
           </select>
  </div>
  <div class="four wide column">
             <button class="ui submit button">Buscar</button>
  </div>
 </div>
</form>
