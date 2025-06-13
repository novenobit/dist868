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
// Pedidos Online = O
// Pedidos Clientes = C
// Pedidos Empleados = E

// Pedidos Online
$numCuentasPO=0;
$fieldCount="id_cuenta";
$tableCount="cuentas1";
$field="sistema";
$value="O";
include("../bots/count-records2.php");
$numCuentasPO=$numFields;
// Pedidos por Clientes
$numCuentasPC=0;
$fieldCount="id_cuenta";
$tableCount="cuentas1";
$field="sistema";
$value="C";
include("../bots/count-records2.php");
$numCuentasPC=$numFields;
// Pedidos por Empleados
$numCuentasPE=0;
$fieldCount="id_cuenta";
$tableCount="cuentas1";
$field="sistema";
$value="E";
include("../bots/count-records2.php");
$numCuentasPE=$numFields;

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
    Cuentas Empleados
    <?php echo "<div class='ui teal left pointing label'>$numCuentasPE</div>"; ?>
  </a>
  <a class="item" href='../cuentas/cuentas.php?sistema=o'>
    Cuentas Clientes
    <?php echo "<div class='ui teal left pointing label'>$numCuentasPC</div>"; ?>
  </a>
  <a class="item" href='../cuentas/cuentas.php?sistema=o'>
    Cuentas Visistantes
    <?php echo "<div class='ui teal left pointing label'>$numCuentasPC</div>"; ?>
  </a>

  <a class="item" href='#'>
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
