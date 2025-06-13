<?php
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }

if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
?>

<div class="ui breadcrumb">
    <?php
     echo "<span class='font-16'>Productos</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
     // echo "<span class='font-14'>- $titlePage -</span>";
     }
     if($AreaAdmin=="S")
     { echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; }
     else
     { echo "<a href='#'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; }
    ?>
     <div class="divider"> / </div>
     <?php
      if($AreaProductos=="S")
      {
        echo "<a href='../productos/productos.php?proDataFoto=N'>Texto</a>";
     ?>
       <div class="divider"> / </div>
       <?php echo "<a href='$dirRoot"."productos/productos.php?proDataFoto=S'>Foto</a>"; ?>
       <div class="divider"> / </div>
       <?php echo "<a href='$dirRoot"."productos/productos.php?op=na&op2=na'>NoActivos</a>"; ?>
       <div class="divider"> / </div>
       <?php echo "<a href='$dirRoot"."productos/no-disponible1.php?op=nd&op2=nd'>NoDisponible</a>"; ?>
       <?php
        if($CrearProductos=="S")
        {
          echo "<div class='divider'> / </div>";
          echo "<a href='$dirRoot"."productos/producto-nuevo1.php'>Nuevo</a>";
       ?>
         <div class="divider"> / </div>
         <?php echo "<a href='pro-cat.php'>Categoria</a>"; ?>
         <div class="divider"> / </div>
         <?php echo "<a href='pro-subcat.php'>Sub-Cat</a>"; ?>
         <div class="divider"> / </div>
         <?php echo "<a href='$dirRoot"."unidades/unidades.php'>Unidades</a>";
        }
       ?>
       <div class="divider"> / </div>
       <div class="ui dropdown">
        <div class="text">SinDatos</div>
        <i class="dropdown icon"></i>
        <div class="ui vertical menu" style="background-color:#d9e6fd;color:#2f50c1;">
         <?php
          include("left-menu2.php");
         ?>
        </div>
       </div>
    <?php
    }
   ?>
</div>

