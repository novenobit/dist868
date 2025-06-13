<?php
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
?>

<div class='ui grid'>
  <div class='sixteen wide column'>
<?php
 echo "<a href=./clientes-list-alfa.php?op=cl&nom_cliente=1>1</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=2>2</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=3>3</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=4>4</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=5>5</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=6>6</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=7>7</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=8>8</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=9>9</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=0>0</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=A>A</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=B>B</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=C>C</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=D>D</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=E>E</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=F>F</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=G>G</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=H>H</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=I>I</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=J>J</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=K>K</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=L>L</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=M>M</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=N>N</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=O>O</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=P>P</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=Q>Q</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=R>R</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=S>S</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=T>T</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=U>U</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=V>V</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=W>W</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=X>X</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=Y>Y</a>&nbsp;&nbsp;
 <a href=./clientes-list-alfa.php?op=cl&nom_cliente=Z>Z</a>";
?>
 </div>
</div>

<div class='ui grid'>
  <div class='sixteen wide column'>
   <a href='../clientes/clientes-list-ci.php?op=cl'>Ordenar por CI</a> | <a href='../clientes/clientes-list-nom.php?op=cl'>Ordenar por Nombre</a>
   <a href='../clientes/cliente-nuevo1.php?op=cl'>Agrega Nuevo Cliente</a>
 </div>
</div>

<h2>Listado de Clientes</h2>

<table class='ui celled table'>
 <tr>
  <td class='center aligned'><a href='../clientes/clientes-list-ci.php?op=cl'>CI/RIF</a></td>
  <td class='center aligned'><a href='../clientes/clientes-list-nom.php?op=cl'>Cliente</a></td>
  <td class='center aligned'>Tel&eacute;fono</td>
  <td class='center aligned'>eMail</td>
  <td class='center aligned'>B</td>
  <td class='center aligned'>E</td>
  <td class='center aligned'>Ver</td>
 </tr>
 <?php
 if(isset($nom_cliente))
 { $nom_clienteORG=$nom_cliente; }
 $DBtable="clientes";
 $campo="id_cliente";
 if(!isset($_GET['page']))
 { $page=1; }
 else
 { $page=$_GET['page']; }
 $max_results="101";
 $from=(($page * $max_results) - $max_results);
 if(!isset($start)) $start=0;
 $sql=mysqli_query($conex1,"select * from clientes where activo='S' order by nom_cliente LIMIT  $from, $max_results");
 // $result=mysqli_query($conex1,"select * from clientes where nom_cliente like '$nom_cliente%' ORDER BY nom_cliente  LIMIT  $from, $max_results");
 // $sql=mysqli_query($conex1,"select * from clientes where activo='S' order by nom_cliente");
 while($clienteData=mysqli_fetch_array($sql))
 {
   if($ves==1)
   { $bgcolor="#ffffff"; }
   if($ves==2)
   { $bgcolor="#EDEDED"; }
   echo "<tr>
   <td>{$clienteData['cid_cliente']}</td>
   <td>
    <a href='../clientes/clientes-ver1.php?op=cl&id_cliente={$clienteData['id_cliente']}' >
     {$clienteData['nom_cliente']}
    </a>
   </td>
   <td class='center aligned'>
    {$clienteData['tel1_cliente']}
   </td>
   <td class='center aligned'>
    {$clienteData['email_cliente']}
   </td>
   <td class='center aligned'><a href='../clientes/cliente-del1.php?op=cl&id_cliente={$clienteData['id_cliente']}' >
   <img src='$dirRoot"."imagenes/graphs/borrar.png' alt='Borrar {$clienteData['nom_cliente']}'></a></td>
   <td class='center aligned'><a href='../clientes/cliente-edit1.php?op=cl&id_cliente={$clienteData['id_cliente']}'>
   <img src='$dirRoot"."imagenes/graphs/edita.png'  alt='Edita {$clienteData['nom_cliente']}'></a></td>
   <td class='center aligned'><a href='../clientes/clientes-ver1.php?op=cl&id_cliente={$clienteData['id_cliente']}' >
   <img src='$dirRoot"."imagenes/graphs/verdatos.png'  alt='Ver {$clienteData['nom_cliente']}'></a></td>
   </tr>";
   $ves++;
   if($ves==3)
   { $ves=1; }
 }
?>
</table>

<div class='ui hidden divider'></div>
<div class='ui grid'>
  <div class='sixteen wide column'>
  <?php
   //$total_results2=mysqli_result(mysqli_query($conex1,"SELECT COUNT(*) as Num FROM clientes where activo='S'"),0);
   $total_results2=0;
   $sqlTR1="SELECT COUNT(*) as Num FROM clientes where activo='S'";
   $sqlTR2=mysqli_query($conex1,$sqlTR1);
   $tr2Data=mysqli_fetch_array($sqlTR2);
   $total_results2=$tr2Data['num'];
   $total_pages=ceil($total_results2 / $max_results);
   if($total_pages<>'1')
   {
    if($page > 1)
     {$prev=($page - 1);
    echo "<a href='../clientes/clientes-list1.php?op=cl&page=$prev'>&#171;&#171; Ant</a> "; }
    for($i=1; $i <= $total_pages; $i++)
    {
     if(($page) == $i)
     {
      echo "$i";
     } else {
      echo "<a href='../clientes/clientes-list1.php?op=cl&page=$i'>$i</a> ";
     }
    }
    // Build Next Link
    if($page < $total_pages)
    {
     $next=($page + 1);
     echo "<a href='../clientes/clientes-list1.php?op=cl&page=$next'>Sig &#187;&#187;</a> ";
    }
   }

?>
  </div>
</div>

<a class='ui primary button' href='../clientes/cliente-nuevo1.php?op=cl'>Agrega Nuevo Cliente</a>
<br>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
