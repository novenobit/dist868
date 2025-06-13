<?php
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tag="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_GET['id']))
{ $id="$_GET[id]"; }
$id_cliente=$id;
include_once("../bots/bot-cliente.php");
$id_cliente=$clienteData['id_cliente'];
$nomcliente=$clienteData['nom_cliente'];

include("submenu-buscar.php");
?>

<div class="ui attached message">
  <div class="header">
   <?php echo $nomcliente; ?>
  </div>
</div>

<?php
 // include("cliente-ver-top3.php");
 // include("cliente-ver-data.php");
 include("cliente-ver-data.php");
?>

<div class="ui grid">
 <div class="sixteen wide column">

      <?php
       // if(isset($CambiarDatos) and $CambiarDatos=="S")
       echo "<a class='ui blue button' href='cliente-edit1.php?id=$id_cliente' target='data2'><i class='edit icon'></i> Edt</a>
       <a class='ui blue button' href='cliente-del1.php?id=$id_cliente' target='data2'><i class='trash alternate outline icon'></i> Bor</a>";
      ?>

 </div>
</div>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>
