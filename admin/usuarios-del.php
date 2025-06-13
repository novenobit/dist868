<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  usuarios-del.php                                           //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
?>

<h2>Usuarios Sin Cedula</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='blue center aligned' style="width:100px">ID</th>
  <th class='blue'>Usuario</th>
  <th class='blue center aligned' style="width:100px">OP</th>
 </tr>
</thead>
<tbody>
<?php
$num=0;
$sqldata="select * from usuarios";
$sql=mysqli_query($conex1,"$sqldata");
while($usuarioData=mysqli_fetch_array($sql))
{
 $id=$usuarioData['iduser'];
 $iduser=$usuarioData['iduser'];
 $cid_usuario=$usuarioData['cid_usuario'];
 $nombre=$usuarioData['nombre'];
 $apellido=$usuarioData['apellido'];

 if($cid_usuario=="")
 {
   echo "<tr>
     <td class='center aligned' style='width:100px'>$iduser</td>
     <td>$nombre $apellido</td>
     <td class='center aligned' style='width:100px'>
      <i class='large eraser icon'></i>
     </td>
    </tr>";
    $sqldel="delete from usuarios where iduser='$iduser'";
    $resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
    $num++;
  }
}
?>
</tbody></table>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total Cambios: $num</h1>";
    if($num>0)
    {
    // echo "<a class='ui red button' href='CheckProdRepetido0.php?op=del'>Borrar Datos</a>";
    }
   ?>
  </div>
  <div class="eight wide column">
   <a class="ui blue button" href="right-menu.php">
     <i class="left arrow icon"></i>
     Regresar
   </a>
  </div>
</div>

<?php
if($num>0)
{
 $sql1="repair table usuarios";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 exit();
}
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
