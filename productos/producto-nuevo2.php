<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo2.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

// Variables 2
FechayHora();
$testData="N";
if(isset($_POST['cod_producto']))
{ $cod_producto="$_POST[cod_producto]"; }
if(isset($_POST['codigo_barra']))
{ $codigo_barra="$_POST[codigo_barra]"; }
if(isset($_POST['cod_upcean']))
{ $cod_upcean="$_POST[cod_upcean]"; }
if(isset($_POST['cod_categoria']))
{ $cod_categoria="$_POST[cod_categoria]"; }
$cod_subcategoria="";
if(isset($_POST['cod_subcategoria']))
{ $cod_subcategoria="$_POST[cod_subcategoria]"; }

if(isset($_POST['nom_producto']))
{ $nom_producto="$_POST[nom_producto]"; }
if(isset($_POST['pro_brevedato']))
{ $pro_brevedato="$_POST[pro_brevedato]"; }
if(isset($_POST['datos_producto']))
{ $datos_producto="$_POST[datos_producto]"; }
if(isset($_POST['cod_proveedor']))
{ $cod_proveedor="$_POST[cod_proveedor]"; }
if(isset($_POST['paisorigen']))
{ $paisorigen="$_POST[paisorigen]"; }
if(isset($_POST['id_pais']))
{ $paisorigen="$_POST[id_pais]"; }

if(isset($_POST['brand_marca']))
{ $brand_marca="$_POST[brand_marca]"; }

$precio_compra=0;
$precio1_producto=0;
$precio2_producto=0;
$precio3_producto=0;
$precio4_producto=0;

if(isset($_POST['precio_compra']))
{ $precio_compra="$_POST[precio_compra]"; }
if(isset($_POST['precio1_producto']))
{ $precio1_producto="$_POST[precio1_producto]"; }
if(isset($_POST['precio2_producto']))
{ $precio2_producto="$_POST[precio2_producto]"; }
if(isset($_POST['precio3_producto']))
{ $precio3_producto="$_POST[precio3_producto]"; }
if(isset($_POST['precio4_producto']))
{ $precio4_producto="$_POST[precio4_producto]"; }
if(isset($_POST['nom_unidad']))
{ $nom_unidad="$_POST[nom_unidad]"; }
if(isset($_POST['empaque']))
{ $empaque="$_POST[empaque]"; }
if(isset($_POST['stock_actual']))
{ $stock_actual="$_POST[stock_actual]"; }

//if(isset($_POST['fisico']))
//{ $fisico="$_POST[fisico]"; }
//if(isset($_POST['tamano']))
//{ $tamano="$_POST[tamano]"; }
//if(isset($_POST['peso']))
//{ $peso="$_POST[peso]"; }
//if(isset($_POST['bultos']))
//{ $bultos="$_POST[bultos]"; }

// -------------------------
$ok="S";
$todoBien="N";
$tchas=strlen($nom_producto);

if(!isset($nom_producto) or $nom_producto=="")
{ $error="falta el Nombre del Producto";
 error();
 exit();
 $ok="N";
}

if(!isset($cod_categoria) or $cod_categoria=="")
{ $error="falta datos de la Categoria";
 error();
 exit();
 $ok="N";
}

if(!isset($cod_subcategoria) or $cod_subcategoria=="")
{ $error="falta datos de la Sub Categoria";
 error();
 exit();
 $ok="N";
}

if($tchas <= 2)
{ $error="falta algunos datos, Nombre muy corto";
 error();
 exit();
 $ok="N";
}

if(!isset($precio1_producto) or $precio1_producto=="" or $precio1_producto==0)
{ $error="falta los datos del Precio";
  error();
  exit();
  $ok="N";
}

if( isset($codigo_barra) and $codigo_barra<>"")
{
 //$nom_product=utf8_encode($nom_product);
 // echo "$nom_producto<br>select id_producto from productos where nom_producto='$nom_producto'";
 $result1=mysqli_query($conex1,"select id_producto from productos where codigo_barra='$codigo_barra'");
 $num_filas1=mysqli_num_rows($result1);
 if($num_filas1>0)
 { $error="un producto con este Codigo: $codigo_barra ya fue publicado";
   error();
   exit(); }
}
if( isset($cod_upcean) and $cod_upcean<>"")
{
 //$nom_product=utf8_encode($nom_product);
 // echo "$nom_producto<br>select id_producto from productos where nom_producto='$nom_producto'";
 $result1=mysqli_query($conex1,"select id_producto from productos where cod_upcean='$cod_upcean'");
 $num_filas1=mysqli_num_rows($result1);
 if($num_filas1>0)
 { $error="un producto con este Codigo IPC/EAN: $cod_upcean ya fue publicado";
   error();
   exit(); }
}

