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
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/config.ini.php");
?>

<div class='ui grid'>
  <div class='sixteen wide column'>
<?php
 echo "<a href=./usuarios-list-alfa.php?op=cl&nombre=1>1</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=2>2</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=3>3</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=4>4</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=5>5</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=6>6</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=7>7</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=8>8</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=9>9</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=0>0</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=A>A</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=B>B</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=C>C</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=D>D</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=E>E</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=F>F</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=G>G</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=H>H</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=I>I</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=J>J</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=K>K</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=L>L</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=M>M</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=N>N</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=O>O</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=P>P</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=Q>Q</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=R>R</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=S>S</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=T>T</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=U>U</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=V>V</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=W>W</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=X>X</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=Y>Y</a>&nbsp;&nbsp;
 <a href=./usuarios-list-alfa.php?op=cl&nombre=Z>Z</a>";
?>
 </div>
</div>

<div class='ui grid'>
  <div class='sixteen wide column'>
   <a href='../users/usuarios-list-ci.php?op=cl'>Ordenar por CI</a> | <a href='../users/usuarios-list-nom.php?op=cl'>Ordenar por Nombre</a>
   <a href='../users/usuario-nuevo1.php?op=cl'>Agrega Nuevo Usuario</a>
 </div>
</div>

<h2 class='font-blue'>Listado de usuarios</h2>

<table class="ui celled table">
 <tr>
  <td class='center align'><a href='../users/usuarios-list-ci.php?op=cl'>CI/RIF</a></td>
  <td class='center align'><a href='../users/usuarios-list-nom.php?op=cl'>Usuario</a></td>
  <td class='center align'>Tel&eacute;fono</td>
  <td class='center align'>eMail</td>
  <td class='center align'>B</td>
  <td class='center align'>E</td>
  <td class='center align'>Ver</td>
 </tr>
 <?php
 if(isset($nombre))
 { $nombreORG=$nombre; }
 $DBtable="usuarios";
 $campo="iduser";
 if(!isset($_GET['page']))
 { $page=1; }
 else
 { $page=$_GET['page']; }
 $max_results="101";
 $from=(($page * $max_results) - $max_results);
 if(!isset($start)) $start=0;
 $sql=mysqli_query($conex1,"select * from usuarios where activo='S' order by nombre LIMIT  $from, $max_results");
 // $result=mysqli_query($conex1,"select * from usuarios where nombre like '$nombre%' ORDER BY nombre  LIMIT  $from, $max_results");
 // $sql=mysqli_query($conex1,"select * from usuarios where activo='S' order by nombre");
 while($usuarioData=mysqli_fetch_array($sql))
 {
   if($ves==1)
   { $bgcolor="#ffffff"; }
   if($ves==2)
   { $bgcolor="#EDEDED"; }
   echo "<tr>
   <td class='right aligned'>{$usuarioData['cid_usuario']}</td>
   <td>
    <a href='../users/usuarios-ver1.php?op=cl&iduser={$usuarioData['iduser']}' >
     {$usuarioData['nombre']}
    </a>
   </td>
   <td class='right aligned'>
    {$usuarioData['email']}
   </td>
   <td class='right aligned'>
    {$usuarioData['email']}
   </td>
   <td class='right aligned'><a href='../users/usuarios-del1.php?op=cl&iduser={$usuarioData['iduser']}' >
   <img src='$dirRoot"."imagenes/graphs/borrar.png' alt='Borrar {$usuarioData['nombre']}'></a></td>
   <td class='right aligned'><a href='../users/usuarios-edit1.php?op=cl&iduser={$usuarioData['iduser']}'>
   <img src='$dirRoot"."imagenes/graphs/edita.png'  alt='Edita {$usuarioData['nombre']}'></a></td>
   <td class='right aligned'><a href='../users/usuarios-ver1.php?op=cl&iduser={$usuarioData['iduser']}' >
   <img src='$dirRoot"."imagenes/graphs/verdatos.png'  alt='Ver {$usuarioData['nombre']}'></a></td>
   </tr>";
   $ves++;
   if($ves==3)
   { $ves=1; }
 }
?>
</table>

<div class='ui grid'>
  <div class='sixteen wide column'>

  <?php
   //$total_results2=mysqli_result(mysqli_query($conex1,"SELECT COUNT(*) as Num FROM usuarios where activo='S'"),0);
   $total_results2=0;
   $sqlTR1="SELECT COUNT(*) as Num FROM usuarios where activo='S'";
   $sqlTR2=mysqli_query($conex1,$sqlTR1);
   $tr2Data=mysqli_fetch_array($sqlTR2);
   $total_results2=$tr2Data['num'];
   $total_pages=ceil($total_results2 / $max_results);
   if($total_pages<>'1')
   {
    if($page > 1)
     {$prev=($page - 1);
    echo "<a href='../users/usuarios-list1.php?op=cl&page=$prev'>&#171;&#171; Ant</a> "; }
    for($i=1; $i <= $total_pages; $i++)
    {
     if(($page) == $i)
     {
      echo "$i";
     } else {
      echo "<a href='../users/usuarios-list1.php?op=cl&page=$i'>$i</a> ";
     }
    }
    // Build Next Link
    if($page < $total_pages)
    {
     $next=($page + 1);
     echo "<a href='../users/usuarios-list1.php?op=cl&page=$next'>Sig &#187;&#187;</a> ";
    }
   }

?>
  </div>
</div>

<a class='ui primary button' href='../users/usuario-nuevo1.php?op=cl'>Agrega Nuevo Usuario</a>
<br>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>
