<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  left-menu.php                                              //
// ****************************************************************

// Usuarios
$fieldCount="iduser";
$tableCount="usuarios";
include("$dirRoot"."bots/count-records1.php");
$numUsuarios=$numFields;

// Cliente
$fieldCount="id_cliente";
$tableCount="clientes";
include("$dirRoot"."bots/count-records1.php");
$numClientes=$numFields;
// Productos
$fieldCount="id_producto";
$tableCount="productos";
include("$dirRoot"."bots/count-records1.php");
$numProductos=$numFields;
// Categorias
$fieldCount="id_categoria";
$tableCount="categoria";
include("$dirRoot"."bots/count-records1.php");
$numCat=$numFields;
// Sub-Categorias
$fieldCount="id_subcategoria";
$tableCount="subcategoria";
include("$dirRoot"."bots/count-records1.php");
$numSubCat=$numFields;

// Ventas
$fieldCount="id_venta";
$tableCount="ventas";
include("$dirRoot"."bots/count-records1.php");
$numVentas=$numFields;

//Sin Datos ---------------------
// Sin Categorias
$fieldCount="id_producto";
$fieldFind="cod_categoria";
$tableCount="productos";
include("$dirRoot"."bots/count-records-exit.php");
$numSinCat=$numFields;

// Sin Sub-Categorias
$fieldCount="id_producto";
$fieldFind="cod_subcategoria";
$tableCount="productos";
include("$dirRoot"."bots/count-records-exit.php");
$numSinSubCat=$numFields;

// Sin Precios
$fieldCount="id_producto";
$fieldFind="precio1_producto";
$tableCount="productos";
include("$dirRoot"."bots/count-records-exit.php");
$numPrecios=$numFields;

// Sin Imagenes
$fieldCount="id_producto";
$fieldFind="foto_producto";
$tableCount="productos";
include("$dirRoot"."bots/count-records-exit.php");
$numFotos=$numFields;

// Sin Codigo Barra
$fieldCount="id_producto";
$fieldFind="codigo_barra";
$tableCount="productos";
$Mop2=$op2;
$op2="scb";
include("$dirRoot"."bots/count-records-exit.php");
$numSinCB=$numFields;
$op2=$Mop2;

// Sin Unifdad
$fieldCount="id_producto";
$fieldFind="nom_unidad";
$tableCount="productos";
$Mop2=$op2;
$op2="sun";
include("$dirRoot"."bots/count-records-exit.php");
$numSinUn=$numFields;
$op2=$Mop2;

// Sin Empaque
$fieldCount="id_producto";
$fieldFind="empaque";
$tableCount="productos";
$Mop2=$op2;
$op2="sem";
include("$dirRoot"."bots/count-records-exit.php");
$numSinEm=$numFields;
$op2=$Mop2;

// No Disponible
$fieldCount="id_producto";
$fieldFind="estado";
$tableCount="productos";
$Mop2=$op2;
$op2="pnd";
include("$dirRoot"."bots/count-records-exit.php");
$numNoDis=$numFields;
$op2=$Mop2;

// No Activo
$fieldCount="id_producto";
$fieldFind="activo";
$tableCount="productos";
$Mop2=$op2;
$op2="pna";
include("$dirRoot"."bots/count-records-exit.php");
$numNoAct=$numFields;
$op2=$Mop2;

$SinCodBarra="#";
$SinCategoria="#";
$SinSubCategoria="#";
$SinPrecios="#";
$SinFotos="#";
$SinUnidad="#";
$SinEmpaque="#";
$NoDisponible="#";
$NoActivo="#";

if(isset($idnivel) and $idnivel<=3)
{
 if($AreaProductos=="S" and $CrearProductos=="S")
 {
   $SinCodBarra="../productos/productos.php?op2=scb";
   $SinCategoria="../productos/productos.php?op2=sc";
   $SinSubCategoria="../productos/productos.php?op2=ssc";
   $SinPrecios="../productos/productos.php?op2=sp";
   $SinUnidad="../productos/productos.php?op2=sun";
   $SinEmpaque="../productos/productos.php?op2=sem";
   $NoDisponible="../productos/productos.php?op2=pnd";
   $NoActivo="../productos/productos.php?op2=pna";
 }
 if($AreaProductos=="S" and $CambiaFotos=="S")
 {
   $SinFotos="../productos/productos.php?op2=sf";
 }
}
?>

<div class="ui pointing below blue label">
  <i class="battery empty icon"></i> Faltan Datos
</div>

<div class="ui vertical menu" style="background-color:#ffffff;border-radius:15px;">
     <a class="item" href="<?php echo $SinCodBarra; ?>">
       Sin Cod.Barra
       <?php echo "<div class='ui red left pointing label'>$numSinCB</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinCategoria; ?>">
       Sin Categoria
       <?php echo "<div class='ui red left pointing label'>$numSinCat</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinSubCategoria; ?>">
       Sin SubCategoria
       <?php echo "<div class='ui red left pointing label'>$numSinSubCat</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinPrecios; ?>">
       Sin Precios
       <?php echo "<div class='ui red left pointing label'>$numPrecios</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinFotos; ?>">
       Sin Fotos
       <?php echo "<div class='ui red left pointing label'>$numFotos</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinUnidad; ?>">
       Sin Unidad
       <?php echo "<div class='ui red left pointing label'>$numSinUn</div>"; ?>
     </a>
     <a class="item" href="<?php echo $SinEmpaque; ?>">
       Sin Empaque
       <?php echo "<div class='ui red left pointing label'>$numSinEm</div>"; ?>
     </a>
     <a class="item" href="<?php echo $NoDisponible; ?>">
       No Disponible
       <?php echo "<div class='ui red left pointing label'>$numNoDis</div>"; ?>
     </a>
     <a class="item" href="<?php echo $NoActivo; ?>">
       No Activo
       <?php echo "<div class='ui red left pointing label'>$numNoAct</div>"; ?>
     </a>
</div>
