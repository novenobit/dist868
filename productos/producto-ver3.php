<?php
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(!isset($modalId))
{ $modalId=""; }
if(isset($id) and $id<>"")
{
 echo "<div class='ui grid'>
  <div class='sixteen wide column'>";

     $title="Ficha del Producto";
   //-----------------------------------------------
     include("$dirRoot"."bots/bot-productos.php");
     if(!isset($proData) or empty($proData))
     {
      $error="Hay en Error en Los Datos<br>Prueba con otro Producto o Revisa que la Tabla existe y este este bien...";
      error();
      exit();
     }
     $findCategoria="S";
     include("$dirRoot"."datafiles/proData.php");
     //-----------------------------------------------
     //include("$dirRoot"."bots/bot-categoria.php");
     //include("$dirRoot"."datafiles/catData.php");
     //include("$dirRoot"."bots/bot-subcategoria.php");
     //include("$dirRoot"."datafiles/subCatData.php");
     //-----------------------------------------------
    echo "<img class='ui small left floated image' src='$dirRoot"."imagenes/productos/$fotoPro'>";

       if($codigo_barra<>"")
       { echo "<b>C&oacute;digo Barra</b>: ".$codigo_barra.""; }
       else
       { echo "<b>C&oacute;digo</b>: ".$proData['cod_producto'].""; }
       echo "<br><b>Categor&iacute;a</b>: ".$nom_categoria."";
       if(isset($nom_subcategoria))
       { echo "<br><b>Sub-Categor&iacute;a</b>: ".$nom_subcategoria.""; }
       if($brand_marca<>"")
       { echo "<br><b>Marca</b>: ". $proData['brand_marca'].""; }
       if($nom_unidad<>"")
       { echo "<br><b>Unidad/Medida</b>: ". $proData['nom_unidad'].""; }
       if($empaque<>"")
       { echo "<br><b>Empaque</b>: $empaque"; }

       if($stock_actual>0)
       { echo "<br><b>Stock</b>: $stock_actual"; }

       //if($fisico<>"")
       //{ echo "<br><b>Fisico</b>: $fisico"; }
       //if($tamano>0)
       //{ echo "<br><b>Tamano</b>: $tamano"; }
       //if($peso>0)
       //{ echo "<br><b>Peso</b>: $peso"; }
       //if($bultos<>"")
       //{ echo "<br><b>Bultos</b>: $bultos"; }

       if($cod_proveedor<>"")
       { echo "<br><b>Proveedor</b>: $cod_proveedor"; }
       if($paisorigen<>"")
       { echo "<br><b>Pais Origen</b>: $paisorigen"; }
       if($precio_compra>0)
       {
         echo "<br><b>Precio Compra</b>: ". number_format($precio_compra,2,',', '.') . "";
       }
       if($precio1_producto>0)
       {
         echo "<br><b>Precio Detal</b>: ". number_format($precio1_producto,2,',', '.') . "";
       }
       if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
       {
         if($precio2_producto>0)
         {
           echo "<br><b>Precio Mayor</b>: ". number_format($precio2_producto,2,',', '.') . "";

         }
       }
       if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
       {
         if($precio3_producto>0)
         {
           echo "<br><b>Precio Gran Mayorista</b>: ". number_format($precio3_producto,2,',', '.') . "";
           echo "<br>Cambiar Precio Gran Mayorista $cambia_precio";
         }
       }
       if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
       {
         if($proData['precio4_producto']>0)
         {
           echo "<br><b>Precio Especial</b>: ". number_format($proData['precio4_producto'],2,',', '.') . "";
         }
       }
       if($pro_brevedato<>"")
       {
         echo "<br><b>Breve Datos</b>: $pro_brevedato";
       }
       if($datos_producto<>"")
       {
         echo "<br><b>Descripci&oacute;n</b>: ".$proData['datos_producto']."";
       }
       if($submitted<>"")
       {
         echo "<br><b>Publicado</b>: ".$proData['submitted']."";
       }

       if($estado=="" or $estado==1)
       { $Testado="Disponible"; }
       else
       { $Testado="No Disponible"; }
       echo "<br><b>Estado</b>: $Testado";
       echo "<br><b>Activo</b>: $activo";
     ?>
    </div>
    <div class='eight wide column'>
    <?php
    if($activo=="S")
    {
      echo "<a class='ui primary basic button' href='producto-activar.php?id=$id&op=N'>Des-Activar</a>";
    }
    if($activo=="N" or $activo=="")
    {
      echo "<a class='ui secondary button' href='producto-activar.php?id=$id&op=S'>Activar</a>";
    }
   ?>
   </div>
    <div class='eight wide column'>
    <?php
      //      <option value="1">Disponible</option>
      //      <option value="2">No Disponible</option>
      //      <option value="3">Queda Poco</option>
      //      <option value="4">Obsoleto</option>
      //      <option value="5">Borrar del Sistema</option>
    if($estado=="" or $estado==1)
    {
      echo "<a class='ui primary basic button' href='producto-estado2.php?id=$id&estado=2'>noDisponible</a>";
    }
    if($estado>1)
    {
      echo "<a class='ui secondary button' href='producto-estado2.php?id=$id&estado=1'>Disponible</a>";
    }
   ?>
   </div>

 </div>
 <div class="ui hidden divider"></div>

<?php
}
?>
