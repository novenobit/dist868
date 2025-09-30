<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos.php                                                           //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
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

 if(!isset($nom_categoria))
 { $nom_categoria=""; }
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
 if($op2=="sun")
 { $titlePage="Productos Sin Unidad"; }
 if($op2=="sem")
 { $titlePage="Productos Sin Empaque"; }
 if($op2=="nom")
 { $titlePage="Listado por Nombre"; }
 if($op2=="cod")
 { $titlePage="Listado por <b>Codigo</b>"; }
 if($op2=="cat")
 { $titlePage="<b>Categoria > $nom_categoria</b>"; }
 if($op2=="subcat")
 { $titlePage="<b>Sub-Categoria - $nom_subcategoria</b>"; }
 if($op2=="na")
 { $titlePage="Productos No Activo"; }
 if($op2=="pnd")
 { $titlePage="Productos No Disponibles"; }
 if($op2=="pna")
 { $titlePage="Productos No Activo"; }
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
    <?php
  //  include("productos-list.php");
      if(isset($nomBuscar) and !empty($nomBuscar))
      {
        if(!isset($op2))
        { $op2="lis"; }
        $refreshfile="productos-list.php?op=$op&op2=$op2&op2=$op2&nomBuscar=$nomBuscar";
      }
      else
      { $refreshfile="productos-list.php?op=$op&op2=$op2"; }

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
        $max_results=200;
      }
      if(!isset($_GET['page']))
      { $page=1; }
      else
      { $page=$_GET['page']; }
      $campo="nom_producto";
      $exefile2="producos.php";
      $table="productos";
      $toreturn="productos.php";
      $from=(($page * $max_results) - $max_results);
      if(!isset($start)) $start=0;
  //-------------------------------
      if($op2=="lis" and $nomBuscar=="")
      { $sqldata1="select id_producto from productos"; }
      if($op2=="lis" and $nomBuscar<>"")
      { $sqldata1="select id_producto from productos where nom_producto like '$nomBuscar%'"; }

      if($op2=="nom")
      {
        if(!isset($nomBuscar) or $nomBuscar=="")
        { $nomBuscar="A"; }
        $sqldata1="select id_producto from productos where nom_producto like '$nomBuscar%'";
      }
      if($op2=="sc")
      { $sqldata1="select id_producto from productos where cod_categoria=''"; }
      if($op2=="scb")
      { $sqldata1="select id_producto from productos where codigo_barra='' and codigo_barra NOT REGEXP '[0-9]+'"; }
      if($op2=="ssc")
      { $sqldata1="select id_producto from productos where cod_subcategoria=''"; }
      if($op2=="sp")
      { $sqldata1="select id_producto from productos where precio1_producto=0 or precio1_producto=''"; }
      if($op2=="sf")
      { $sqldata1="select id_producto from productos where foto_producto=''"; }
      if($op2=="sun")
      { $sqldata1="select id_producto from productos where nom_unidad=''"; }
      if($op2=="sem")
      { $sqldata1="select id_producto from productos where empaque=''"; }
      if($op2=="cod")
      { $sqldata1="select id_producto from productos order by nom_producto"; }
      if($op2=="cat")
      { $sqldata1="select id_producto from productos where cod_categoria='$codCat'"; }
      if($op2=="subcat")
      { $sqldata1="select id_producto from productos where cod_subcategoria='$codSubCat'";  }
      if($op2=="na")
      { $sqldata1="select id_producto from productos where activo='' or activo='N'"; }
      if($op2=="pnd")
      { $sqldata1="select id_producto from productos where estado<>'1'"; }
      if($op2=="pna")
      { $sqldata1="select id_producto from productos where activo<>'S'"; }

      if(!isset($proDataFoto))
      { $proDataFoto="N"; }
      $numFilas=0;
      if(isset($sqldata1))
      {
        $sqlNumPro=mysqli_query($conex1,$sqldata1);
        $numFilas=mysqli_num_rows($sqlNumPro);
      }
      if($numFilas>0)
      {
        if(isset($nomBuscar) and $nomBuscar<>"")
        {
          if($op2=="sc")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and cod_categoria='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="scb")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and codigo_barra='' and codigo_barra NOT REGEXP '[0-9]+' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="ssc")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and cod_subcategoria='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sf")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and foto_producto='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sp")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and precio1_producto=0 or precio1_producto='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="nom")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' order by nom_producto  LIMIT  $from, $max_results"; }
          if($op2=="lis" and $nomBuscar<>"")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' order by nom_producto LIMIT  $from, $max_results"; }
        }
        else
        {
          if($op2=="sc")
          { $sqldata="select * from productos where cod_categoria='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="scb")
          { $sqldata="select * from productos where codigo_barra='' and codigo_barra NOT REGEXP '[0-9]+' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="ssc")
          { $sqldata="select * from productos where cod_subcategoria='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sf")
          { $sqldata="select * from productos where foto_producto='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sp")
          { $sqldata="select * from productos where precio1_producto=0 or precio1_producto='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sun")
          { $sqldata="select * from productos where nom_unidad='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="sem")
          { $sqldata="select * from productos where empaque='' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="lis" and $nomBuscar=="")
          { $sqldata="select * from productos order by id_producto desc LIMIT  $from, $max_results"; }
          if($op2=="lis" and $nomBuscar<>"")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="nom")
          { $sqldata="select * from productos where nom_producto like '$nomBuscar%' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="cod")
          { $sqldata="select * from productos by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="cat")
          { $sqldata="select * from productos where cod_categoria='$codCat' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="subcat")
          { $sqldata="select * from productos where cod_subcategoria='$codSubCat' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="na")
          { $sqldata="select * from productos where activo='' or activo='N' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="pnd")
          { $sqldata="select * from productos where estado<>'1' order by nom_producto LIMIT  $from, $max_results"; }
          if($op2=="pna")
          { $sqldata="select * from productos where activo<>'S' order by nom_producto LIMIT  $from, $max_results"; }
        }

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
        if($op2=="nom")
        {
          if(!isset($nom_producto))
          { $nom_producto=""; }
          if($op2=="lis")
          { $sqlTR1="select count('id_producto') as num from productos order by nom_producto"; }
          if($op2=="nom")
          { $sqlTR1="select count('id_producto') as num from productos where nom_producto like '$nomBuscar%' order by nom_producto"; }
          if($op2=="cod")
          { $sqlTR1="select count('id_producto') as num from productos order by nom_producto"; }
          if($op2=="cat")
          { $sqlTR1="select count('id_producto') as num from productos where cod_categoria='$codCat' order by nom_producto"; }
          if($op2=="subcat")
          { $sqlTR1="select count('id_producto') as num from productos where cod_subcategoria='$codSubCat' order by nom_producto"; }
          if($op2=="na")
          { $sqlTR1="select count('id_producto') as num from productos where activo='' or activo='N' order by nom_producto"; }

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
            echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nomBuscar=$nomBuscar&page=$prev&proDataFoto=$proDataFoto'>&laquo;Ant</a>&nbsp; ";

            for($i=1; $i <= $total_pages; $i++)
            {
            if(($page) == $i)
            {
              echo "<span class='font-14 font-red'>$i</span>&nbsp;&nbsp;";
            } else {
              echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nomBuscar=$nomBuscar&page=$i&proDataFoto=$proDataFoto'>$i</a>&nbsp; ";
            }
            }
            // Build Next Link
            if($page < $total_pages)
            {
            //$next=($page + 1);
            echo "<a class='font-14' href='$toreturn?op=$op&op2=$op2&nomBuscar=$nomBuscar&page=$next&proDataFoto=$proDataFoto'>Sig&raquo;</a> ";
            }
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
