<?php
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }
?>
<div class="ui breadcrumb" id="submenu">
    <?php echo "<span class='font-16'> Clientes </span>"; ?>
    <div class="divider"> / </div>
    <?php echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
    <div class="divider"> / </div>
    <?php echo "<a href='./cliente-nuevo1.php'>Nuevo Cliente</a>"; ?>
    <div class="divider"> / </div>
    <?php echo "<a href='./clientes.php'>Listado</a>"; ?>
</div>

<div class="ui grid">
 <div class="eight wide  center aligned column">
  <?php
    include("clientes-list-abc1.php");
  ?>
 </div>
 </div>

