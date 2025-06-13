<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  left-menu.php                                              //
// ****************************************************************

// Usuarios
$fieldCount="iduser";
$tableCount="usuarios";
include("../bots/count-records1.php");
$numUsuarios=$numFields;

// Cliente
$fieldCount="id_cliente";
$tableCount="clientes";
include("../bots/count-records1.php");
$numClientes=$numFields;
// Productos
$fieldCount="id_producto";
$tableCount="productos";
include("../bots/count-records1.php");
$numProductos=$numFields;
// Cuentas
$fieldCount="id_cuenta";
$tableCount="cuentas1";
include("../bots/count-records1.php");
$numCuentas=$numFields;
// Pedidos Online
$fieldCount="id_cuenta";
$tableCount="pedido1";
include("../bots/count-records1.php");
$numPedidos=$numFields;
// Ventas
$fieldCount="id_venta";
$tableCount="ventas";
include("../bots/count-records1.php");
$numVentas=$numFields;

?>

<div class="ui vertical menu">
  <a class="item" href='../users/usuarios.php'>
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
  <a class="item" href='../cuentas/cuentas.php?sistema=o'>
    Cuentas Abiertas
    <?php echo "<div class='ui teal left pointing label'>$numCuentas</div>"; ?>
  </a>
  <a class="item" href='../cta-publico/pedidos.php'>
    Pedidos Online
    <?php echo "<div class='ui teal left pointing label'>$numPedidos</div>"; ?>
  </a>
  <a class="item" href='../reportes/reporte.php'>
    Ventas
    <?php echo "<div class='ui teal left pointing label'>$numVentas</div>"; ?>
  </a>

  <div class="item">
    <div class="ui transparent icon input">
      <input type="text" placeholder="Buscar Cliente...">
      <i class="search icon"></i>
    </div>
  </div>
</div>
