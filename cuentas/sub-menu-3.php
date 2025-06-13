<?php
// include("sub-menu.php");
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }
?>
<div class="ui large breadcrumb">
  <?php echo $_SESSION['nombre']." ". $_SESSION['apellido']; ?>
  <div class="divider"><span class='font-white'> / </span></div>
  <?php echo "<a class='section' href='abrir-cuenta1.php?id=$iduser&sistema=$sistema'>Cuenta Nueva</a>"; ?>
  <div class="divider"><span class='font-white'> / </span></div>
  <?php echo "<a class='section' href='cuentas.php?id=$iduser&sistema=$sistema'>Cuentas Abiertas</a>"; ?>
  <div class="divider"><span class='font-white'> / </span></div>
  <a class='section' href="#" aria-current="page">Admin</a>
</div>
