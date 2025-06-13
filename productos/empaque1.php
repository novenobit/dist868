<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  empaque1.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
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
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$whiteBackground="S";


$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }

if(!isset($iduser))
{ include_once("$dirRoot"."users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($AreaCuentas))
{
 include_once("../bots/AreasSistema.php");
}
FechayHora();
$todoBien="N";


 include("../includes/leftbar.php");
 FechayHora();
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['op']))
 { $op=$_GET['op']; }
 if(isset($_GET['op2']))
 { $op2=$_GET['op2']; }
 if(isset($_GET['codCat']))
 { $codCat=$_GET['codCat']; }
 if(isset($_GET['codSubCat']))
 { $codSubCat=$_GET['codSubCat']; }
 if(isset($_GET['nomBuscar']))
 { $nomBuscar=$_GET['nomBuscar']; }
 if(isset($_GET['id_cuenta']))
 { $id_cuenta=$_GET['id_cuenta']; }
 if(isset($_GET['rand_num']))
 { $rand_num=$_GET['rand_num']; }
 if(isset($_GET['nom_producto']))
 { $nom_producto="$_GET[nom_producto]"; }
 if(isset($_GET['proDataFoto']))
 { $proDataFoto="$_GET[proDataFoto]"; }
 if(!isset($nomBuscar))
 { $nomBuscar=""; }
 if(!isset($op))
 { $op="lp"; }
 if(!isset($op2))
 { $op2="nom"; }
?>
<div class="mainContent">
 <div id="content">
 <?php
   if(!isset($nom_subcategoria))
   { $nom_subcategoria=""; }
   if(isset($_GET['op2']))
   { $op2=$_GET['op2']; }
   if($op2=="lis")
   { $titlePage="Ultimos Productos"; }
   if($op2=="sc")
   { $titlePage="Sin Categoria"; }
   if($op2=="scb")
   { $titlePage="Codigo no Numerico"; }
   if($op2=="ssc")
   { $titlePage="Sin Sub-Categoria"; }
   if($op2=="sf")
   { $titlePage="Productos Sin Foto"; }
   if($op2=="sp")
   { $titlePage="Productos Sin Precios"; }
   if($op2=="nom")
   { $titlePage="Listado por Nombre"; }
   if($op2=="cod")
   { $titlePage="Listado por <b>Codigo</b>"; }
   if($op2=="cat")
   { $titlePage="<b>Categoria > $nom_categoria</b>"; }
   if($op2=="subcat")
   { $titlePage="<b>Sub-Categoria - $nom_subcategoria</b>"; }
   if(!isset($codCat))
   { $codCat=""; }
   if(!isset($codSubCat))
   { $codSubCat=""; }
//--------------------------------
   //include("sub-menu.php");
 //  include("productos-list-abc.php");
//--------------------------------
?>
<?php
$iduser=$_SESSION['iduser'];
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
<div class="ui floating message" style="background-color:#2d2f31;color:#bfc7c5;">
  <div class="ui breadcrumb">
    <?php
     echo "<i class='product hunt icon'></i><span class='font-16'>Productos</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
      echo "<span class='font-14'>- $titlePage -</span>";
     }
    ?>
     <?php echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='$dirRoot"."productos/producto-nuevo1.php'>NuevoProducto</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='$dirRoot"."productos/pro-cat-list.php'>Categoria</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='pro-subcat.php'>Sub-Cat</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='../unidades/unidades-list1.php'>Unidad</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='empaque1.php'>EditData</a>"; ?>  <a class="ui red tag small label">Nuevo</a>
  </div>
</div>


<div class="ui floating message" style="background-color:#2d2f31;color:#bfc7c5;">
    <?php
     //<form class="ui form"  action="pro-buscar1.php" method="POST" onsubmit="window.open('pro-buscar1.php','width=500,height=300');return false;">
    echo "<form class='ui form' action='$dirRoot"."productos/empaque2.php?op=empaque' method='POST' target='data2'>";
    ?>
     <input type="hidden" name="op" value="empaque">
     <div class="fields">
        <div class="seven wide field">
          <input type="text" name="buscar" maxlength="50" placeholder="Datos del Producto">
        </div>
        <div class="eight wide  field">
          <div class="fields">
            <div class="eight wide field">
              <select class="ui fluid search dropdown" name="dondebuscar">
                <option value="codbarra">CodBarra</option>
              </select>
            </div>
            <div class="field">
                <button class="ui submit button">Buscar</button>
            </div>
          </div>
        </div>
      </div>
    </form>

</div>

       <style>
        iframe {
         position: relative;
           display: block;       /* iframes are inline by default */
           font-color: #fff;
           border: none;         /* Reset default border */
           height: 90vh;        /* Viewport-relative units */
           width: 100%;
           right: 10px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;border-radius: 12px;
            -moz-box-shadow: 4px 4px 14px #000;
            -webkit-box-shadow: 4px 4px 14px #000;
            box-shadow: 4px 4px 14px #000;
        }
       </style>

  <?php
   echo "<iframe src='blank.php' height='100vh' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>";
  ?>
   <span id="loadtime"></span>
   <br><br>
 </div>
</div>

<?php
//$endPage="N";
//$showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
