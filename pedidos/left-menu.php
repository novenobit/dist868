<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema com868.com                    //
// *  left-menu.php                                              //
// ****************************************************************

// Usuarios
$fieldCount="iduser";
$tableCount="usuarios";
include("../bots/count-records.php");
$numUsuarios=$numFields;

// Cliente
$fieldCount="id_cliente";
$tableCount="clientes";
include("../bots/count-records.php");
$numClientes=$numFields;
// Productos
$fieldCount="id_producto";
$tableCount="productos";
include("../bots/count-records.php");
$numProductos=$numFields;
// Cuentas
$fieldCount="id_cuenta";
$tableCount="cuentas1";
include("../bots/count-records.php");
$numCuentas=$numFields;
// Pedidos Online
$fieldCount="idcart";
$tableCount="pedironline1";
include("../bots/count-records.php");
$numPedidos=$numFields;
// Ventas
$fieldCount="id_venta";
$tableCount="ventas";
include("../bots/count-records.php");
$numVentas=$numFields;
?>

<div class="ui blue label">
  <i class="bars icon"></i> Menu
</div>

<div class="ui vertical inverted menu">
  <a class="item" href='../usuarios/usuarios.php'>
    Usuarios
    <?php echo "<div class='ui teal left pointing label'>$numUsuarios</div>"; ?>
  </a>
  <a class="item" href='../clientes/clientes.php'>
    Clientes
    <?php echo "<div class='ui teal left pointing label'>$numClientes</div>"; ?>
  </a>
  <a class="item" href='../productos/productos.php'>
    Productos
    <?php echo "<div class='ui teal left pointing label'>$numProductos</div>"; ?>
  </a>
  <a class="item" href='../cuentas/cuentas.php'>
    Cuentas Abiertas
    <?php echo "<div class='ui teal left pointing label'>$numCuentas</div>"; ?>
  </a>
  <a class="item" href='../pedidos/pedidos.php'>
    Pedidos Online
    <?php echo "<div class='ui teal left pointing label'>$numPedidos</div>"; ?>
  </a>
  <a class="item" href='#'>
    Ventas
    <?php echo "<div class='ui teal left pointing label'>$numVentas</div>"; ?>
  </a>

</div>
