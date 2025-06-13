<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-ver1.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$table="S";
$message="S";
$label="S";
$autoPro="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$loadPage="S";
$accordion="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
include("sub-menu.php");
//--------------------

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

<div class="mainContent">
 <div id="content">
   <div class="grid-container">
     <div class="grid-item">

      <div class="ui pointing below blue label">
        <i class="bars icon"></i> Menu
      </div>

      <div class="ui vertical menu">

        <?php echo "<a class='item' href='../users/usuarios.php'>"; ?>
          Usuarios
          <?php echo "<div class='ui teal left pointing label'>$numUsuarios</div>"; ?>
        </a>
        <?php echo "<a class='item' href='../clientes/clientes.php'>"; ?>
          Clientes
          <?php echo "<div class='ui teal left pointing label'>$numClientes</div>"; ?>
        </a>
        <?php echo "<a class='item' href='productos.php'>"; ?>
          Productos
          <?php echo "<div class='ui teal left pointing label'>$numProductos</div>"; ?>
        </a>
        <?php echo "<a class='item' href='pro-cat-list.php'>"; ?>
          Categorias
          <?php echo "<div class='ui teal left pointing label'>$numCat</div>"; ?>
        </a>
        <?php echo "<a class='item' href='pro-subcat.php'>"; ?>
          Sub-Categorias
          <?php echo "<div class='ui teal left pointing label'>$numSubCat</div>"; ?>
        </a>
        <?php echo "<a class='item' href='../cuentas/cuentas.php?sistema=o'>"; ?>
          Cuentas Abiertas
          <?php echo "<div class='ui teal left pointing label'>$numCuentas</div>"; ?>
        </a>
        <?php echo "<a class='item' href='../cuentas/cuentas.php?sistema=o'>"; ?>
          Pedidos Online
          <?php echo "<div class='ui teal left pointing label'>$numPedidos</div>"; ?>
        </a>
        <?php echo "<a class='item' href=../reportes/reporte.php'>"; ?>
          Ventas
          <?php echo "<div class='ui teal left pointing label'>$numVentas</div>"; ?>
        </a>
      </div>

     </div>
     <div class="grid-item">

      <div class="ui pointing below blue label">
        <i class="battery empty icon"></i> Faltan Datos
      </div>

      <div class="ui vertical menu">
           <?php echo "<a class='item' href='productos.php?op2=scb'>"; ?>
             Sin Cod.Barra
             <?php echo "<div class='ui red left pointing label'>$numSinCB</div>"; ?>
           </a>
           <?php echo "<a class='item' href='productos.php?op2=sc'>"; ?>
             Sin Categoria
             <?php echo "<div class='ui red left pointing label'>$numSinCat</div>"; ?>
           </a>
           <?php echo "<a class='item' href='productos.php?op2=ssc'>"; ?>
             Sin SubCategoria
             <?php echo "<div class='ui red left pointing label'>$numSinSubCat</div>"; ?>
           </a>
           <?php echo "<a class='item' href='productos.php?op2=sp'>"; ?>
             Sin Precios
             <?php echo "<div class='ui red left pointing label'>$numPrecios</div>"; ?>
           </a>
           <?php echo "<a class='item' href='productos.php?op2=sf'>"; ?>
             Sin Fotos
             <?php echo "<div class='ui red left pointing label'>$numFotos</div>"; ?>
           </a>
      </div>

     </div>
   </div>
  </div>
</div>

<div class="ui accordion">
<div class="title">
 <i class="dropdown icon"></i> <i class="search icon"></i>Buscar Datos
</div>
<div class="content">
 <p>Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Fusce egestas elit eget lorem. Aenean imperdiet. Aenean commodo ligula eget dolor. Donec venenatis vulputate lorem.</p>
</div>
</div>

<p><div class="ui hidden divider"></div></p>
<p><div class="spaceSection"></div></p>


<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
