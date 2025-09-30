<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  database.php                                               //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
?>
<table class="ui unstackable celled table">
 <thead>
  <tr>
   <th class='ui blue' style="width:240px;vertical-align:top;">Operaci&oacute;n</th>
   <th class='ui blue'>Descripci&oacute;n</th>
  </tr>
 </thead>
 <tbody>
<!-- ******************************  -->
<!-- Import Data                     -->
<!-- ******************************  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;border-radius:15px;" colspan="2"><p>Import Data from CSV File  - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
<!-- Import Categoria -->
      <tr>
       <td style="width:240px;vertical-align:top;"><span class="font-white">
        <a class='fluid ui pink button' href='importData-Cat.php' target='data2'>importCategoria</a>
       </td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Importar Data a la tabla de Categoria
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> categoria.csv</p>
             <?php
              if(file_exists("../docs/categoria.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p3">ID<span class='font-black font-bold'>&#124;</span>Codigo_Categoria<span class='font-black font-bold'>&#124;</span>NombreCategoria<span class='font-black font-bold'>&#124;</span>Foto<span class='font-black font-bold'>&#124;</span>Icono<span class='font-black font-bold'>&#124;</span>Nota</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p3')">copiar</a>
           </div>
         </div>
       </td>
      </tr>
<!-- Import SubCategoria -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-SubCat.php' target='data2'>importSubCategoria</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Importar Data a la tabla de Sub-Categoria
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> subcategoria.csv</p>
             <?php
              if(file_exists("../docs/subcategoria.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p4">Codigo_Subcategoria<span class='font-black font-bold'>&#124;</span>Codigo_Categoria<span class='font-black font-bold'>&#124;</span>Nombre<span class='font-black font-bold'>&#124;</span>Datos<span class='font-black font-bold'>&#124;</span>Foto</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p4')">copiar</a>
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data Marcas -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importMarcas.php' target='data2'>Importar Marcas</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Importar las Marcas de los Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> nombre-marcas.csv</p>
             <?php
              if(file_exists("../docs/nombre-marcas.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red'>CodigoDelProducto<span class='font-black font-bold'>&#124;</span>NombreDeLAMarca</p>
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data Productos -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importDataPro.php' target='data2'>importData-Producto</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Import Data to Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos.csv</p>
             <?php
              if(file_exists("../docs/productos.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p5">cod_producto<span class='font-black font-bold'>&#124;</span>codigo_barra<span class='font-black font-bold'>&#124;</span>cod_upcean<span class='font-black font-bold'>&#124;</span>cod_categoria<span class='font-black font-bold'>&#124;</span>cod_subcategoria<span class='font-black font-bold'>&#124;</span>nom_producto<span class='font-black font-bold'>&#124;</span>pro_brevedato<span class='font-black font-bold'>&#124;</span>datos_producto<span class='font-black font-bold'>&#124;</span>cod_proveedor<span class='font-black font-bold'>&#124;</span>paisorigen<span class='font-black font-bold'>&#124;</span>brand_marca<span class='font-black font-bold'>&#124;</span>precio1_producto<span class='font-black font-bold'>&#124;</span>precio2_producto<span class='font-black font-bold'>&#124;</span>precio3_producto<span class='font-black font-bold'>&#124;</span>precio4_producto<span class='font-black font-bold'>&#124;</span>nom_unidad<span class='font-black font-bold'>&#124;</span>empaque<span class='font-black font-bold'>&#124;</span>foto_producto<span class='font-black font-bold'>&#124;</span>activo</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p5')">copiar</a>
             <br>Codigo Producto
             <br>Codigo Barra
             <br>Codigo UPCEAN
             <br>Codigo Categoria
             <br>Codigo Sub Categoria
             <br>Nombre del Producto
             <br>Breve Datos
             <br>Datos del Producto
             <br>Codigo Proveedor
             <br>Pais de Origen
             <br>Brand_Marca
             <br>Precio1_Detal
             <br>Precio2_Mayor
             <br>Precio3_SuperMayor
             <br>Precio4_Especial
             <br>Nombre de Unidad (BUL)
             <br>Empaque
             <br>Foto_Producto
             <br>Activo <strong style='color:red;font-size:10px;'>nuevo</strong>
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data Productos Simple -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importProSimple.php' target='data2'>importData-ProSimple</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Import Data to Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> pro-simple.csv</p>
             <?php
              if(file_exists("../docs/pro-simple.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p6">codigo_barra<span class='font-black font-bold'>&#124;</span>nom_producto<span class='font-black font-bold'>&#124;</span>precio1_producto<span class='font-black font-bold'>&#124;</span>precio2_producto<span class='font-black font-bold'>&#124;</span>precio3_producto<span class='font-black font-bold'>&#124;</span>precio4_producto             <span class='font-black font-bold'>&#124;</span>nom_unidad<span class='font-black font-bold'>&#124;</span>empaque<span class='font-black font-bold'>&#124;</span>activo</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p6')">copiar</a>
             <br>Codigo Barra
             <br>Nombre del Producto
             <br>Precio1_Detal
             <br>Precio2_Mayor
             <br>Precio3_SuperMayor
             <br>Stock Actual
             <br>Empaque
             <br>Activo <strong style='color:red;font-size:10px;'>nuevo</strong>
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data Productos Simple con Existencia -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importProSimple2.php' target='data2'>importData-ProSimple2</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Import Data to Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> pro-simple2.csv</p>
             <?php
              if(file_exists("../docs/pro-simple2.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p6">codigo_barra<span class='font-black font-bold'>&#124;</span>nom_producto<span class='font-black font-bold'>&#124;</span>precio1_producto<span class='font-black font-bold'>&#124;</span>precio2_producto<span class='font-black font-bold'>&#124;</span>precio3_producto<span class='font-black font-bold'>&#124;</span>precio4_producto             <span class='font-black font-bold'>&#124;</span>nom_unidad<span class='font-black font-bold'>&#124;</span>empaque<span class='font-black font-bold'>&#124;</span>activo</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p7')">copiar</a>
             <br>Codigo Barra
             <br>Nombre del Producto
             <br>Precio1_Detal
             <br>Precio2_Mayor
             <br>Precio3_SuperMayor
             <br>Precio4_Especial
             <br>Exitencia
             <br>Empaque
           </div>
         </div>
       </td>
      </tr>


<!-- Import Data fom Productos Limpios 1 -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='comparaProLimpio.php' target='data2'>Compare Data Produtos-ProductosLimpio</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Compara Productos - ProductosLimpio
           </div>
           <div class="content">
            Compara los Productos con la Tabla de ProductosLimpio
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data fom Productos Limpios Codigos -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui blue button' href='comparaLimpioPro1.php' target='data2'>Compare Data ProductosLimpio con Productos x Codigo</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Compara ProductosLimpio - Productos por Codigo
           </div>
           <div class="content">
            Compara la Tabla de ProductosLimpio con la Tabla de Productos por Codigo.
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data fom Productos Limpios Nombres -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui blue button' href='comparaLimpioPro2.php' target='data2'>Compare Data ProductosLimpio con Productos x Nombre</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Compara ProductosLimpio - Productos por Nombre
           </div>
           <div class="content">
            Compara la Tabla de ProductosLimpio con la Tabla de Productos por Nombre.
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data fom Productos Limpios Nombres -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui red button' href='comparaLimpioPro3.php' target='data2'>Compare New Table - Productos x Nombre</a></td>
       <td  style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Compara ProductosLimpio - Productos por Nombre
           </div>
           <div class="content">
            Compara la Tabla de ProductosLimpio con la Tabla de Productos por Nombre.
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data fom Productos Limpios Nombres -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui red button' href='checkComparaLimpioPro3.php' target='data2'>CheckCompare New Table - Productos x Nombre</a></td>
       <td  style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Revisa - Compara ProductosLimpio - Productos por Nombre
           </div>
           <div class="content">
            Revisa Compara la Tabla de ProductosLimpio con la Tabla de Productos por Nombre.
           </div>
         </div>
       </td>
      </tr>


<!-- Unir Data Solo Precios -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui  blue button' href='importSoloPrecios2.php' target='data2'>Actualiza Solo Precios2</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Actualiza Solo los Precios  (Paso 2)
           </div>
           <div class="content">
             <p>Actualiza Precios Despues de Importar Datos de Precios</p>

             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p6">codigo_barra<span class='font-black font-bold'>&#124;</span>nom_producto<span class='font-black font-bold'>&#124;</span>precio1_producto<span class='font-black font-bold'>&#124;</span>precio2_producto<span class='font-black font-bold'>&#124;</span>precio3_producto<span class='font-black font-bold'>&#124;</span>precio4_producto             <span class='font-black font-bold'>&#124;</span>nom_unidad<span class='font-black font-bold'>&#124;</span>empaque<span class='font-black font-bold'>&#124;</span>activo</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p8')">copiar</a>
             <br>Codigo Barra
             <br>Nombre del Producto
             <br>Precio1_Detal
             <br>Precio2_Mayor
             <br>Precio3_SuperMayor
             <br>Precio4_Especial
           </div>
         </div>
       </td>
      </tr>
      </tr>

<!-- Unir Data Solo Precios -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui  yellow button' href='importSoloPrecios3.php' target='data2'>Actualiza Solo Precios3</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Actualiza Solo los Precios  (Paso 3)
           </div>
           <div class="content">
             <p>Actualiza Precios Despues de Importar Datos de Precios</p>

             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p6">codigo_barra<span class='font-black font-bold'>&#124;</span>precio1_producto<span class='font-black font-bold'>&#124;</span>precio2_producto<span class='font-black font-bold'>&#124;</span>precio3_producto<span class='font-black font-bold'>&#124;</span>precio4_producto             <span class='font-black font-bold'>&#124;</span>nom_unidad<span class='font-black font-bold'>&#124;</span>empaque<span class='font-black font-bold'>&#124;</span>activo</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p9')">copiar</a>
             <br>Codigo Barra
             <br>Precio1_Detal
             <br>Precio2_Mayor
             <br>Precio3_SuperMayor
             <br>Precio4_Especial

           </div>
         </div>
       </td>
      </tr>

<!-- Unir Data Solo Precios -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui  green button' href='importSoloNombre.php' target='data2'>Actualiza Solo Nombre</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             Actualiza Solo los Nombres
           </div>
           <div class="content">
             <p>Actualiza Nombres</p>

             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p91">codigo_barra<span class='font-black font-bold'>&#124;</span>nom_producto</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p91')">copiar</a>
             <br>Codigo Barra
             <br>Nombre Producto
           </div>
         </div>
       </td>
      </tr>


<!-- Import Data Fotos -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Fotos.php' target='data2'>importData-Fotos</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Fotos to Products
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-foto.csv</p>
             <?php
              if(file_exists("../docs/productos-foto.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red'>Codigo_Producto<span class='font-black font-bold'>&#124;</span>Foto</p>
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data Fotos Simple -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Fotos2.php' target='data2'>importData-FotosSimple</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Fotos to Products  - Solo Foto
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> pro-fotos.csv</p>
             <?php
              if(file_exists("../docs/pro-fotos.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red'>Codigo_Barra<span class='font-black font-bold'>&#124;</span>Foto</p>
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data Precios -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Precios.php' target='data2'>importData-Precios</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Precios de los Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-precios.csv</p>
             <?php
              if(file_exists("../docs/productos-precios.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p9">Codigo_Producto<span class='font-black font-bold'>&#124;</span>PrecioDetal<span class='font-black font-bold'>&#124;</span>PrecioMayorista<span class='font-black font-bold'>&#124;</span>Gran Mayorista<span class='font-black font-bold'>&#124;</span>Especial</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p10')">copiar</a>
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data Empaques -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Empaques-Simple.php' target='data2'>importData-Empaques-Simple</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Empaques Simple de los Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-empaques-simple.csv</p>
             <?php
              if(file_exists("../docs/productos-empaques-simple.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p8">Codigo_Producto<span class='font-black font-bold'>&#124;</span>Empaque</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p11')">copiar</a>
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data Empaques -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Empaques.php' target='data2'>importData-Empaques</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Empaques de los Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-empaques.csv</p>
             <?php
              if(file_exists("../docs/productos-empaques.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos a Importar</p>
             <p class='font-red' id="p8">Codigo_Producto<span class='font-black font-bold'>&#124;</span>NombreProducto<span class='font-black font-bold'>&#124;</span>Unidad<span class='font-black font-bold'>&#124;</span>Empaque</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p12')">copiar</a>
           </div>
         </div>
       </td>
      </tr>
<!-- Import Data Favoritos -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Favoritos.php' target='data2'>importData-Favoritos</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Data Productos Favoritos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-favoritos.csv</p>
             <?php
              if(file_exists("../docs/productos-favoritos.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos Favoritos</p>
             <p class='font-red'>Codigo_Producto</p>
           </div>
         </div>
       </td>
      </tr>

<!-- Import Data Existencia -->
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='importData-Stock.php' target='data2'>importData-Existencia</a></td>
       <td style="background-color:#ffffff;color:#000000;">
         <div class="ui accordion">
           <div class="title">
             <i class="dropdown icon"></i>
             import Stock de Existencia de los Productos
           </div>
           <div class="content">
             <p class="font-red"><b>Nombre Archivo:</b> productos-stock.csv</p>
             <?php
              if(file_exists("../docs/productos-stock.csv")) {
               echo "<p class='font-blue font-bold'>El Archivo Existe</p>";
              }
              else
              {
               echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
              }
             ?>
             <p>Estructura de los Datos Existencia</p>
             <p class='font-red' id="p9">Codigo_Barra<span class='font-black font-bold'>&#124;</span>Stock</p>
             <a class='tiny ui purple button' onclick="copyToClipboard('#p13')">copiar</a>
           </div>
         </div>
       </td>
      </tr>


<!-- ******************************  -->
<!-- Check Data                      -->
<!-- ******************************  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Check Data  - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='blank.php?fileToRun=CheckProPrice' target='data2'>CheckPrice</a></td>
       <td>Revisa los Precios - Muestra si Detal es Menor a Mayor o si Super Mayor es mayor a Mayor
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='blank.php?fileToRun=CheckProRepetidoCod' target='data2'>CheckProRepetidoCod</a></td>
       <td>Check Productos y indica si hay datos Repetidos por Codigo de Producto</td>
      </tr>

      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='blank.php?fileToRun=CheckProRepetidoCodBarra' target='data2'>CheckProRepetidoCodBarra</a></td>
       <td>Check Productos y indica si hay datos Repetidos por Codigo de Barra</td>
      </tr>

      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='blank.php?fileToRun=CheckProdRepetido0' target='data2'>CheckProRepetido0</a></td>
       <td>Check Productos y indica si el Codigo de Barra empieza con 0 y borra los Repetidos.</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='CheckProdCodigos.php' target='data2'>CheckCodigoBarra</a></td>
       <td>Check Productos y indica si el Codigo de Producto es igual al Codigo de Barra</td>
      </tr>
<!-- ******************************  -->
<!-- Find Data                       -->
<!-- ******************************  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Find Data  - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='ProdSinPrecio.php' target='data2'>ProdSinPrecios</a></td>
       <td>Products Sin Ningun Precio</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='ProdSinCat.php' target='data2'>ProdSinCat</a></td>
       <td>Products Sin Category</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='ProdSinSubCat.php' target='data2'>ProdSinSubCat</a></td>
       <td>Productos Sin Sub-Category</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid  ui pink button' href='ProdCatSeleccione.php' target='data2'>ProdCatSeleccione</a></td>
       <td>Products con la Category y Sub-Category que dice Seleccione</td>
      </tr>

<!-- ******************************  -->
<!-- Exportar                       -->
<!-- ******************************  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Exportar Datos  - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
        <td style="width:240px;vertical-align:top;">
            <?php echo "<a class='fluid  ui pink button' href='producto-export1.php' target='data2'>Exportar Productos</a>"; ?>
        </td>
        <td>
            Exportar a Excel los Productos que esten en la base de datos.
        </td>
      </tr>
<!-- Change Data  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Update Clientes/Usuarios  - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;">
          <?php echo "<a class='fluid  ui pink button' href='clientes-clave.php' target='data2'>Agrega Clave a Clientes</a>"; ?>
       </td>
       <td>
          Agrega una Clave a los Clientes sin clave, para eso se utiliza los 6 ultimos numeros del rif.
       </td>
      </tr>
<!-- Importar Cliente  -->
      <tr>
         <td style="width:240px;vertical-align:top;">
            <?php echo "<a class='fluid  ui pink button' href='importClientes.php' target='data2'>Importar Clientes</a>"; ?>
         </td>
         <td style="background-color:#ffffff;color:#000000;">
            <div class="ui accordion">
              <div class="title">
                <i class="dropdown icon"></i>
                Importar Clientes nuevos.
              </div>
              <div class="content">
                <p>Estructura de los Datos a Importar</p>
                <p class='font-red'>Nombre<span class='font-black font-bold'>&#124;</span>RIFoCedula<span class='font-black font-bold'>&#124;</span>Direccion<span class='font-black font-bold'>&#124;</span>Telefono1<span class='font-black font-bold'>&#124;</span>Telefono2<span class='font-black font-bold'>&#124;</span>Vendedor</p>
              </div>
            </div>
         </td>
      </tr>
<!-- Borrar Data  -->
      <tr>
       <td style="width:240px;vertical-align:top;">
          <?php echo "<a class='fluid  ui pink button' href='usuarios-del.php' target='data2'>Usuarios sin Cedula</a>"; ?>
       </td>
       <td>
         Borrar todos los usuarios que no tiene los datos de la cedula.
       </td>
      </tr>

<!-- Imagenes Data  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Imagenes - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='blank.php?fileToRun=fotosEnDiscoNoDataDase' target='data2'>FotosEnDiscoNoDataDase</a></td>
       <td><span class='font-red'>Primero</span> Busca Images en Disco que no esta en la Base de Datos de Productos</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='blank.php?fileToRun=FindImagesNotDataBase' target='data2'>FindImagesNotDataBase</a></td>
       <td><span class='font-red'>Segundo</span> Muestra Images que estan en Disco pero no esta en la Base de Datos de Productos</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='blank.php?fileToRun=FindImagesNotOnDisk1' target='data2'>FindImagesNotOnDisk</a></td>
       <td><span class='font-red'>Tercero</span> No aparece las imagenes en disco. </td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='blank.php?fileToRun=AllImagesOnDisk' target='data2'>AllImagesOnDisk</a></td>
       <td><span class='font-red'>Cuarto</span> Listado de todas las imagenes en disco. </td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' blank.php?fileToRun=BorraImagenesNoExiste' target='data2'>BorraImagenesNoExiste</a></td>
       <td>Borra las Imagenes de Disco que no existe en la Base de Datos.</td>
      </tr>
      <tr>
       <td><a class='fluid ui pink button' href='blank.php?fileToRun=copyRenameProductosFotos' target='data2'>CopyRenameProductosFotos</a></td>
       <td>Revisa Copia y Cambia el Nombre de los Productos Fotos</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='blank.php?fileToRun=FindImagesNotDataBase2' target='data2'>FindImagesNotDataBase2</a></td>
       <td>ERASE Images Not in the productos DataBase 2</td>
      </tr>
<!-- System Data  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>/Envios /Marcas - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='ZonadeEnvios.php' target='data2'>ZonadeEnvios</a></td>
       <td>Ver o cambiar precios de Zona de Envios</td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='MarcasProductos.php' target='data2'>MarcasProductos</a></td>
       <td>Ver o cambiar las Marcas de los Productos</td>
      </tr>
<!-- Soporte  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Soporte - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='reparardatos.php' target='data2'>RepararDatos</a></td>
       <td>Reparar Base de Datos</td>
      </tr>
<!-- Import usuarios  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>ImportUsuarios - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='importNewUsuarios.php' target='data2'>ImportNewUsers</a></td>
       <td>Importar Usarios de la Table de Clientes</td>
      </tr>
<!-- Last Minute  -->
      <tr>
        <td style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;" colspan="2"><p>Ultimos Cambios - <span class='font-8'>Debe esperar unos segundos para que empieza la operacion</span></p></td>
      </tr>
      <tr>
       <td style="width:240px;vertical-align:top;"><a class='fluid ui pink button' href='imageRemovePuntos.php' target='data2'>RemoverPuntos</a></td>
       <td>Quitar de las Imagenes los puntos Extras ejm: nombre...jpg</td>
      </tr>

 <tbody>
</table>

<br><br>
<?php
$showStatus="N";
$endPage="N";
include("../includes/statusAdmin.php");
?>

<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>

</body>
</html>