if($ok=="S" and isset($nom_producto) and $nom_producto<>"")
{
 //$nom_product=utf8_encode($nom_product);
 // echo "$nom_producto<br>select id_producto from productos where nom_producto='$nom_producto'";
 //$result1=mysqli_query($conex1,"select id_producto from productos where nom_producto='$nom_producto'");
 //$num_filas1=mysqli_num_rows($result1);
 if($num_filas1>0)
 { $error="un producto con este nombre ya fue publicado";
   error();
   exit();
 }
 else
 {
  //New_Codigo_Productos();
  if($codigo_barra=="")
  {
   if(!isset($cod_subcategoria))
   { $cod_subcategoria=$cod_categoria; }
   include("$dirRoot"."bots/New_Codigo_Productos.php");
   if(!empty($cod_producto))
   {
    $query2="select id_producto from productos where cod_producto='$cod_producto'";
    $result2=mysqli_query($conex1,$query2);
    $num_filas2=mysqli_num_rows($result2);
    if($num_filas2>0)
    { $cod_producto=$cod_producto+20; }
   }
  }

// ---------------------------------------------------

 if($testData=="S")
 {
    echo "<br>here1 xxx  Divisa $precio1_producto / Divisa $precioDolarVenta";
    echo "<br>here1 xxx  Base $precioPlatoBase / ConIva $precioPlatoConIva / Sin Iva  $precioPlatoSinIva";
    echo "<br>here1 xxx  $precio1_producto / $precioEnDolar";
 }

// ---------------------------------------------------

   $nom_producto=ucwords(strtolower(rtrim($nom_producto)));
   $textoremove=rtrim($nom_producto);
   include("$dirRoot"."bots/Remove_Simbols.php");
   $nom_producto=$textoremove;
   if(isset($id_unidad) and $id_unidad<>"")
   {
    $sqlUni=mysqli_query($conex1, "select nom_unidad from unidades where id_unidad='$id_unidad'");
    $unidades=mysqli_fetch_array($sqlUni);
    $nom_unidad=$unidades['nom_unidad'];
   }
   //else
   //{ $nom_unidad=""; }
   //echo "<br>1 $cod_producto  <br>2 $cod_categoria  <br>3 $cod_subcategoria  <br>4 $nom_producto  <br>5 $datos_producto  <br>6 $precio1_producto  <br>7 $precio_compra  <br>8 $ultimo_costo  <br>9 $costo_promedio  <br>0 $stock_actual  <br>1 $unidad_medida  <br>11 $bultos_producto <br>2 $minima  <br>3 $maxima  <br>4 $filename";

// ----------------------------------------------
    include("../datafiles/fotoProductos.php");
    include("../datafiles/insertProductos.php");
// end Foto ------------------------
// insert data here

//  echo "<br>1 $cod_producto  <br>2 $cod_categoria  <br>3 $cod_subcategoria  <br>4 $nom_producto  <br>5 $datos_producto  <br>6 $precio1_producto  <br>7 $precio_compra  <br>1 $nom_unidad  <br>11 $bultos  <br>4 $filename / $foto_producto";
 }
}
else
{
      $boxColorH="cardColor";
      $boxTitle="Nada Aqu&iacute;";
      $boxData="<p>Error en Los Datos .....</p>";
      $boxColor="white";
      $boxFoot="";
      $boxColorF="";
      include("$dirRoot"."data/boxData.php");
      exit();
}

// echo "<br>1 $cod_producto  <br>2 $cod_categoria  <br>3 $cod_subcategoria  <br>4 $nom_producto  <br>5 $datos_producto  <br>6 $precio1_producto  <br>7 $precio_compra  <br>8 $ultimo_costo  <br>9 $costo_promedio  <br>0 $stock_actual  <br>1 $unidad_medida  <br>11 $bultos_producto <br>2 $minima  <br>3 $maxima  <br>4 $filename";

$numFilas=0;
$result1=mysqli_query($conex1,"select id_producto from productos where codigo_barra='$codigo_barra'");
$numFilas=mysqli_num_rows($result1);
if($numFilas>0)
{
?>
 <div class="container">
  <h1>Listo</h1>
  <div>
    <p>Los Datos Fueron Agregados a la Base de Datos</p>
  </div>
 </div>
 <p><br></br></p>
<?php
  echo "<html><meta http-equiv=refresh content=1;url=producto-nuevo1.php>";
}

function floatvalue($val){
            $val = str_replace(",",".",$val);
            $val = preg_replace('/\.(?=.*\.)/', '', $val);
            return floatval($val);
}
?>
