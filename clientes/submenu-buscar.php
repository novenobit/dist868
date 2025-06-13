<?php
//  include("submenu-buscar.php");
?>
<form class="ui form" action="cliente-buscar1.php" method="POST">
 <div class="ui grid">
   <div class="six wide column">
      <input class="rounded" type="text" name="buscar" maxlength="50" placeholder="Datos del Cliente"  autocomplete="off">
   </div>
   <div class="six wide column">
     <select class="ui fluid search dropdown" name="dondebuscar">
                <option value="nombre">Donde</option>
                <option value="nombre">Nombre</option>
                <option value="rifcid">RIF/CI</option>
                <option value="tel1">Telefono</option>
                <option value="ultimos">Ultimos 20</option>
      </select>
   </div>
   <div class="four wide column">
       <button class="ui submit button">Buscar</button>
   </div>
  </div>
</form>

