<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos.php                                                           //
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
$item="S";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="N";
$noFrame="S";
$popupWindow="S";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$tag="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("$dirRoot"."users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";
if(isset($_GET['codigo_barra']))
{ $codigo_barra=$_GET['codigo_barra']; }
if(isset($_POST['codigo_barra']))
{ $codigo_barra=$_POST['codigo_barra']; }
if(isset($_GET['mcod_categoria']))
{ $mcod_categoria="$_GET[mcod_categoria]"; }
if(!isset($codigo_barra))
{ $codigo_barra=""; }

if($AreaProductos<>"S" or $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}
if($AreaProductos=="S")
{
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

 if(!isset($nom_subcategoria))
 { $nom_subcategoria=""; }
 if(isset($_GET['op2']))
 { $op2=$_GET['op2']; }
 if(!isset($codCat))
 { $codCat=""; }
 if(!isset($codSubCat))
 { $codSubCat=""; }

?>

 <div class="mainContent">
  <div id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       include("productos-list-abc.php");
      ?>
    </div>
    <div class="ten wide column">

<h1>No Disponible</h1>
<div class="ui two column padded grid">
       <div class="column">
        <a class="fluid ui primary basic button" href='no-disponible2.php?op=all'>Ver Todos</a>
       </div>
       <div class="column">

 <div class="ui fluid selection dropdown">
      <span>Por Categoria</span> <i class="dropdown icon"></i>
      <div class="menu">
        <?php
         $sqlCat=mysqli_query($conex1,"select cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
         while($catData=mysqli_fetch_array($sqlCat))
         {
           $codCat=$catData['cod_categoria'];
           $nom_categoria=$catData['nom_categoria'];
           $icono=$catData['icono'];
           if(!isset($icono))
           { $icono=""; }
           echo "<div class='item'><a  href='no-disponible2.php?op=cat&codCat=$codCat'><i class='$icono icon'></i>$nom_categoria</a></div>";
         }
        ?>
      </div>
  </div>

       </div>
       <div class="column">


       <?php
       // Select_ProCat();
       //include("$dirRoot"."bots/Select_ProCat.php");
       if(!empty($mcod_categoria))
       {
         $cod_categoria=$mcod_categoria;
         include("$dirRoot"."bots/bot-categoria.php");
         include("$dirRoot"."datafiles/catData.php");
         echo "<select class='ui selection dropdown' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
         <option selected value='$cod_categoria'>$nom_categoria</option>";
       }
       else
       {
        // include("$dirRoot"."bots/bot-categoria.php");
         echo "<select class='ui selection dropdown' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
         <option class='ui input' selected value=''>por Sub Categoria</option>";
       }
       $result1=mysqli_query($conex1,"select cod_categoria,nom_categoria from categoria order by nom_categoria");
       while($categoria=mysqli_fetch_array($result1))
       {
        $cod_categoria=$categoria['cod_categoria'];
        $nom_categoria=$categoria['nom_categoria'];
        echo "<option value='no-disponible1.php?codigo_barra=$codigo_barra&mcod_categoria=$cod_categoria'>$nom_categoria</option>";
       }
        echo "</select>";
     if(!empty($mcod_categoria))
     {

      $numFilas=0;
      $result2=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$mcod_categoria' order by nom_subcategoria");
      $numFilas=mysqli_num_rows($result2);
      if($numFilas>0)
      {

echo " <div class='ui fluid selection dropdown'>
      <span>por Sub-Categoria</span> <i class='dropdown icon'></i>
      <div class='menu'>";

          while($subcategoria=mysqli_fetch_array($result2))
          {
            $cod_subcategoria=$subcategoria['cod_subcategoria'];
            $nom_subcategoria=$subcategoria['nom_subcategoria'];
           echo "<div class='item'><a  href='no-disponible2.php?op=cat&codSubCat=cod_subcategoria'>$nom_subcategoria</a></div>";
          }
        echo "</div>
        </div>";

      }
     }
     ?>


       </div>
       <div class="column">

 <div class="ui fluid selection dropdown">
      <span>por Marca</span> <i class="dropdown icon"></i>
      <div class="menu">
       <?php
       $sqlMarca=mysqli_query($conex1,"select * from marcas order by nom_marca");
       while($marcaData=mysqli_fetch_array($sqlMarca))
       {
        $cod_marca=$marcaData['cod_marca'];
        $nom_marca=$marcaData['nom_marca'];
        echo "<div class='item'><a  href='no-disponible2.php?op=mar&cod_marca=$cod_marca'>$nom_marca</a></div>";
       }
     ?>
      </div>
  </div>

       </div>
       <div class="column">

 <div class="ui fluid selection dropdown">
      <span>por Proveedor</span> <i class="dropdown icon"></i>
      <div class="menu">

       <?php
       $sqlProv=mysqli_query($conex1,"select cod_proveedor,nom_proveedor from proveedor order by nom_proveedor");
       while($provData=mysqli_fetch_array($sqlProv))
       {
        $cod_proveedor=$provData['cod_proveedor'];
        $nom_proveedor=$provData['nom_proveedor'];
        echo "<div class='item'><a  href='no-disponible2.php?op=prv&cod_proveedor=$cod_proveedor'>$nom__proveedor</a></div>";
       }
     ?>
      </div>
  </div>

       </div>
       <div class="column">

 <div class="ui fluid selection dropdown">
      <span>Pais de Origen</span> <i class="dropdown icon"></i>
      <div class="menu">

       <?php
       $sqlPais=mysqli_query($conex1,"select id_pais,pais from pais order by pais");
       while($paisData=mysqli_fetch_array($sqlPais))
       {
        $id_pais=$paisData['id_pais'];
        $pais=$paisData['pais'];
        echo "<div class='item'><a  href='no-disponible2.php?op=pai&id_pais=$id_pais'>$pais</a></div>";
       }
     ?>
      </div>
  </div>



       </div>

     </div>

    </div>
    <div class="six wide column">
      <iframe src='productos-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
    </div>
   </div>
  </div>
 </div>
<?php
}

$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script type="text/javascript">
     var before_loadtime = new Date().getTime();
     window.onload = Pageloadtime;
     function Pageloadtime() {
         var aftr_loadtime = new Date().getTime();
         // Time calculating in seconds
         pgloadtime = (aftr_loadtime - before_loadtime) / 1000

         document.getElementById("loadtime").innerHTML = "Page load time is <font color='red'><b>" + pgloadtime + "</b></font> Seconds";
     }
</script>
</body></html>
