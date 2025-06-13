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
$popupWindow="S";
$table="S";
$tabs="S";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
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

// ---------------------------------------------
// echo "<form class='ui form' action='producto-edit2.php?op=edt&id=$id' method='POST'>";
?>

<div class="ui top attached tabular menu">
  <a class="active item" data-tab="datos">Datos</a>
  <a class="item" data-tab="foto">Foto</a>
</div>

<div class="ui bottom attached active tab segment" data-tab="datos">
  <?php
   include("./form-data.php");
  ?>
</div>
<div class="ui bottom attached tab segment" data-tab="foto">

   <?php
    echo "<h4>$nom_producto</h4>";
    if($foto_producto<>"" and $foto_producto<>"Array")
    {
      echo "<div class='field'>
       <img src='../imagenes/productos/$foto_producto' style='width:100%'>
     </div>";
    }
    else
    { echo "<div class='field'>
        <img class='roundBox boxShadow' src='../imagenes/productos/sinfoto.png' style='height:200px;'>
      </div>";
    }
   ?>

</div>

<?php
include("statusbar.php");
?>

<div class="result text-center"></div>

<?php
$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

<script>
    $('#submitform').submit(function (event) {
     var id="<?php echo $id; ?>";
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "producto-edit2.php?id=<?php echo $id; ?>",
        data: $(this).serialize(),
        success: function (data) {
          console.log(data);
          $('.result').html(data);
        }
      });
    });
</script>
</body></html>
