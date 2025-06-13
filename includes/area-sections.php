<?php
// include("$dirRoot"."includes/area-sections.php");

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
include("../bots/count-records1.php");
$numCuentas=$numFields;

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
$linkCtaCliente="#";
$linkCtaPublico="#";
$linkReportes="#";
$linkComenta="#";
$linkCatalogo="#";

if(!isset($AreaAdmin))
{ $AreaAdmin="N"; }
if(!isset($AreaClientes))
{ $AreaClientes="N"; }
if(!isset($CrearCuenta))
{ $CrearCuenta="N"; }
if(!isset($VerVentas))
{ $VerVentas="N"; }
if(!isset($AreaUsuario))
{ $AreaUsuario="N"; }
if(!isset($AreaProductos))
{ $AreaProductos="N"; }
$filter="";

if(isset($idnivel) and $idnivel<=3)
{
 if($mobile=="S")
 {
   if($AreaAdmin=="S")
   { $linkAdmin="admin.php";
     $linkComenta="admin.php";
   }
   if($AreaClientes=="S")
   { $linkClientes="clientes.php"; }
   if($AreaAdmin=="S" and $VerVentas=="S")
   { $linkReportes="reporte.php"; }
   if($AreaUsuario=="S")
   { $linkUsuarios="usuarios.php"; }
   if($AreaProductos=="S")
   { $linkProductos="productos.php"; }
   if($CrearCuenta=="S")
   {
    $linkCtaEmpleado="cuentas.php?sistema=e&filter=e";
    $linkCtaVendedor="cuentas.php?sistema=e&filter=v";
    $linkCatalogo="catalogo.php";
    $linkCtaCliente="cuentas.php?sistema=c&filter=S&filter=c";
    //$linkCtaVendedor="cuentas.php?sistema=e";
    $linkCtaPublico="cuentas.php?sistema=o&filter=S&filter=o";
   }
 }
 else
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
    $linkCtaEmpleado="../cuentas/cuentas.php?sistema=e&filter=e";
    $linkCtaVendedor="../cuentas/cuentas.php?sistema=v&filter=v";
    $linkCatalogo="$dirRoot"."catalogos/catalogo.php";
//    $linkCtaVendedor="../cuentas/cuentas.php?sistema=e";
    $linkCtaCliente="../cuentas/cuentas.php?sistema=c&filter=c";
    $linkCtaPublico="../cuentas/cuentas.php?sistema=o&filter=o";
   }
 }
}
if(isset($idnivel) and $idnivel>=4)
{
 $linkCtaCliente="../cuentas/cuentas.php";
}

?>
