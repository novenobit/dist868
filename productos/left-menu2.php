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

$SinCodBarra="#";
$SinCategoria="#";
$SinSubCategoria="#";
$SinPrecios="#";
$SinFotos="#";
$SinUnidad="#";
$SinEmpaque="#";

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
 }
 if($AreaProductos=="S" and $CambiaFotos=="S")
 {
   $SinFotos="../productos/productos.php?op2=sf";
 }
}
?>

<a class="item" href="<?php echo $SinCodBarra; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numSinCB</div>"; ?>
 Sin Cod.Barra
</a>

<a class="item" href="<?php echo $SinCategoria; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numSinCat</div>"; ?>
 Sin Categoria
</a>

<a class="item" href="<?php echo $SinSubCategoria; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numSinSubCat</div>"; ?>
 Sin SubCategoria
</a>

<a class="item" href="<?php echo $SinPrecios; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numPrecios</div>"; ?>
 Sin Precios
</a>

<a class="item" href="<?php echo $SinFotos; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numFotos</div>"; ?>
 Sin Fotos
</a>

<a class="item" href="<?php echo $SinUnidad; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numSinUn</div>"; ?>
 Sin Unidad
</a>

<a class="item" href="<?php echo $SinEmpaque; ?>">
 <?php echo "<div class='description ui red right pointing label' style='color:#fff;'>$numSinEm</div>"; ?>
 Sin Empaque
</a>
