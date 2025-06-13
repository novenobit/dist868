<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  agrega-cesta4.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$divider="S";
$findData="S";
$forms="N";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";

include_once("../includes/headfileFrame.php");
FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['idCat']))
{ $idCat=$_GET['idCat']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_GET['codSubCat']))
{ $codSubCat=$_GET['codSubCat']; }
$linkpage="agrega-cesta4.php";
if(isset($_GET['codPro']))
{ $codPro=$_GET['codPro']; }
if(isset($_GET['nivelprecio']))
{ $nivelprecio=$_GET['nivelprecio']; }
if(!isset($nivelprecio))
{ $nivelprecio=1; }

include("../bots/find-producto.php");
if(!isset($proData))
{
 $error="Un producto no fue Seleccionado";
 error();
 exit();
}
if(!isset($codCat) or $codCat=="")
{
 if(isset($proData['cod_categoria']) and $proData['cod_categoria']<>"")
 {  $codCat=$proData['cod_categoria']; }
}
if(!isset($codSubCat) or $codSubCat=="")
{
 if(isset($proData['cod_subcategoria']) and $proData['cod_subcategoria']<>"")
 {  $codSubCat=$proData['cod_subcategoria']; }
}

include("sub-menu.php");
include("cuenta-data.php");
?>

<div class="ui stackable two column grid">
  <?php
  if(isset($id_cuenta) and $id_cuenta<>"")
  {
  echo "<div class='column'><a class='fluid ui small primary button' href='agrega-cesta1.php?id_cuenta=$id_cuenta&sistema=$sistema'>Agregar Item</a></div>
  <div class='column'>
    <a class='fluid ui small primary button' href='agrega-cesta4.php?id_cuenta=$id_cuenta&codCat=$codCat&codSubCat=$codSubCat&codPro=$codPro&sistema=$sistema'>Recargar</a>
  </div>";
  }
  ?>
</div>

<div class="ui centered grid">
 <div class="twelve wide tablet twelve wide computer column">
  <?php
    if(isset($codCat) and $codCat<>"")
    { include("../bots/find-categoria.php"); }
    else
    { $nom_categoria="Sin Categoria"; }
    if(isset($codSubCat) and $codSubCat<>"")
    { include("../bots/find-subcategoria.php"); }
    // include("list-subcategoria-h.php");
    // include("../bots/find-producto.php");
  ?>
  <div class="ui vertically divided grid">
   <div class="two column row">
    <div class="column">
      <div class="ui stackable one column grid">
        <div class="column center aligned">
         <?php echo "<h1 class='title is-3'>$nom_categoria</h1>"; ?>
        </div>
        <div class="column center aligned">
          <?php echo "<a class='ui button' href='agrega-cesta1.php?id_cuenta=$id_cuenta&nivelprecio=$nivelprecio&sistema=$sistema'>Ver Otra Categoria</a>"; ?>
        </div>
      </div>
    </div>
    <div class="column">
     <div class="ui pointing below red label">
      <h1>Agregar a Cesta</h1>
     </div>
     <?php  echo "<form class='ui form' action='agrega-cesta5.php?id_cuenta=$id_cuenta&nivelprecio=$nivelprecio&sistema=$sistema' method='POST' enctype='multipart/form-data' id='submitForm'>"; ?>
      <div class="ui primary card">
       <div class="content">
         <div class="header"><?php echo "$nom_producto"; ?></div>
       </div>
       <div class="content">
        <h4 class="ui sub header"><?php echo "Precio: $precio1_producto"; ?></h4>
        <div class="event">
         <div class="ui big input focus">
           <input class="ui input" type="text" name="cantidad" placeholder="Cantidad">
           <input type="hidden" id="id_cuenta" name="id_cuenta" value="<?php echo $id_cuenta; ?>">
           <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>">
           <input type="hidden" id="id_cuenta" name="nivelprecio" value="<?php echo $nivelprecio; ?>">
         </div>
        </div>
       </div>
       <button class="ui blue button" type="submit"><i class="add icon"></i> Enviar</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
 <div class="four wide tablet four wide computer column">
  <?php
   //  include("left-menu.php");
   include("lista-cesta-items.php");
  ?>
  <div class="result text-center"></div>
 </div>
</div>

<br><br>
<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
      url: "agrega-cesta5.php?id_cuenta=<?php echo '$id_cuenta&id_producto=$id_producto'; ?>",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
        success: function (data) {
          console.log(data);
          $('.result').html(data);
        }
      });
 }));
});
</script>
