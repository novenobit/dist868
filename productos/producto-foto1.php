<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-edit1.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$loadPage="S";
$popup="S";
$table="S";
$tabs="S";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
//-------------------------------------------
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
//-------------------------------------------
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
$todoBien="N";
$num=0;
$ves=1;
$title="Ficha del Producto";
?>

<h3 class="ui header">Cambiar la Imagen del Producto</h3>
<?php
if(!isset($id))
{
     $error="error en los datos";
     error();
     exit();
}
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
$title="Edita (cod: $cod_producto)";
//include("productos-top2.php");
// ----------------------------------------------
// echo "<form class='ui form' action='producto-edit2.php?op=edt&id=$id' method='POST'>";
?>
<div class="ui horizontal fluid basic card">
 <div class="ui grid">
  <?php
    if($proData['foto_producto']<>"")
    {
  ?>
     <div class="sixteen wide column">
        <?php echo "<img class='ui image' src='$dirRoot"."imagenes/productos/$fotoPro'>"; ?>
     </div>
  <?php
    }
  ?>
  <div class="sixteen wide column">
   <?php
    if(!isset($nom_subcategoria))
    { $nom_subcategoria="sin-datos"; }
    echo "<p>".$cod_producto."</p>";
    echo "<p>Categor&iacute;a: ".$nom_categoria."</p>";
    echo "<p>Sub-Categor&iacute;a: ".$nom_subcategoria."</p>";
    echo "<p>Unidad/Medida: ". $nom_unidad."</p>";
   ?>
  <div class="ui hidden divider"></div>
  <?php echo "<form class='ui form' action='producto-foto2.php?op=add&id=$id' method='post' enctype='multipart/form-data'>"; ?>
    <div class="ui grid">
      <div class='sixteen wide column'>
        <label>Selecciona la Foto/Imagen</label>
        <input type='file' class='ui input' name='foto_producto' style='color:blue'>
        <p style='color:red'>Tamano del Imagen debe ser igual la altura y el ancho. Ejm: 400x400 px
        <br>Tipo de Imagen: JPG o PNG</p>
      </div>
      <div class='sixteen wide column'>
        <input class="ui submit blue button" type="submit" value='Enviar Datos'>
        <input class="ui submit button" type="reset" value='Limpiar Campos'>
      </div>
    </div>
  </form>
 </div>
</div>

<?php
include("statusbar.php");
?>

<div class="result text-center"></div>

<?php
//$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
