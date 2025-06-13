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
$topAdmin="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

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
//include("clientes-list-abc3.php");
FlushData();
//
// include("../clientes/clientes-list-top.php");
//

echo "<span class='font-20 font-bold'>Clientes</span>";
?>

<table class='ui celled table'>
 <thead class='thead-inverse'>
  <tr>
   <th class='center aligned'>CI/RIF</th>
   <th class='center aligned'>Nombre Cliente</th>
   <?php
    if($sys_ventas=="S")
    {
   ?>
     <th class='center aligned'>Consumo</th>
     <th class='center aligned'>Ventas</th>
     <th class='center aligned'>UltVisita</th>
    <?php
    }
   ?>
  </tr>
 </thead>
 <tbody>
 <?php
  //include("clientes-top3.php");
  if(isset($_GET['nom_cliente']))
  { $nom_cliente="$_GET[nom_cliente]"; }
  if(isset($nom_cliente))
  { $nom_clienteORG=$nom_cliente; }
  $DBtable="clientes";
  $campo="id_cliente";

  if(!isset($nom_cliente) and !isset($op))
  {
  $error="error en los datos";
  error();
  exit();
  }
  if(isset($nom_cliente))
  {
  $sql=mysqli_query($conex1,"select * from clientes where nom_cliente like '$nom_cliente%' and activo<>'N' order by nom_cliente");
  }
  if($op=="lis")
  {
  $sql=mysqli_query($conex1,"select * from clientes where activo='S' order by nom_cliente");
  }
  if($op=="cid")
  {
  $sql=mysqli_query($conex1,"select * from clientes where  activo='S' order by cid_cliente");
  }

  if($op=="nom")
  {
    $num=0;
    $num1=1;
    if(!isset($_GET['page']))
    { $page=1; }
    else
    { $page=$_GET['page']; }

    $table="clientes";
    $toreturn="clientes-list1-1.php";
    $from=(($page * $max_results) - $max_results);
    if(!isset($start)) $start=0;

  if(!isset($nom_cliente))
  { $nom_cliente="A"; }
  $sql=mysqli_query($conex1,"select * from clientes where nom_cliente like '$nom_cliente%' and activo<>'N' order by nom_cliente  LIMIT $from, $max_results");
  }
  // $result=mysqli_query($conex1,"select * from clientes where nom_cliente like '$nom_cliente%' ORDER BY nom_cliente");
  // $sql=mysqli_query($conex1,"select * from clientes where  activo='S' order by nom_cliente");
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
  while($clienteData=mysqli_fetch_array($sql))
  {
    include("cliente-data3.php");
    FlushData();
  }
  }
  else
  {
    echo "</tbody></table> ";
    $boxColorH="cardColor";
    $boxTitle="Nada Aqu&iacute;";
    $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
    $boxColor="white";
    $boxFoot="";
    $boxColorF="";
    include("$dirRoot"."data/boxData.php");
  }
 ?>
 </tbody>
</table>

<?php
if($numFilas>0)
{
 if($op=="nom")
 {
   if(!isset($nom_item))
   { $nom_item=""; }
   if($op=="nom")
   {
    $total_results2=0;
    $sqlTR1="select count(*) as num from clientes where nom_cliente like '$nom_cliente%'";
    $sqlTR2=mysqli_query($conex1,$sqlTR1);
    $tr2Data=mysqli_fetch_array($sqlTR2);
    $total_results2=$tr2Data['num'];
   }
   else
   {
    $total_results2=0;
    $sqlTR1="select count(*) as num from $tableUse1";
    $sqlTR2=mysqli_query($conex1,$sqlTR1);
    $tr2Data=mysqli_fetch_array($sqlTR2);
    $total_results2=$tr2Data['num'];
   }
   $total_pages=ceil($total_results2 / $max_results);
   if($total_pages<>'1')
   {
    if($page > 1)
    { {$prev=($page - 1); }
    echo "<a class='font-blue' href='$toreturn?op=$op&nom_cliente=$nom_cliente&page=$prev'>&laquo;Ant</a>&nbsp; "; }
    for($i=1; $i <= $total_pages; $i++)
    {
     if(($page) == $i)
     {
       echo "<span class='font-16 font-red font-bold'>$i</span>&nbsp;";
     } else {
      echo "<a class='font-blue' href='$toreturn?op=$op&nom_cliente=$nom_cliente&page=$i'>$i</a>&nbsp; ";
     }
    }
    // Build Next Link
    if($page < $total_pages)
    {
     $next=($page + 1);
     echo "<a class='font-blue' href='$toreturn?op=$op&nom_cliente=$nom_cliente&page=$next'>Sig&raquo;</a> ";
    }
   }
  }
}

if(isset($sql))
{ mysqli_free_result($sql); }
?>


<br><br><br>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
