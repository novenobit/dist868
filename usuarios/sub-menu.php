<?php
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
?>
<div class="ui floating message" style="background-color:#2d2f31;color:#ffffff;">
  <div class="ui breadcrumb">
    <?php
     echo "<i class='users icon'></i><span class='font-16'>Usuarios</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
      echo "<span class='font-14'>- $titlePage -</span>";
     }
     if($AreaUsuario=="S")
     {
    ?>
       <?php echo "<i class='user tie icon'></i> <a href='#' onclick='loadPage(\"$dirRoot"."users/usersection.php\"); return false;'><span class='font-white'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</span></a>"; ?>
       <div class="divider"><span class='font-white'> / </span></div>
       <?php echo "<a href='#' onclick='loadPage(\"$dirRoot"."usuarios/usuario-nuevo1.php\"); return false;'><span class='font-white'>NuevoUser</span></a>"; ?>
       <div class="divider"><span class='font-white'> / </span></div>
    <?php
       echo "<a href='$dirRoot"."usuarios/usuarios.php'><span class='font-white'>Listado</span></a>";
     }
    ?>
  </div>
</div>
