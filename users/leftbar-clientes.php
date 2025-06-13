<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  leftbar-clientes.php                                              //
// ****************************************************************
// Usuarios
if(isset($tableUse) and $tableUse=="pedido")
{ $numUsuarios=0; }
else
{
 $fieldCount="iduser";
 $tableCount="usuarios";
 include("../bots/count-records1.php");
 $numUsuarios=$numFields;
}
// Productos
$fieldCount="id_producto";
$tableCount="productos";
include("../bots/count-records1.php");
$numProductos=$numFields;
// Cuentas del Cliente
$numCtaDeCliente=0;
$fieldCount="id_cuenta";
$tableCount="pedido1";
include("../bots/count-records-cliente.php");
//$numCtaDeCliente=$numFields;
$linkProductos="#";
$linkCtaCliente="#";
$linkCtaVendedor="#";

if(!isset($AreaAdmin))
{ $AreaAdmin="N"; }
if(!isset($AreaAdmin))
{ $AreaAdmin="N"; }
if(!isset($VerVentas))
{ $VerVentas="N"; }
if(!isset($AreaUsuario))
{ $AreaUsuario="N"; }
if(!isset($AreaProductos))
{ $AreaProductos="N"; }
if(!isset($idnivel) or $idnivel=="")
{
 $idnivel=4;
}
if(isset($idnivel) and $idnivel>=4)
{
 $linkCtaCliente="../cuentas/cuentas.php";
}
?>

<nav class="main-menu" style="background:#2574A9;">
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
