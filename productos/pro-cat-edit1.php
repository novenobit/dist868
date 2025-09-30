<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-edit1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$message="S";
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
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $id_categoria=$id;
}
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }
if(isset($_GET['mcod_categoria']))
{ $mcod_categoria="$_GET[mcod_categoria]"; }

if(!isset($id) or $id=="")
{
     $error="error en los datos";
     error();
     exit();
}
if(isset($id) and $id<>"")
{
     $id_categoria=$id;
     include("$dirRoot"."bots/bot-categoria.php");
     if(!isset($catData))
     {
      $error="esta categoria no existe en la base de datos";
      error();
      exit();
     }
}
//-----------------------------------------------
$title="Ficha del Producto";
include("$dirRoot"."datafiles/catData.php");

//-----------------------------------------------
?>

<div class="ui top attached tabular menu">
  <a class="active item" data-tab="datos">Datos</a>
  <a class="item" data-tab="foto">Foto</a>
  <a class="item" data-tab="edita">Del</a>
</div>

<div class="ui bottom attached active tab segment" data-tab="datos">

 <?php echo "<form class='ui form' action='pro-cat-edit2.php?id=$id' method='POST' enctype='multipart/form-data'>"; ?>
   <div class="ui stackable two column grid">
     <div class="column">

        <div class="ui card"  style="width:100%">
          <div class="content">
            <div class="header">Cambiar Categoria</div>
          </div>
          <div class="content">
            <h4 class="ui sub header">Categoria/Grupo</h4>
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <?php
                      echo "<input class='ui input' size='30' maxlength='30' type='text' name='nom_categoria' value='$nom_categoria'>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content">
            <h4 class="ui sub header">Cambiar Foto</h4>
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <input class='ui input' type='file' name="foto_categoria">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="extra content">
            <button class="ui pink button" type="submit">Enviar Datos</button>
          </div>

        </div>

     </div>
     <div class="column">
       <div class="result text-center"></div>
       <?php
        if(isset($foto_categoria) and $foto_categoria<>"")
        {
          echo "<img src='../imagenes/menu/$foto_categoria' style='height:200px;'>";
        }
       ?>
     </div>
   </div>
 </form>
</div>
<div class="ui bottom attached tab segment" data-tab="foto">
   <?php
      echo "<div class='field'>
       <img class='boxShadow' src='../imagenes/menu/$foto_categoria' style='height:100%;'>
     </div>";
   ?>
</div>
<div class="ui bottom attached tab segment" data-tab="edita">
  <?php
      $numFilas=0;
      $sqlSubCat=mysqli_query($conex1, "select nom_subcategoria from subcategoria where cod_categoria='$cod_categoria'");
      $numFilas=mysqli_num_rows($sqlSubCat);
      if($numFilas==0)
      {
         echo "<a class='ui red button' href='pro-cat-del1.php?id=$id'>Borrar este Categoria</a>";
      }
      else
      {
       echo "<div class='ui red message'>
        <div class='header'>no puedo borrar porque tiene datos de Sub Categoria:</div>
       </div><br>";
          $ves=1;
          while($subCatData=mysqli_fetch_array($sqlSubCat))
          {
             echo $ves." ".$subCatData['nom_subcategoria'];
             $ves++;
             if($ves>=2 and $ves<=$numFilas)
             { echo " &#124; "; }
          }
      }
  ?>
</div>
<br><br><br>
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
    url: "pro-cat-edit2.php?id=<?php echo $id; ?>",
    data: $(this).serialize(),
    success: function (data) {
     console.log(data);
     $('.result').html(data);
    }
  });
});
</script>
</body></html>
