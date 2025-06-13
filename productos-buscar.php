<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  contact1.php                                                //
// ****************************************************************
include_once("./includes/session.php");
$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$divider="S";
$forms="S";
$nags="N";
$countUp="S";
$dropdown="S";
$dirRoot="./";
include_once("./includes/config.ini.php");

if(isset($_GET['buscar']))
{ $buscar="$_GET[buscar]"; }
if(isset($_POST['buscar']))
{ $buscar="$_POST[buscar]"; }

if(isset($_GET['nomBuscar']))
{ $nomBuscar="$_GET[nomBuscar]"; }
if(isset($_POST['nomBuscar']))
{ $nomBuscar="$_POST[nomBuscar]"; }
if(!isset($nomBuscar))
{ $nomBuscar=""; }

if(isset($buscar) and $buscar<>"")
{ $nomBuscar=$buscar; }

if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(!isset($op2) or $op2=="")
{ $op2="lis";
 $max_results=100;
}
if(!isset($mobile))
{ $mobile="N"; }
?>

<hr>
<div class="ui container center aligned" >
   <?php
    if(!isset($op2))
    { $op2="nom"; }
    echo "<h3><a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=0'>0</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=1'>1</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=2'>2</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=3'>3</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=4'>4</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=5'>5</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=6'>6</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=7'>7</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=8'>8</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=9'>9</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=A'>A</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=B'>B</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=C'>C</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=D'>D</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=E'>E</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=F'>F</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=G'>G</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=H'>H</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=I'>I</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=J'>J</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=K'>K</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=L'>L</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=M'>M</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=N'>N</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=O'>O</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=P'>P</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=Q'>Q</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=R'>R</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=S'>S</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=T'>T</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=U'>U</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=V'>V</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=W'>W</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=X'>X</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=Y'>Y</a>
    <a href='productos-buscar.php?op=lp&op2=nom&nomBuscar=Z'>Z</a></h3>";
   ?>
</div>

<?php
if($op2=="lis")
{ $sqldata="select * from productos where activo='S' order by nom_producto LIMIT $max_results"; }
if($op2=="nom")
{
 if(isset($nomBuscar) and $nomBuscar<>"")
 { $sqldata="select * from productos where nom_producto like '$nomBuscar%' and activo='S' order by nom_producto"; }
}
if($op2=="nomall")
{
  if(isset($nomBuscar) and $nomBuscar<>"")
  { $sqldata="select * from productos where nom_producto like '%$nomBuscar%' and activo='S' order by nom_producto"; }
}

if(isset($sqldata) and  $sqldata<>"")
{
 if($mobile=="S")
 { include("producto-mobile.php"); }
 else
 { include("producto-data.php"); }
}
?>

<div class="ui container center aligned" >
<h3>Listado de Nuestra Diversa Gama De Productos</h3><br>
</div>

<?php
if($mobile=="S")
{
?>
<div class="ui grid">
  <div class="center aligned eight wide column">
    <a href='javascript:history.back(1)'><div class="ui pink top attached huge button" tabindex="0"><i class="arrow left icon"></i> Regresar</div></a>
  </div>
  <div class="center aligned eight wide column">
   <a href="#top">
     <div class="ui pink top attached huge button" tabindex="0">Subir <i class="arrow up icon"></i></div>
   </a>
  </div>
</div>

<?php
}

$showStatus="S";
include("./includes/statusbar.php");
?>
