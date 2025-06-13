<?php
// Variables 2
$ves=1;
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
$num2=0;
$subdir="../";
FlushData();
?>

<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='black center aligned'>sssUser</th>
   <th class='black center aligned'>CI/RIF</th>
   <th class='black'>Nombre Usuario</th>
   <th class='black center aligned'>Telf</th>
   <th class='black center aligned'>Consumo</th>
   <th class='black center aligned'>Fecha</th>
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
if(!isset($op))
{ $op="lis"; }
//
if(!isset($nombre) and !isset($op))
{
  $nombre="A";
}
if(isset($nombre))
{
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and activo<>'N' order by nombre");
}
if($op=="lis")
{
 $sql=mysqli_query($conex1,"select * from usuarios where activo='S' order by nombre ");
}
if($op=="cid")
{
 $sql=mysqli_query($conex1,"select * from usuarios where  activo='S' order by ciduser");
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
  $from=(($page * $max_results_siadre) - $max_results_siadre);
  if(!isset($start)) $start=0;

 if(!isset($nombre))
 { $nombre="A"; }
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and activo<>'N' order by nombre  LIMIT $from, $max_results_siadre");
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
   $total_pages=ceil($total_results2 / $max_results_siadre);
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

