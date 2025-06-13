<?php
$iduser=$_SESSION['iduser'];
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
<div class="ui floating message" style="background-color:#2d2f31;color:#bfc7c5;">
  <div class="ui breadcrumb">
    <?php echo "<i class='users icon'></i><span class='font-16'> Pedidos </span>"; ?>
     <div class="divider">  </div>
      <?php echo "<i class='user tie icon'></i> <a href='#' onclick='loadPage(\"$dirRoot"."users/usersection.php\"); return false;'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='#' onclick='loadPage(\"$dirRoot"."pedidos/pedidos.php?id=$iduser\"); return false;'>Pedidos Abiertas</a>"; ?>
     <div class="divider font-white"> / </div>
     <?php echo "<a href='$dirRoot"."pedidos/pedidos.php'>Listado</a>"; ?>
  </div>
</div>
