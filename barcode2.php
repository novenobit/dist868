<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo2.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("./includes/session.php");
$dirRoot="./";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libFindData.php");
include_once("$dirRoot"."libs1/libGeneral.php");
// Variables 2
if(isset($_GET['buscar']))
{ $codigo_barra="$_GET[buscar]"; }
if(isset($_POST['buscar']))
{ $codigo_barra="$_POST[buscar]"; }
if(isset($_POST['codigo_barra']))
{ $codigo_barra="$_POST[codigo_barra]"; }

$codigo_barra=trim($codigo_barra);

$title="Ficha del Producto";
//echo "<br> $codigo_barra";
if(!isset($codigo_barra) or empty($codigo_barra))
{
 $error="Hay en Error en Los Datos<br>Prueba con otro Producto o Revisa que la Tabla existe y este este bien...";
 error();
 echo "<html><meta http-equiv=refresh content=3;url=barcode1.php>";
 exit();
}
include("./bots/bot-productos.php");
if(!isset($proData) or $proData=="")
{
 $error="No Existe Este Producto<br>Prueba con otro Producto...";
 error();
 echo "<html><meta http-equiv=refresh content=3;url=barcode1.php>";
 exit();
}
if(isset($proData))
{
   include("$dirRoot"."datafiles/proData.php");
   //-----------------------------------------------
   include("$dirRoot"."bots/bot-categoria.php");
   include("$dirRoot"."datafiles/catData.php");
   include("$dirRoot"."bots/bot-subcategoria.php");
   include("$dirRoot"."datafiles/subCatData.php");
   //-----------------------------------------------
?>

    <div class="ui grid">
      <div class="sixteen wide column">
       <div class="ui positive message">
        <div class="ui breadcrumb">
         <a class='section' href='#'>Productos</a>
         <i class='right angle icon divider'></i>
          <?php echo "<a class='section' href='vercat1.php?codCat=$cod_categoria'>$nom_categoria</a>"; ?>
          <i class='right angle icon divider'></i>
          <?php echo "<a class='section' href='vercat-foto2.php?codSubCat=$cod_subcategoria'>$nom_subcategoria</a>"; ?>
          <i class='right angle icon divider'></i>
         <?php echo "<a class='section'>$nom_producto</a>"; ?>
        </div>
       </div>
      </div>
    </div>

<style>
.price {
 font-size: 2.5rem; font-weight: 500;
 color: #FF0080;
}
</style>

<div class="ui segment">
   <div class="ui centered grid">
      <div class="sixteen wide tablet eight wide computer column">
        <?php echo "<img class='ui large image' src='$dirRoot"."imagenes/productos/$fotoPro'>"; ?>
      </div>
      <div class="sixteen wide tablet eight wide computer column">
        <div class="ui header red big text"><?php echo $nom_producto; ?></div>
     <div class="ui visible message">
         <p>
         <?php
           if(isset($id_producto) and $id_producto<>"")
           { echo "<br>ID: $id_producto"; }
           if($proData['codigo_barra']<>"")
           { echo "<br>C&oacute;digo Barra: ".$proData['codigo_barra'].""; }
           else
           { echo "<br>C&oacute;digo: ".$proData['cod_producto'].""; }
           echo "<br>Categor&iacute;a: ".$nom_categoria."";
           echo "<br>Sub-Categor&iacute;a: ".$nom_subcategoria."";
           if($brand_marca<>"")
           { echo "<br>Marca: ". $proData['brand_marca'].""; }
           if($nom_unidad<>"")
           { echo "<br>Unidad/Medida: ". $proData['nom_unidad'].""; }
           if($empaque<>"")
           { echo "<br>Empaque: $empaque"; }
           //if($fisico<>"")
           //{ echo "<br>Fisico: $fisico"; }
           //if($tamano>0)
           //{ echo "<br>Tamano: $tamano"; }
           //if($peso>0)
           //{ echo "<br>Peso: $peso"; }
           //if($bultos<>"")
           //{ echo "<br>Bultos: $bultos"; }

           if($cod_proveedor<>"")
           { echo "<br>Proveedor: $cod_proveedor"; }
           if($paisorigen<>"")
           { echo "<br>Pais Origen: $paisorigen"; }
           if($pro_brevedato<>"")
           {
              echo "<br>Breve Datos: $pro_brevedato";
           }
           if($datos_producto<>"")
           {
              echo "<br>Descripci&oacute;n: ".$proData['datos_producto']."";
           }
           if($submitted<>"")
           {
              echo "<br>Publicado: ".$proData['submitted']."";
           }
           if($precio_compra>0)
           {
            // echo "<br>Precio Compra ". number_format($precio_compra,2,',', '.') . "";
           }

           if($precio1_producto>0)
           {
            echo "<p>Ref: <span class='price'>". number_format($proData['precio1_producto'],2,',', '.') . "</span></p>";
           }
           if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
           {
            if($precio2_producto>0)
            {
             echo "<p>Precio Mayor ". number_format($proData['precio2_producto'],2,',', '.') . "</p>";
            }
           }

           if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
           {
            if($proData['precio3_producto']>0)
            {
             echo "<p>Precio Especial ". number_format($proData['precio3_producto'],2,',', '.') . "</p>";
            }
           }
           if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
           {
            if($proData['precio4_producto']>0)
            {
             echo "<p>Precio Gran Mayorista ". number_format($proData['precio4_producto'],2,',', '.') . "</p>";
            }
           }

          ?>
         </p>
        </div>

    </div>
    </div>
 </div>
</div>
<div class="ui hidden divider"></div>

<style>
.countDown {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>

<span class='countDown' id="countdown"></span>
<script>
var timeleft = 11;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Listo";
  } else {
    document.getElementById("countdown").innerHTML = timeleft + "";
  }
  timeleft -= 1;
}, 1000);
</script>

<?php
  echo "<html><meta http-equiv=refresh content=12;url=barcode1.php>";
  exit();
}
?>
