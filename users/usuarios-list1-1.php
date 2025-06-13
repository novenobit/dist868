<?php
// ******************************************************** 2023 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2023-2025 NovenoBIT.com                                      //
// ************************************************************************
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
$forms="N";
$dropdown="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/config.ini.php");

//ScreenData();
if(!isset($uip))
{ get_remote_ip();
  if(!isset($uip) or $uip=="")
  { userip(); }
}
$tableExit="N";
TableExit2("pc_data");

if(isset($uip) and $uip<>"" and $tableExit=="S")
{
  $numFilas=0;
  $sql=mysqli_query($conex1, "select id from pc_data where userip='$uip'");
  $numFilas=mysqli_num_rows($sql);
  if($numFilas>0)
  {
   $sql=mysqli_query($conex1,"select max_results from pc_data where userip='$uip'");
   $pcData=mysqli_fetch_array($sql);
   $max_results=$pcData['max_results'];
  }
  else
  {
   $max_results="10";
  }
}
if($max_results==0 or $max_results=="")
{
 $max_results=12;
}

if(!isset($webHeight))
{ ScreenData(); }
if($webWidth<="800")
{
 $fontSize1="font-10";
 $fontSize2="font-14";
 $imageHeight="20";
 $buttonSize="w3-small";
 $buttonSize="w3-padding-small";
}
else
{
 $fontSize1="font-14";
 $fontSize2="font-18";
 $imageHeight="30";
 $buttonSize="w3-xlarge";
 $buttonSize="w3-small";
}

// Variables 2
$ves=1;
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
$num2=0;

//if(!isset($dia) and !isset($mes))
// FechayHora();
//
$subdir="../";
// include("../includes/report-submenu.php");
//include("usuarios-list-abc3.php");
FlushData();
//
// include("../usuarios/usuarios-list-top.php");
//

echo "<span class='font-20 font-bold'>Usuarios</span>";
?>

<table class='w3-table w3-bordered w3-border' style='width:100%'>
 <thead class='thead-inverse'>
  <tr>
   <th class='w3-border w3-center tableHead'>User</th>
   <th class='w3-border w3-center tableHead'>CI/RIF</th>
   <th class='w3-border tableHead'>Nombre USuarios</th>
   <?php
    if($sys_ventas=="S")
    {
   ?>
     <th class='w3-border w3-center tableHead'>Consumo</th>
     <th class='w3-border w3-center tableHead'>Ventas</th>
     <th class='w3-border w3-center tableHead'>UltVisita</th>
    <?php
    }
   ?>
  </tr>
 </thead>
 <tbody>
<?php
//include("usuarios-top3.php");
if(isset($_GET['nombre']))
{ $nombre="$_GET[nombre]"; }
if(isset($nombre))
{ $nombreORG=$nombre; }
$DBtable="usuarios";
$campo="iduser";

//
if(!isset($nombre) and !isset($op))
{
 $error="error en los datos";
 error();
 exit();
}
if(isset($nombre))
{
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and activo<>'N' order by nombre");
}
if($op=="lis")
{
 $sql=mysqli_query($conex1,"select * from usuarios where  activo='S' order by nombre limit 20");
}
if($op=="cid")
{
 $sql=mysqli_query($conex1,"select * from usuarios where  activo='S' order by cid_usuario");
}

if($op=="nom")
{
  $num=0;
  $num1=1;
  if(!isset($_GET['page']))
  { $page=1; }
  else
  { $page=$_GET['page']; }

  $table="usuarios";
  $toreturn="usuarios-list1-1.php";
  $from=(($page * $max_results) - $max_results);
  if(!isset($start)) $start=0;

 if(!isset($nombre))
 { $nombre="A"; }
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and activo<>'N' order by nombre  LIMIT $from, $max_results");
}

// $result=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' ORDER BY nombre");
// $sql=mysqli_query($conex1,"select * from usuarios where  activo='S' order by nombre");
if(!isset($sql))
{
 $error="Error en los datos de Operacion $op";
 error();
 exit();
}
$numFilas=0;
$numFilas=mysqli_num_rows($sql);
if($numFilas>0)
{
 while($usuarioData=mysqli_fetch_array($sql))
 {
  include("usuarios-data3.php");
  FlushData();
 }
 ?>
 </tbody>
 </table>
<?php
}
else
{
  echo "</tbody></table> ";
  $boxColorH="cardColor";
  $boxTitle="Nada Aqu&iacute;";
  $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
  $boxColor="w3-white";
  $boxFoot="";
  $boxColorF="";
  include("$dirRoot"."data/boxData.php");
}

if($numFilas<>0)
{
?>

 <div class='w3-row w3-padding'>
  <div class='w3-col w3-padding font-14 s12 m12 l12'>

<?php
 if($op=="nom")
 {
   if(!isset($nom_item))
   { $nom_item=""; }
   if($op=="nom")
   {
    $total_results2=0;
    $sqlTR1="select count(*) as num from usuarios where nombre like '$nombre%'";
    $sqlTR2=mysqli_query($conex1,$sqlTR1);
    $tr2Data=mysqli_fetch_array($sqlTR2);
    $total_results2=$tr2Data['num'];
   }
   else
   {
    $total_results2=0;
    $sqlTR1="select count(*) as num from $tableUse";
    $sqlTR2=mysqli_query($conex1,$sqlTR1);
    $tr2Data=mysqli_fetch_array($sqlTR2);
    $total_results2=$tr2Data['num'];
   }
   $total_pages=ceil($total_results2 / $max_results);
   if($total_pages<>'1')
   {
    if($page > 1)
    { {$prev=($page - 1); }
    echo "<a class='font-blue' href='$toreturn?op=$op&nombre=$nombre&page=$prev'>&laquo;Ant</a>&nbsp; "; }
    for($i=1; $i <= $total_pages; $i++)
    {
     if(($page) == $i)
     {
       echo "<span class='font-16 font-red font-bold'>$i</span>&nbsp;";
     } else {
      echo "<a class='font-blue' href='$toreturn?op=$op&nombre=$nombre&page=$i'>$i</a>&nbsp; ";
     }
    }
    // Build Next Link
    if($page < $total_pages)
    {
     $next=($page + 1);
     echo "<a class='font-blue' href='$toreturn?op=$op&nombre=$nombre&page=$next'>Sig&raquo;</a> ";
    }
   }
  }
 ?>
 </div>
</div>
<?php
}

if(isset($sql))
{ mysqli_free_result($sql); }
?>


<br><br><br>
<?php
if($mobile=="S")
{
 $showstatus="S";
 $sysNormalM="S";
 $sysCuentaM="N";
}
else
{
  $resizeFrame2="S";
  $showstatus="N";
  $sysNormal="S";
  $sysCuenta="N";
}
// $endPage="N";
include("$dirRoot"."includes/statusbar2.php");
?>
