<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-buscar1.php                                                   //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$autoPro="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['mcod_categoria']))
{ $mcod_categoria="$_GET[mcod_categoria]"; }
?>
<script type="text/javascript" src="../libs2/scripts/pdscripts.js"></script>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
   <?php
    // Variables 2
    $ves=1;
    $bgcolor='#ffffff';
    if(isset($_POST['cod_producto']))
    { $cod_producto="$_POST[cod_producto]"; }
    if(isset($_GET['cod_producto']))
    { $cod_producto="$_GET[cod_producto]"; }
    if(isset($_POST['buscar']))
    { $buscar="$_POST[buscar]"; }
    if(isset($_GET['dondebuscar']))
    { $dondebuscar="$_GET[dondebuscar]"; }
    if(!empty($buscar))
    { $nom_producto=$buscar; }
    if(!isset($op))
    { $op=""; }
    if(empty($nom_producto))
    {
      $error="falta los datos del Producto";
      error();
      exit();
    }
    else
    {
   ?>
      <div class='tableWrapper'>
        <table class="ui celled structured table"  style='width:100%'>
          <tr>
            <th class='center aligned blue'>C&oacute;digo</th>
            <th class='black'>Producto</th>
            <th class='center aligned blue'>Precio</th>
            <th class='center aligned blue'>B</th>
            <th class='center aligned blue'>E</th>
            <th class='center aligned blue'>Ver</th>
          </tr>
          <?php
           // $sql=mysqli_query($conex1,"select * from productos order by nom_producto");
           $nom_producto = preg_replace('/[^(\x20-\x7F)]*/','', $nom_producto);
           $sql=mysqli_query($conex1,"select * from productos where nom_producto like '%$nom_producto%' and activo='S' order by nom_producto ");
           while($proData=mysqli_fetch_array($sql))
           {
            $precio1_producto="";
            echo "<tr>
              <td class='center aligned' ><a href='productos-edit1.php?op=$op&id={$proData['id_producto']}&mobile=$mobile'>{$proData['cod_producto']}</a></td>
              <td><a href='producto-ver1.php?op=$op&id={$proData['id_producto']}&return=S&mobile=$mobile'>{$proData['nom_producto']}</a></td>
              <td class='right aligned' >". number_format($proData['precio1_producto'],2,',', '.') . "</td>
              <td class='center aligned'>
                <a href='productos-del1.php?op=$op&id={$proData['id_producto']}&mobile=$mobile'>
                <img src='$dirRoot"."imagenes/graphs/borrar.gif' alt='Borrar {$proData['nom_producto']}&mobile=$mobile'></a>
              </td>
              <td class='center aligned'>
              <a href='productos-edit1.php?op=$op&id={$proData['id_producto']}&mobile=$mobile'>
              <img src='$dirRoot"."imagenes/graphs/edita.gif'></a>
              </td>
              <td class='center aligned'>
              <a href='producto-ver1.php?op=$op&id={$proData['id_producto']}'>
              <img src='$dirRoot"."imagenes/graphs/openfolder.gif'  alt='Ver {$proData['nom_producto']}'></a>
              </td>
            </tr>";
            $ves++;
            if($ves>=3)
            { $ves=1; }
           }
          ?>
        </tbody>
        </table>
      </div>
      <br>
      <?php echo "<a class='ui button' href='productos-nuevo1.php?op=$op&mobile=$mobile'>Agrega Nuevo Producto</a>"; ?>
      <br><br>
   <?php
    }
   ?>
 </div>
</div>

<?php
// include("config-bottom.php");
?>
<br><br><br>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
