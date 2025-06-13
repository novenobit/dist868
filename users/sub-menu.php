<?php
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
<div class="ui breadcrumb">
    <?php
     echo "<span class='font-16'>Usuarios</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
      echo "<span class='font-14'>- $titlePage -</span>";
     }
     if($AreaUsuario=="S")
     {
    ?>
       <?php echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; ?>
       <div class="divider"> / </div>
       <?php echo "<a href='usuario-nuevo1.php'>NuevoUser</a>"; ?>
       <div class="divider"> / </div>
    <?php
       echo "<a href='$dirRoot"."users/usuarios.php'>Listado</a>";
     }
    ?>
</div>
