<?php
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if($VerVentas<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }

?>
<div class="ui floating message">
  <div class="ui breadcrumb">
    <?php echo "<i class='users icon'></i><span class='font-16'> Reportes </span>"; ?>
     <div class="divider"> &#124; </div>
     <?php echo "<i class='user tie icon'></i> <a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
     <div class="divider"> &#124; </div>
     <?php echo "<a href='reporte.php?id=$iduser'>Reportes</a>"; ?>
     <div class="divider"> &#124; </div>
     <?php echo "<a href='mas-vendido.php?id=$iduser'>Mas Vendido</a>"; ?>
  </div>
</div>
