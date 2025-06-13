<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *   leftbar.php                                               //
// ****************************************************************
include("area-sections.php");
//echo "<font color='white'>xxxxxx xxxx sss $idnivel &#124; $AreaProductos &#124; $usuario &#124; $linkProductos &#124; $idnivel";
?>
<style>
.logout {
 position:absolute;
 left:0;
 bottom:0;
}
.item,.icono,.scrollbar,.nav-text {
  color:white;
}
</style>
<nav class="main-menu" style="background-color:#22313F;color:white;">
 <div>
  <a class="item" href='../users/usersection.php'>
  <span class='icono'><i class="bars icon"></i></span></a>
 </div>
 <div class="scrollbar" id="style-1">
  <ul>
<!-- Tienda Data -->
   <li>
    <a href="../index.php">
      <span class='icono'><i class="store icon"></i></span>
      <span class="nav-text">Tienda <?php echo "<div class='ui teal left pointing label'>0</div>"; ?></span>
    </a>
   </li>
<?php
if($idnivel<=3)
{
?>
<!-- Admin -->
   <li>
    <a href="<?php echo $linkAdmin; ?>">
      <span class='icono'><i class="toolbox icon"></i></span>
      <span class="nav-text">Admin <?php echo "<div class='ui teal left pointing label'>A</div>"; ?></span>
    </a>
   </li>
<!-- Data Maestro -->
   <li>
    <a href="<?php echo $linkUsuarios; ?>">
      <span class='icono'><i class="user tie icon"></i></span>
      <span class="nav-text">Usuarios <?php echo "<div class='ui teal left pointing label'>$numUsuarios</div>"; ?></span>
    </a>
   </li>
   <li>
    <a href="<?php echo $linkClientes; ?>">
      <span class='icono'><i class="users icon"></i></span>
      <span class="nav-text">Clientes <?php echo "<div class='ui teal left pointing label'>$numClientes</div>"; ?></span>
    </a>
   </li>
   <li>
    <a href="<?php echo $linkProductos; ?>">
      <span class='icono'><i class="product hunt icon"></i></span>
      <span class="nav-text">Productos <?php echo "<div class='ui teal left pointing label'>$numProductos</div>"; ?></span>
    </a>
   </li>
<!-- Cuentas Data -->
   <li>
    <a href="<?php echo $linkCtaEmpleado; ?>">
      <span class='icono'><i class="user outline icon"></i></span>
      <span class="nav-text">Cuentas Ventas <?php echo "<div class='ui blue left pointing label'>$numCuentas</div>"; ?></span>
    </a>
   </li>
<!-- Pedidos Onlinea -->
   <li>
    <a href="<?php echo $linkCtaPublico; ?>">
      <span class='icono'><i class="shopping cart icon"></i></span>
      <span class="nav-text">Cta.Publico <?php echo "<div class='ui blue left pointing label'>$numCuentasPO</div>"; ?></span>
    </a>
<!-- Report Data -->
   <li>
    <a href="<?php echo $linkReportes; ?>">
      <span class='icono'><i class="chartline icon"></i></span>
      <span class="nav-text">Reportes <?php echo "<div class='ui blue left pointing label'>$numVentas</div>"; ?></span>
    </a>
   </li>
<?php
}
?>
  </ul>
  <ul class="logout">
   <li>
    <?php echo "<a class='item' href='$dirRoot"."users/user-logout.php'>"; ?>
     <span  class='icono'><i class="sign out alternate icon"></i></span>
     <span class="nav-text">Logout</span>
    </a>
   </li>
  </ul>
 </div>
</nav>
