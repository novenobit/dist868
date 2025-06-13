<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                           //
//  cesta-itemp-ver.php                                                    //
// ***************************************************************************
include_once("../includes/session.php");
$aos="N";
$checkbox2="S";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");
include_once("../bots/AreasSistema.php");

// Variables 2
FechayHora();
$testData="N";
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['id_producto']))
{ $id_producto="$_GET[id_producto]"; }

if(isset($id_cuenta) and isset($id_producto))
{
 $reg=0;
 $num=1;
 $Ttotal=0;
 $numFilas=0;
 $totalCuenta=0;
 include_once("find-cuenta.php");
 $sqlCesta=mysqli_query($conex1,"select id_cuenta,id_cuenta,id_producto,cantidad,empaque from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'");
 $numFilas=mysqli_num_rows($sqlCesta);
 if($numFilas>0)
 {
    $cestaData=mysqli_fetch_array($sqlCesta);
    $id_cuenta=$cestaData['id_cuenta'];
    //$id_cuenta=$cestaData['id_cuenta'];
    $id_producto=$cestaData['id_producto'];
    $cantidad=$cestaData['cantidad'];
// $empaque=$cestaData['empaque'];
    // $nota_extra=$cestaData['nota_extra'];
    // $anulado=$cestaData['anulado'];
    // $usuario=$cestaData['usuario'];
    // $hora=$cestaData['hora'];
    // $submitted=$cestaData['submitted'];
    // $rand_num=$cestaData['rand_num'];
    $sqlPro=mysqli_query($conex1,"select * from productos where id_producto='$id_producto'");
    $proData=mysqli_fetch_array($sqlPro);
    if(isset($proData))
    {
      $id=$proData['id_producto'];
      //$id_cuenta=$proData['id_cuenta'];
      $cod_producto=$proData['cod_producto'];
      $codigo_barra=$proData['codigo_barra'];
      $cod_categoria=$proData['cod_categoria'];
      $cod_subcategoria=$proData['cod_subcategoria'];
      $nom_producto=$proData['nom_producto'];
      $estado=$proData['estado'];
      if($cestaData['empaque']<>"")
      { $empaque=$cestaData['empaque']; }
      else
      {  $empaque=$proData['empaque']; }
      if($empaque==0 or $empaque=="")
      { $empaque=1; }

// Precios
      if($clienteData['nivelprecio']<>"")
      { $nivelprecio=$clienteData['nivelprecio']; }
      if(!isset($nivelprecio) or $nivelprecio=="")
      { $nivelprecio=1; }
      if($nivelprecio=="1")
      { $precioProducto=$proData['precio1_producto']; }
      if($nivelprecio=="2")
      { $precioProducto=$proData['precio2_producto']; }
      if($nivelprecio=="3")
      { $precioProducto=$proData['precio3_producto']; }
      if($nivelprecio=="4")
      { $precioProducto=$proData['precio4_producto']; }
      if($nivelprecio<>"")
      {
       include("$dirRoot"."datafiles/find-nivel-precios.php");
       //$nom_nivel
      }
// end Precios
      $nom_unidad="";
      if(isset($proData['nom_unidad']) and $proData['nom_unidad']<>"")
      { $nom_unidad=$proData['nom_unidad']; }
      //if(isset($proData['empaque']) and $proData['empaque']<>"")
      //{ $empaque=$proData['empaque']; }
      $fotoProducto=$proData['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
      if(is_numeric($empaque))
      { $Tcant=$empaque*$cantidad; }
      else
      { $Tcant=$cantidad; }

      if($Tcant>0 and $precioProducto>0)
      {
        $total=$Tcant*$precioProducto;
        $Ttotal=$Ttotal+$total;
      }
      //$total=$cantidad*$precioProducto;
      $totalCuenta=$totalCuenta+$total;
    }

// Form ----------------------
    echo "<form class='ui form attached fluid segment' action='agrega-cesta5.php?id_cuenta=$id_cuenta&sistema=$sistema' method='POST' enctype='multipart/form-data' id='submitForm'>";
    ?>
      <input type="hidden" id="id_cuenta" name="id_cuenta" value="<?php echo $id_cuenta; ?>">
      <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>">
      <div class="ui primary card" style="width:100%">
       <div class="content">
         <div class="header"><?php echo "$nom_producto"; ?></div>
       </div>
       <div class="content">
         <?php
          if($fotoProducto<>"sinfoto.png")
          {
           echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:100px;float: right;'>";
          }
         ?>       
        <h4 class="ui sub header">
         Cod: <?php echo $codigo_barra; ?>
         <br>Und: <?php echo $nom_unidad; ?>
         <br>Empaque: <?php echo $empaque; ?>
         <br>Nivel Precio: <?php echo $nom_nivel; ?>
         <br>Precio: <?php echo $precioProducto; ?>
         <br>Total: <?php echo $total; ?>
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
          <div class="field">
            <label>Precio </label>
            <?php
             if(isset($AreaAdmin) and $AreaAdmin=="S")
             {
            ?>
               <input class="ui input" type="text" name="precio"  value="<?php echo $precioProducto; ?>" style="border-radius:20px;">
            <?php
             }
             else
             {
               echo $precioProducto;
             }
            ?>
          </div>
          <div class="field">
            <label>Cantidad</label>
            <input class="ui input" type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $cantidad; ?>" style="border-radius:20px;">
          </div>
          <?php
            if($proData['empaque']>1)
            {
          ?>
              <div class="field">
              <div class="content">
                <div class="field">
                  <div class="checkbox-wrapper-10">
                  <?php
                    if($empaque==1)
                    {
                  ?>
                    <label>Unidad</label>
                   <input type='hidden' value='on' name='unidad'>
                     <input checked="" type="checkbox" id="cb5" class="tgl tgl-flip" name="unidad" value="off">
                     <label for="cb5" data-tg-on="Unidad" data-tg-off="Bultos" class="tgl-btn" ></label>
                  <?php
                    }
                    else
                    {
                  ?>
                     <label>Bulto</label>
                     <input type='hidden' value='off' name='unidad'>
                     <input checked="" type="checkbox" id="cb5" class="tgl tgl-flip" name="bultos" value="on">
                     <label for="cb5" data-tg-on="Bultos" data-tg-off="Unidad" class="tgl-btn"></label>
                  <?php
                    }
                  ?>

                </div>
                </div>
              </div>
              </div>
          <?php
            }
          ?>
       </div>
      </div>
      <button class="ui pink button" type="submit"><i class="add icon"></i> Enviar</button>
    </form>
  <div class="result text-center"></div>
  <!-- End Form ---------------------- -->
<?php
 }
}
else
{
  echo "<h1 class='title'>No Hay Datos</h1>";
}
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

