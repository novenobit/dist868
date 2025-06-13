<?php
// Variables 2
$ves=1;
if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
$num2=0;
$subdir="../";
FlushData();
?>

<table class="ui unstackable selectable celled long scrolling table">
 <thead>
  <tr>
   <th class='tableHead' style='background-color:#1549e6;color:#fff;'>Nombre Cliente</th>
   <th class='center aligned' style='background-color:#1549e6;color:#fff;width:80px;'>Ven</th>
   <th class='center aligned' style='background-color:#1549e6;color:#fff;width:200px;'>Vendedor</th>
  </tr>
 </thead>
 <tbody>
<?php
$num=0;
//include("clientes-top3.php");
if(isset($_GET['nom_cliente']))
{ $nom_cliente="$_GET[nom_cliente]"; }
if(isset($nom_cliente))
{ $nom_clienteORG=$nom_cliente; }
$DBtable="clientes";
$campo="id_cliente";
if(!isset($op))
{ $op="lis"; }
//-------------------------------
  if(!isset($max_results) or $max_results==0 or $max_results=="")
  {
   $max_results=100;
  }
  if(!isset($_GET['page']))
  { $page=1; }
  else
  { $page=$_GET['page']; }

  $table="clientes";
  $toreturn="clientes-list1.php";
  $from=(($page * $max_results) - $max_results);
  if(!isset($start)) $start=0;
//-------------------------------

if(!isset($nom_cliente) and !isset($op))
{
  $nom_cliente="A";
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
 $sql=mysqli_query($conex1,"select * from clientes where activo='S' order by cid_cliente");
}
if($op=="nom")
{
 $sql=mysqli_query($conex1,"select * from clientes where nom_cliente like '$nom_cliente%' and activo<>'N' order by nom_cliente");
}
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
  include("cliente-data1.php");
  FlushData();
  $num++;
 }
 ?>
 </tbody>
</table>
<?php
 if(isset($sql2))
 { mysqli_free_result($sql2); }
 if($num>0)
 { echo "#Registros $num";}
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

if($numFilas>10000)
{
 if($op=="nom")
 {
   if(!isset($nom_item))
   { $nom_item=""; }
   if(!isset($max_results))
   { $max_results="12"; }
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
    $sqlTR2=mysqli_query($conex1,"select count(*) as num $tableUse1");
    $tr2Data=mysqli_fetch_array($sqlTR2);
    if(isset( $tr2Data))
    { $total_results2=$tr2Data['num']; }
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
