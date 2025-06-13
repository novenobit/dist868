<?php
// Variables 2
$ves=1;
$num=1;
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
if(!isset($num2))
{ $num2=0; }
$subdir="../";
?>

<table class="ui unstackable selectable celled long scrolling table">
 <thead>
  <tr>
   <th class='blue' style="background-color:#149e53;color:#ffffff;">Nombre Usuario</th>
   <th class='blue center aligned' style="background-color:#149e53;color:#ffffff;">User</th>
   <th class='blue center aligned' style="background-color:#149e53;color:#ffffff;">CI/RIF</th>
   <th class='blue center aligned' style="background-color:#149e53;color:#ffffff;">Telf</th>
   <th class='blue center aligned' style="background-color:#149e53;color:#ffffff;">Ventas</th>
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

if(!isset($nombre) and !isset($op))
{
  $nombre="A";
}
if(isset($nombre))
{
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and iduser<>'2' and activo='S' order by nombre");
}
if($op=="lis")
{
 $sql=mysqli_query($conex1,"select * from usuarios where iduser<>'2' and activo='S' order by nombre");
}
if($op=="cid")
{
 $sql=mysqli_query($conex1,"select * from usuarios where cid_usuario='$buscar' activo='S' order by nombre");
}

if($op=="nom")
{
 $num=0;
 $num1=1;
 if(!isset($nombre))
 { $nombre="A"; }
 if(!isset($max_results))
 { $max_results="12"; }
 $sql=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' and iduser<>'2' and activo<>'N' order by nombre  LIMIT $from, $max_results");
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
 while($usuarioData=mysqli_fetch_array($sql))
 {
  include("usuarios-list-data.php");
  FlushData();
  $num++;
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
  $boxColor="white";
  $boxFoot="";
  $boxColorF="";
  include("$dirRoot"."data/boxData.php");
}

if($numFilas>0)
{
?>

 <div class='ui grid'>
  <div class='sixteen wide column'>

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

