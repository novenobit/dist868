<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *   leftbar.php                                               //
// ****************************************************************

if(!isset($areasSistema) or !isset($AreaAdmin))
{
 include("$dirRoot"."bots/AreasSistema.php");
}

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
$numCtaEmpleado=$numFields;

// Ventas
$fieldCount="id_venta";
$tableCount="ventas";
include("../bots/count-records1.php");
$numVentas=$numFields;

//$numCtaEmpleado
//$numCtaVendedor
//$numCtaPublico

// Ventas
$fieldCount="id_venta";
$tableCount="ventas";
include("../bots/count-records1.php");
$numVentas=$numFields;

$linkAdmin="#";
$linkUsuarios="#";
$linkClientes="#";
$linkProductos="#";
$linkCtaEmpleado="#";
$linkCtaVendedor="#";
$linkCtaPublico="#";
$linkReportes="#";
$linkComenta="#";
$linkCatalogo="#";

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

if(isset($idnivel) and $idnivel<=3)
{
 if($AreaAdmin=="S")
 { $linkAdmin="../admin/admin.php";
   $linkComenta="../admin/admin.php";
 }
 if($AreaClientes=="S")
 { $linkClientes="../clientes/clientes.php"; }
 if($AreaAdmin=="S" and $VerVentas=="S")
 { $linkReportes="../reportes/reporte.php"; }
 if($AreaUsuario=="S")
 { $linkUsuarios="../users/usuarios.php"; }
 if($AreaProductos=="S")
 { $linkProductos="../productos/productos.php"; }
 if($CrearCuenta=="S")
 {
  $linkCtaEmpleado="../cuentas/cuentas.php?sistema=o";
  $linkCatalogo="$dirRoot"."catalogos/catalogo.php";
  $linkCtaVendedor="../cuentas/cuentas.php";
  $linkCtaPublico="../cta-publico/pedidos.php";
 }
}
//echo "<font color='white'>xxxxxx xxxx sss $idnivel / $AreaProductos / $usuario / $linkProductos / $idnivel";
?>

<nav class="main-menu">
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
      <span class="nav-text">Cta.Oficina <?php echo "<div class='ui blue left pointing label'>$numCtaEmpleado</div>"; ?></span>
    </a>
   </li>
   <li>
    <a href="<?php echo $linkCtaVendedor; ?>">
      <span class='icono'><i class="user friends icon"></i></span>
      <span class="nav-text">Cta.Vendedor <?php echo "<div class='ui blue left pointing label'>$numCtaVendedor</div>"; ?></span>
    </a>
   </li>
   <li>
    <a href="<?php echo $linkCtaPublico; ?>">
      <span class='icono'><i class="shopping cart icon"></i></span>
      <span class="nav-text">Cta.Publico <?php echo "<div class='ui blue left pointing label'>$numCtaPublico</div>"; ?></span>
    </a>
   </li>
<!-- Report Data -->
   <li>
    <a href="<?php echo $linkReportes; ?>">
      <span class='icono'><i class="chartline icon"></i></span>
      <span class="nav-text">Reportes <?php echo "<div class='ui blue left pointing label'>$numVentas</div>"; ?></span>
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

