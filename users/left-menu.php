<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  left-menu.php                                              //
// ****************************************************************
if(!isset($areasSistema))
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

$linkAdmin="#";
$linkUsuarios="#";
$linkClientes="#";
$linkProductos="#";
$linkCtaEmpleado="#";
$linkCtaVendedor="#";
$linkCtaPublico="#";
$linkReportes="#";

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
if(isset($idnivel) and $idnivel<=3)
{
 if($AreaAdmin=="S")
 { $linkAdmin="../admin/admin.php"; }
 if($AreaClientes=="S")
 { $linkClientes="../clientes/clientes.php"; }
 if($VerVentas=="S")
 { $linkReportes="../reportes/reporte.php"; }
 if($AreaUsuario=="S")
 { $linkUsuarios="../users/usuarios.php"; }
 if($AreaProductos=="S")
 { $linkProductos="../productos/productos.php"; }
 if($CrearCuenta=="S")
 {
  $linkCtaEmpleado="../cuentas/cuentas.php?sistema=o";
  $linkCtaVendedor="../cuentas/cuentas.php";
  $linkCtaPublico="../cta-publico/pedidos.php";
 }
}
//echo "sss $idnivel / $AreaProductos / $usuario / $AreaProductos";
?>

<div class="ui blue label">
  <i class="bars icon"></i> Menu
</div>
<div class="ui vertical  menu" style="background-color:#091f2c;border-radius:25px;">
  <a class='item' href='#'>Mis Datos</a>
  <?php echo "<a class='item' href='$linkUsuarios'>"; ?>
    Usuarios
    <?php echo "<div class='ui teal left pointing label'>$numUsuarios</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkClientes'>"; ?>
    Clientes
    <?php echo "<div class='ui teal left pointing label'>$numClientes</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkProductos'>"; ?>
    Productos
    <?php echo "<div class='ui teal left pointing label'>$numProductos</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkCtaEmpleado'>"; ?>
    Cta.Empleados
    <?php echo "<div class='ui teal left pointing label'>$numCtaEmpleado</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkCtaVendedor'>"; ?>
    Cta.Vendedores
    <?php echo "<div class='ui teal left pointing label'>$numCtaVendedor</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkCtaPublico'>"; ?>
    Cta.Publico
    <?php echo "<div class='ui teal left pointing label'>$numCtaPublico</div>"; ?>
  </a>
  <?php echo "<a class='item' href='$linkReportes'>"; ?>
    Ventas
    <?php echo "<div class='ui teal left pointing label'>$numVentas</div>"; ?>
  </a>
</div>
