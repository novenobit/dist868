<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  ver.php                                              //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="S";
$message="N";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="N";
$step="S";
$autoPro="S";
$forms="S";
$nags="N";
$countUp="N";
$dropdown="S";
$dirRoot="../";

include_once("../includes/config.ini.php");


if(isset($_GET["cat1"]))
{ $cat1="$_GET[cat1]";
  $Mcat1=$cat1;
}
if(isset($_GET["cat2"]))
{ $cat2="$_GET[cat2]";
  $Mcat2=$cat2;
}

FechayHora();
$todoBien="N";

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
?>

<div class="ui container">

<?php
if($mobile=="N")
{
?>
<div class="ui ordered steps">
  <div class="completed step">
    <div class="content">
      <div class="title">Cesta</div>
      <div class="description">Productos estan en la Cesta.</div>
    </div>
  </div>
  <div class="active step">
    <div class="content">
      <div class="title">Registrar</div>
      <div class="description">Cliente registra sus datos.</div>
    </div>
  </div>
  <div class="active step">
    <div class="content">
      <div class="title">Confirma Compra</div>
      <div class="description">La compra fue confirmado.</div>
    </div>
  </div>
  <div class="active step">
    <div class="content">
      <div class="title">Enviado</div>
      <div class="description">La compra fue entregado al cliente.</div>
    </div>
  </div>
</div>


<?php
}
include("cesta-data.php");
?>

</div>

<div id="content"></div>

<?php
$endPage="N";
$showStatus="N";
include("../includes/statusbar.php");
?>
<script>
$(document).ready(function(){
  $("#borraCesta").click(function(event){
   event.preventDefault();
   $("#content").load("cesta-limpiar.php");
  });
});
</script>
</body>
</html>
