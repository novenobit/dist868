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
// Categorias
$fieldCount="id_categoria";
$tableCount="categoria";
include("../bots/count-records1.php");
$numCat=$numFields;
// Sub-Categorias
$fieldCount="id_subcategoria";
$tableCount="subcategoria";
include("../bots/count-records1.php");
$numSubCat=$numFields;
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

//Sin Datos ---------------------
// Sin Categorias
$fieldCount="id_producto";
$fieldFind="cod_categoria";
$tableCount="productos";
include("../bots/count-records-exit.php");
$numSinCat=$numFields;
// Sin Sub-Categorias
$fieldCount="id_producto";
$fieldFind="cod_subcategoria";
$tableCount="productos";
include("../bots/count-records-exit.php");
$numSinSubCat=$numFields;
// Sin Precios
$fieldCount="id_producto";
$fieldFind="precio1_producto";
$tableCount="productos";
include("../bots/count-records-exit.php");
$numPrecios=$numFields;
// Sin Imagenes
$fieldCount="id_producto";
$fieldFind="foto_producto";
$tableCount="productos";
include("../bots/count-records-exit.php");
$numFotos=$numFields;
// Sin Codigo Barra
$fieldCount="id_producto";
$fieldFind="codigo_barra";
$tableCount="productos";
$Mop2=$op2;
$op2="scb";
include("../bots/count-records-exit.php");
$numSinCB=$numFields;
$op2=$Mop2;
?>

<div class="ui blue label">
  <i class="bars icon"></i> Menu
</div>

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
  <a class="item" href='../productos/pro-cat-list.php'>
    Categorias
    <?php echo "<div class='ui teal left pointing label'>$numCat</div>"; ?>
  </a>
  <a class="item" href='../productos/pro-subcat.php'>
    Sub-Categorias
    <?php echo "<div class='ui teal left pointing label'>$numSubCat</div>"; ?>
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
</div>

<div class="ui divider"></div>
<div class="ui pointing below blue label">
  <i class="battery empty icon"></i> Faltan Datos
</div>

<div class="ui vertical menu">
     <a class="item" href='../productos/productos.php?op2=scb'>
       Sin Cod.Barra
       <?php echo "<div class='ui red left pointing label'>$numSinCB</div>"; ?>
     </a>
     <a class="item" href='../productos/productos.php?op2=sc'>
       Sin Categoria
       <?php echo "<div class='ui red left pointing label'>$numSinCat</div>"; ?>
     </a>
     <a class="item" href='../productos/productos.php?op2=ssc'>
       Sin SubCategoria
       <?php echo "<div class='ui red left pointing label'>$numSinSubCat</div>"; ?>
     </a>
     <a class="item" href='../productos/productos.php?op2=sp'>
       Sin Precios
       <?php echo "<div class='ui red left pointing label'>$numPrecios</div>"; ?>
     </a>
     <a class="item" href='../productos/productos.php?op2=sf'>
       Sin Fotos
       <?php echo "<div class='ui red left pointing label'>$numFotos</div>"; ?>
     </a>
</div>


