<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  leftbar-clientes.php                                              //
// ****************************************************************
include("$dirRoot"."includes/area-sections.php");
$numCtaDeCliente=0;
$sqlCount=mysqli_query($conex1, "select id_cuenta  from cuentas1 where usuario='$usuario'");
$numCtaDeCliente=mysqli_num_rows($sqlCount);
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

<nav class="main-menu" style="background:#1330be;color:#fff;">
 <div class="scrollbar" id="style-1">
  <ul>
<!-- Tienda Data -->
   <li>
    <a href="../index.php">
      <span class='icono'><i class="store icon"></i></span>
      <span class="nav-text">Tienda <?php echo "<div class='ui teal left pointing label'>0</div>"; ?></span>
    </a>
   </li>
<!-- Data Maestro -->
   <li>
    <a href="<?php echo $linkProductos; ?>">
      <span class='icono'><i class="product hunt icon"></i></span>
      <span class="nav-text">Productos <?php echo "<div class='ui teal left pointing label'>$numProductos</div>"; ?></span>
    </a>
   </li>
<!-- Cuentas Data -->
   <li>
    <a href="<?php echo $linkCtaVendedor; ?>">
      <span class='icono'><i class="user friends icon"></i></span>
      <span class="nav-text">Pedidos <?php echo "<div class='ui blue left pointing label'>$numCtaDeCliente</div>"; ?></span>
    </a>
   </li>
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
