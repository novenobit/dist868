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
if(isset($_GET['nom_producto']))
{ $nom_producto=$_GET['nom_producto']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['nom_producto']))
{ $nom_producto="$_GET[nom_producto]"; }
if(isset($_GET['proDataFoto']))
{ $proDataFoto="$_GET[proDataFoto]"; }
if(isset($_GET['mcod_categoria']))
{ $mcod_categoria="$_GET[mcod_categoria]"; }

FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
include("$dirRoot"."bots/AreasSistema.php");
?>

<div class="ui container">
  <div class="ui message">
    <div class="header">
      <h1 class="ui header">Cambio de Categoria</h1>
    </div>
  </div>
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
// -------------------------------------
   if(isset($cod_producto))
   { $title="Edita (cod: $cod_producto"; }
   else
   { $title="Edita Datos"; }
   //include("productos-top2.php");
//-----------------------------------------------
   //include("$dirRoot"."bots/bot-categoria.php");
   //include("$dirRoot"."datafiles/catData.php");
   //include("$dirRoot"."bots/bot-subcategoria.php");
   //include("$dirRoot"."datafiles/subCatData.php");
//-----------------------------------------------
?>

   <div class="ui stackable two column grid">

     <div class="column">
       <p><span class="category">Categor&iacute;a Actual: <?php echo $nom_categoria; ?> </span></p>
       <?php
        echo "<form class='ui form' action='producto-cc2.php?id=$id' method='POST' enctype='multipart/form-data' id='submitForm'>";
       ?>
        <div class="ui cards">
          <div class="card">
           <div class="content">
            <div class="header">Categor&iacute;a / Grupo</div>
            <div class="description">
             <?php
                if(!empty($mcod_categoria))
                {
                  $cod_categoria=$mcod_categoria;
                  include("$dirRoot"."bots/bot-categoria.php");
                  include("$dirRoot"."datafiles/catData.php");
                  echo "<select class='select' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
                    <option selectedclass='font-14' value='$cod_categoria'>$nom_categoria</option>";
                }
                else
                {
                    echo "<select class='ui input' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
                    <option class='ui input' selected value=''>selecciona</option>";
                }
                $result1=mysqli_query($conex1,"select cod_categoria,nom_categoria from categoria");
                while($categoria=mysqli_fetch_array($result1))
                {
                  $cod_categoria="{$categoria['cod_categoria']}";
                  $nom_categoria="{$categoria['nom_categoria']}";
                  echo "<option class='font-14' value='producto-cc1.php?id=$id&mcod_categoria=$cod_categoria'>$nom_categoria</option>";
                }
                echo "</select>";
             ?>
            </div>
           </div>
          </div>
          <?php
          if(isset($mcod_categoria) and $mcod_categoria<>"")
          {
          ?>
            <div class="card">
             <div class="content">
              <div class="header">Sub Categor&iacute;a</div>
              <div class="description">
                <?php
                  if(!empty($mcod_categoria))
                  {
                  echo "<select class='ui input' name='cod_subcategoria'>
                  <option selected>seleccione</option>";
                    $result2=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$mcod_categoria'");
                    while($subcategoria=mysqli_fetch_array($result2))
                    {
                    $cod_subcategoria="{$subcategoria['cod_subcategoria']}";
                    $nom_subcategoria="{$subcategoria['nom_subcategoria']}";
                    echo "<option class='font-14' value='$cod_subcategoria'>$nom_subcategoria</option>";
                    }
                  echo "</select>";
                  }
                ?>
              </div>
             </div>
            </div>
          <?php
          }
          ?>
          <div class="extra content">
             <input class="ui blue button" type="submit" value="Enviar Datos"  id="btnSubmit">
            <input class="ui button"type ='reset' value='Limpiar Campos'>
          </div>
        </div>
       <?php
        echo "</form>";
       ?>
      <br><br>
     </div>
   </div>
   <?php
    include("statusbar.php");
   ?>
   <div class="result text-center"></div>
</div>


<?php
$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "producto-cc2.php?id=<?php echo $id; ?>",
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
</body></html>
