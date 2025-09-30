<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-list.php                                                      //
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
 if(isset($_GET['rand_num']))
 { $rand_num=$_GET['rand_num']; }
 if(isset($_GET['max_results']))
 { $max_results=$_GET['max_results']; }
 if(!isset($nomBuscar))
 { $nomBuscar=""; }
 if(!isset($op))
 { $op="lp"; }
 if(!isset($op2) or $op2=="")
 { $op2="lis"; }
 if(isset($_GET['codCat']))
 {  $codCat="$_GET[codCat]";
   if($codCat<>"")
   {
    $queryCat="select nom_categoria from categoria where cod_categoria='$codCat'";
    $sqlCat=mysqli_query($conex1,$queryCat);
    $catData=mysqli_fetch_array($sqlCat);
    $nom_categoria=$catData['nom_categoria'];
   }
 }
 if(isset($_GET['codSubCat']))
 { $codSubCat="$_GET[codSubCat]";
   if($codSubCat<>"")
   {
    $querySubCat="select nom_subcategoria from subcategoria where cod_subcategoria='$codSubCat'";
    $sqlSubCat=mysqli_query($conex1,$querySubCat);
    $subCatData=mysqli_fetch_array($sqlSubCat);
    $nom_subcategoria=$subCatData['nom_subcategoria'];
   }
 }
 if(!isset($nom_categoria))
 { $nom_categoria=""; }
 if(!isset($nom_subcategoria))
 { $nom_subcategoria=""; }
?>
 <div class="mainContent">
  <div id="content">
   <?php
    include("sub-menu.php");
    include("productos-list-abc.php");
   ?>
   <div class="ui grid">
    <div class="eight wide column">
      <?php
        if($op2=="lis")
        { echo "<span class='menu-label'>Productos > Varios</span>"; }
        if($op2=="nom")
        { echo "<span class='menu-label'>Listado por: <b>$nom_producto</b></span>"; }
        if($op2=="cod")
        { echo "<span class='menu-label'>Listado por: <b>Codigo</b></span>"; }
        if($op2=="cat")
        { echo "<span class='menu-label'><b>Categoria > $nom_categoria</b</span>"; }
        if($op2=="subcat")
        { echo "<span class='menu-label'><b>Sub-Categoria > $nom_subcategoria</b></span>"; }
      ?>
    </div>
    <div class="eight wide right aligned column">
      <?php
        if(isset($codCat) and $codCat<>"")
        { echo "<a href='productos.php?proDataFoto=N&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>Texto</a> &#124; <a href='productos.php?proDataFoto=S&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>Foto</a> "; }
      ?>
    </div>
   </div>
<!-- Start Data -->
   <?php
    if($op=="lp")
    {
      //  include("productos-list.php");
      if(!isset($op2))
      { $op2="lis"; }
      if(!empty($nom_producto))
      { $refreshfile="productos-list.php?op=$op&op2=$op2&op2=$op2&nom_producto=$nom_producto"; }
      else
      { $refreshfile="productos-list.php?op=$op&op2=$op2&op2=$op2"; }
      $subdir="../";
      //include("../includes/report-submenu.php");
      FlushData();
      //include("productos-list-abc.php");
      //echo "<br>";
      FlushData();
      $num=0;
      $num1=1;
    //-------------------------------
      if(!isset($max_results) or $max_results==0 or $max_results=="")
      {
      $max_results=80;
      }
      if(!isset($_GET['page']))
      { $page=1; }
      else
      { $page=$_GET['page']; }

      $table="productos";
      $toreturn="productos-list.php";
      $from=(($page * $max_results) - $max_results);
      if(!isset($start)) $start=0;
    //-------------------------------
      if($op2=="lis")
      { $sqldata="select * from productos where activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="nom")
      { $sqldata="select * from productos where nom_producto like '$nom_producto%' and activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="cod")
      { $sqldata="select * from productos where activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="cat")
      { $sqldata="select * from productos where cod_categoria='$codCat' and activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="subcat")
      { $sqldata="select * from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto LIMIT $max_results"; }

      if(!isset($proDataFoto))
      { $proDataFoto="N"; }
      if($proDataFoto=="S")
      { include("productos-data-foto.php"); }
      else
      { include("producto-data.php"); }
    }
    if($op2=="nom" and $total_pages>1)
    {
      if(!isset($nom_producto))
      { $nom_producto=""; }
      if($op2=="lis")
      { $sqlTR1="select count(id_producto) as num from productos where activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="nom")
      { $sqlTR1="select count('id_producto') as num from productos where nom_producto like '$nom_producto%' and activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="cod")
      { $sqlTR1="select count('id_producto') as num from productos where activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="cat")
      { $sqlTR1="select count('id_producto') as num from productos where cod_categoria='$codCat' and activo='S' order by nom_producto LIMIT $max_results"; }
      if($op2=="subcat")
      { $sqlTR1="select count('id_producto') as num from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto LIMIT $max_results"; }
      $total_results2=0;
      $sqlTR2=mysqli_query($conex1,$sqlTR1);
      $tr2Data=mysqli_fetch_array($sqlTR2);
      $total_results2=$tr2Data['num'];
      $total_pages=ceil($total_results2 / $max_results);
      if($total_pages<>'1')
      {
        if($page > 1)
        { $prev=($page - 1); }
        else
        { $prev=$page; }
        if($page < $total_pages)
        { $next=($page + 1); }
        echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nom_producto=$nom_producto&page=$prev'>&laquo;Ant</a>&nbsp; ";
      }
      for($i=1; $i <= $total_pages; $i++)
      {
        if(($page) == $i)
        {
          echo "<span class='font-14 font-red'>$i</span>&nbsp;&nbsp;";
        } else {
          echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nom_producto=$nom_producto&page=$i'>$i</a>&nbsp; ";
        }
      }
      // Build Next Link
      if($page < $total_pages)
      {
        //$next=($page + 1);
        echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nom_producto=$nom_producto&page=$next'>Sig&raquo;</a> ";
      }
    }
   ?>
<!-- End Data -->
  </div>
 </div>
<?php
}
?>

<br><br><br>
<?php
// $endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
