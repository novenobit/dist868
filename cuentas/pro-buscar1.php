<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-buscar1.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$checkbox2="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$label="S";
$table="N";
$loadPage="S";
$message="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";

include_once("../includes/headfileFrame.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta'];
}
if(isset($_GET['buscar']))
{ $buscar=$_GET['buscar']; }
if(isset($_POST['buscar']))
{ $buscar=$_POST['buscar']; }
if(isset($_GET['dondebuscar']))
{ $dondebuscar=$_GET['dondebuscar']; }
if(isset($_POST['dondebuscar']))
{ $dondebuscar=$_POST['dondebuscar']; }

// Buscar Producto -------------------
include("$dirRoot"."datafiles/cuentaProBuscar.php");

// Cliente Nivel Precio ---------------
if(!isset($cuentaData))
{
 include("$dirRoot"."bots/find-cuenta1.php");
}

if(isset($cid_cliente) and $cid_cliente<>"")
{ include("$dirRoot"."bots/nivelPrecioCliente.php"); }

//------------------------------------

if($numFilas>=2)
{
 include("pro-buscar2.php");
}
elseif($numFilas==1)
{
   $proData=mysqli_fetch_array($sqlPro);
   if(!isset($proData))
   {
     $error="Un producto no fue Seleccionado";
     error();
     exit();
   }
   $findCategoria="S";
   include("$dirRoot"."datafiles/proData.php");
// Precios
   include("$dirRoot"."datafiles/nivelPrecios.php");
// end Precios
   if(!isset($nom_categoria))
   { $nom_categoria=""; }
?>
   <div class="ui attached message" style="background-color:#c6e6ff;color:#000;border-radius:25px;">
     <h3 class='title is-3'><?php echo "$nom_categoria"; ?></h3>
   </div>
  <div class='ui hidden divider'></div>
   <?php
     echo "<form class='ui form attached fluid segment' action='agrega-cesta5.php?id_cuenta=$id_cuenta&codCat=$codCat&codSubCat=$codSubCat&nivelprecio=$nivelprecio&sistema=$sistema' method='POST' enctype='multipart/form-data' id='submitForm'>";
   ?>

      <input type="hidden" id="id_cuenta" name="id_cuenta" value="<?php echo $id_cuenta; ?>">
      <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>">
      <input type="hidden" id="precio" name="precio"  value="<?php echo $precioProducto; ?>">
      <input type="hidden" id="codCat" name="codCat" value="<?php echo $codCat; ?>">
      <input type="hidden" id="codSubCat" name="codSubCat" value="<?php echo $codSubCat; ?>">
      <input type="hidden" id="nivelprecio" name="nivelprecio" value="<?php echo $nivelprecio; ?>"

      <div class="ui card" style="width:100%">
       <div class="content">
         <div class="header"><?php echo "$nom_producto"; ?></div>
       </div>
       <div class="content">
         <?php
          if($fotoProducto<>"sinfoto.png")
          {
           echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='width:100px;height:auto;;float:right;'>";
          }
         ?>
        <h4 class="ui sub header">
         <span class="font-12">
         Cod: <?php echo $codigo_barra; ?>
         <br>Und: <?php echo $nom_unidad; ?>
         <br>Empaque: <?php echo $empaque; ?>
         <?php
          if(!isset($stock_actual) or $stock_actual>0)
          { echo "<br>Stock: $stock_actual"; }

         //<br>Nivel Precio: $nom_nivel;
         ?>
         <br>Precio: <?php echo $precioProducto; ?></span>
        </h4>

<?php
      if($estado=="" or $estado==1)
      { $Testado="Disponible"; }
      else
      { $Testado="No Disponible";
        echo "<marquee width='100%' direction='left'><span class='font-16 font-red font-bold'>$Testado</span></marquee>";
      }
?>

       </div>
       <div class="content">
        <?php
         //if($id_nivel<=2)

    if(isset($AreaAdmin) and $AreaAdmin=="S")
    {

        ?>
          <div class="field">

        <?php
           // if($nivelprecio<=2 and $id_nivel<=2)
            //{
?>

<div class="ui message">

  <div class="grouped fields">
    <label>Precio para el Cliente?</label>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="precio" value="<?php echo $precio1_producto ; ?>">
        <label>Tienda: <?php echo $precio1_producto ; ?></label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="precio" checked="checked" value="<?php echo $precio2_producto ; ?>">
        <label>Mayorista: <?php echo $precio2_producto ; ?></label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="precio" value="<?php echo $precio3_producto ; ?>">
        <label>Super: <?php echo $precio3_producto ; ?></label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="precio" value="<?php echo $precio4_producto ; ?>">
        <label>Gran: <?php echo $precio4_producto ; ?></label>
      </div>
    </div>
  </div>

</div>
<?php
             echo "<input class='ui input' type='number' name='precio2' placeholder='precio especial'>";
           // }

           ?>
          </div>
        <?php
    }
    else
    {
        //  echo "<input class='ui input' type='number' name='precio'  value='$precioProducto'>";
        echo "$precioProducto";
    }
        ?>
        <div class="field">
          <label>Cantidad</label>
           <input class="ui input" type="text" name="cantidad" placeholder="Cantidad">
        </div>
        <?php
         if($empaque>1)
         {
        ?>
            <div class="field">
             <div class="content">
               <div class="field">
               <label>Unidad/Bulto</label>
               <div class="checkbox-wrapper-10">
                <div class="ui huge icon input">
                 <input type='hidden' value='off' name='unidad'>
                 <input checked="" type="checkbox" id="cb5" class="tgl tgl-flip" name="bultos" value="on">
                 <label for="cb5" data-tg-on="Bultos" data-tg-off="Unidad" class="tgl-btn"></label>
                </div>
               </div>
               </div>
             </div>
            </div>
        <?php
         }
        ?>

       <button class="ui pink button" type="submit"><i class="add icon"></i> Agrega a Cesta</button>
      </div>
     </form>
  <div class="result text-center"></div>
<! End Form ---------------------- !>

<?php
     //  echo "<html><meta http-equiv=refresh content=0;url='producto-ver1.php?codigo_barra=$buscar'>";
     //  exit();
     if(!isset($proDataFoto))
     { $proDataFoto="N"; }
}
?>

 </div>
</div>
<p><a class='ui fluid blue button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>

<?php
include("historia-compra.php");
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: agrega-cesta5.php",
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
