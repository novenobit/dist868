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
 { $op=$_GET['op2']; }
 if(isset($_GET['codCat']))
 { $codCat=$_GET['codCat']; }
 if(isset($_GET['codSubCat']))
 { $codSubCat=$_GET['codSubCat']; }
 if(isset($_GET['cod_marca']))
 { $cod_marca=$_GET['cod_marca']; }
 if(isset($_GET['cod_proveedor']))
 { $cod_proveedor=$_GET['cod_proveedor']; }
 if(isset($_GET['id_pais']))
 { $id_pais=$_GET['id_pais']; }

 if(!isset($op))
 { $op="all"; }
 if(!isset($codCat))
 { $codCat=""; }
 if(!isset($codSubCat))
 { $codSubCat=""; }
 if(!isset($cod_marca))
 { $cod_marca=""; }
 if(!isset($cod_proveedor))
 { $cod_proveedor=""; }
 if(!isset($id_pais))
 { $id_pais=""; }
 if(!isset($cod_pais))
 { $cod_pais=""; }

 if($op=="all")
 { $titlePage="Todos No Disponble"; }
 if($op=="cat")
 { $titlePage="No Disponble Por Categoria"; }
 if($op=="sub")
 { $titlePage="No Disponble Por Sub-Categoria"; }
 if($op=="prv")
 { $titlePage="No Disponble Por Proveedor"; }
 if($op=="mar")
 { $titlePage="No Disponble Por Marca"; }
 if($op=="pai")
 { $titlePage="No Disponble Por Pais"; }
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
    <?php
      $num=0;
      $num1=1;
  //-------------------------------
      if(!isset($max_results) or $max_results==0 or $max_results=="")
      {
        $max_results=200;
      }
      if(!isset($_GET['page']))
      { $page=1; }
      else
      { $page=$_GET['page']; }
      $campo="nom_producto";
      $exefile2="no-disponible2.php";
      $table="productos";
      $toreturn="no-disponible.php";
      $from=(($page * $max_results) - $max_results);
      if(!isset($start)) $start=0;
  //-------------------------------

      if($op=="all")
      { $sqldata="select * from productos where estado='2'"; }
      if($op=="cat" and $codCat<>"")
      { $sqldata="select * from productos where cod_categoria='$codCat' and estado='2' "; }
      if($op=="sub" and $codSubCat<>"")
      { $sqldata="select * from productos where cod_subcategoria='$codSubCat' and estado='2' "; }
      if($op=="prv" and $cod_proveedor<>"")
      { $sqldata="select * from productos where cod_proveedor='$cod_proveedor' and estado='2' "; }
      if($op=="mar" and $cod_marca<>"")
      { $sqldata="select * from productos where brand_marca='$cod_marca' and estado='2' "; }
      if($op=="pai" and $cod_pais<>"")
      { $sqldata="select * from productos where cod_pais='$cod_pais' and estado='2' "; }
      $numFilas=0;
      if(isset($sqldata))
      {
        $sqlNumPro=mysqli_query($conex1,$sqldata);
        $numFilas=mysqli_num_rows($sqlNumPro);
      }
      if($numFilas>0)
      {

        if(!isset($proDataFoto))
        { $proDataFoto="S"; }
        if($proDataFoto=="S")
        { include("productos-data-foto.php"); }
        else
        {
          include("producto-data.php");
        }
      }
  //--------------------------
  ?>
      <div class="ui floating message">Num Productos: <?php echo $numFilas; ?>
  <?php

      if($numFilas>0)
      { echo "<a class='small ui basic button' href=\"javascript:popup_center('no-disponible-printer.php?op=$op&codCat=$codCat&codSubCat=$codSubCat&cod_proveedor=$cod_proveedor&cod_marca=$cod_marca&cod_pais=$cod_pais','800','500'); \">Imprimir</a>"; }

      if($op=="all")
      { $sqlTR1="select count('id_producto') as num from productos where estado='2'"; }
      if($op=="cat" and $codCat<>"")
      { $sqlTR1="select count('id_producto') as num from productos where cod_categoria='$codCat' and estado='2' "; }
      if($op=="sub" and $codSubCat<>"")
      { $sqlTR1="select count('id_producto') as num from productos where cod_subcategoria='$codSubCat' and estado='2' "; }
      if($op=="prv" and $cod_proveedor<>"")
      { $sqlTR1="select count('id_producto') as num from productos where cod_proveedor='$cod_proveedor' and estado='2' "; }
      if($op=="mar" and $cod_marca<>"")
      { $sqlTR1="select count('id_producto') as num from productos where brand_marca='$cod_marca' and estado='2' "; }
      if($op=="pai" and $cod_pais<>"")
      { $sqlTR1="select count('id_producto') as num from productos where cod_pais='$cod_pais' and estado='2' "; }

          $total_results2=0;
          $sqlTR2=mysqli_query($conex1,$sqlTR1);
          $tr2Data=mysqli_fetch_array($sqlTR2);
          $total_results2=$tr2Data['num'];
          $total_pages=ceil($total_results2 / $max_results);
          if(!isset($total_pages))
          { $total_pages=10; }

          if($total_pages>1)
          {
            if($page > 1)
            { $prev=($page - 1); }
            else
            { $prev=$page; }
            if($page < $total_pages)
            { $next=($page + 1); }
            echo "<a class='font-14' href='$toreturn?op=$op&op2=$op&nomBuscar=$nomBuscar&page=$prev&proDataFoto=$proDataFoto'>&laquo;Ant</a>&nbsp; ";

            for($i=1; $i <= $total_pages; $i++)
            {
            if(($page) == $i)
            {
              echo "<span class='font-14 font-red'>$i</span>&nbsp;&nbsp;";
            } else {
              echo "<a class='font-14' href='$toreturn?op=$op&op2=$op&nomBuscar=$nomBuscar&page=$i&proDataFoto=$proDataFoto'>$i</a>&nbsp; ";
            }
            }
            // Build Next Link
            if($page < $total_pages)
            {
            //$next=($page + 1);
            echo "<a class='font-14' href='$toreturn?op=$op&op2=$op&nomBuscar=$nomBuscar&page=$next&proDataFoto=$proDataFoto'>Sig&raquo;</a> ";
            }
          }

        ?>
      </div>
      <span id="loadtime"></span>
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
