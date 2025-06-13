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
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
?>

<div class="ui grid">
 <div class="six wide column">
  <div class="ui breadcrumb" id="submenu">
    <?php
     echo "<span class='font-16'>Admin</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
      echo "<span class='font-14'>- $titlePage -</span>";
     }
    ?>
    <?php echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
    <div class="divider"> &#124; </div>
    <?php echo "<a class='section' href='clientes-clave.php'>Agrega Clave a Clientes</a>"; ?>
  </div>

 </div>
 <div class="ten wide column">
   <?php include("$dirRoot"."data/marquee.php"); ?>
 </div>
</div>
