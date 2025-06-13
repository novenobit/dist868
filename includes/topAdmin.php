<?php
// ******************************************************* 2023 ***
// *  Página Administracion sistema ven868.net                   //
// *  topAdmin.php                                               //
// ****************************************************************
if(isset($_SESSION))
{
 if(isset($_SESSION['iduser']))
 { $iduser=$_SESSION['iduser']; }
 if(isset($_SESSION['usuario']))
 { $usuario=$_SESSION['usuario']; }
 if(isset($_SESSION['idnivel']))
 { $idnivel=$_SESSION['idnivel']; }
}
if(!isset($iduser))
{ $iduser=""; }
if(!isset($idnivel))
{ $idnivel=4; }
?>

<!-- Computer Menu -->
<div class="ui large top fixed main borderless menu">
 <div class="ui container">
  <a href="<?php echo $dirRoot; ?>users/usersection.php" class="header item">
    <i class="tools yellow icon"></i>
  </a>
  <a class="item" href='<?php echo $dirRoot; ?>index.php'> <i class="home icon whiteText"></i></a>
  <div class="ui dropdown item">
   Admin
   <i class="dropdown icon"></i>
   <div class="menu">
     <?php
       if($idnivel<="2")
       {
          echo "<a class='item' href='$dirRoot"."users/usersection.php'>Panel de Control</a>
          <a class='item' href='$dirRoot"."admin/admin1.php'>Admin</a>
          <a class='item' href='$dirRoot"."users/usersection.php'>Mis Datos</a>";
       }
     ?>
     <div class="divider"></div>
     <a class='item' href='#'>Extra</a>
   </div>
  </div>
  <div class="ui dropdown item">
   laEmpresa
   <i class="dropdown icon"></i>
   <div class="menu">
     <?php
      if($idnivel<="2")
      {
        echo "<a class='item' href='$dirRoot"."clientes/clientes.php'>Clientes</a>
        <a class='item' href='$dirRoot"."users/usuarios.php'>Usuarios</a>
        <a class='item' href='$dirRoot"."productos/productos.php'>Productos</a>
        <a class='item' href='$dirRoot"."cuentas/cuentas.php'>PedirOnline</a>
        <a class='item' href='#'>Delivery</a>";
      }
     ?>
     <div class="divider"></div>
     <a class='item' href='#'>Extra</a>
   </div>
  </div>
  <div class="ui dropdown item">
   Cuentas
   <i class="dropdown icon"></i>
   <div class="menu">
     <?php
      echo "<a class='item' href='$dirRoot"."cuentas/cuentas.php?sistema=o?id=2'>Cuentas Nuevas</a>
      <a class='item' href='$dirRoot"."cuentas/cuentas.php?sistema=o?id=$iduser'>Mi Cuenta Abierta</a>
      <a class='item' href='$dirRoot"."cuentas/cuentas.php?sistema=o?id=all$&op=all'>Cuentas Abiertas</a>";
     ?>
     <div class="divider"></div>
     <?php
      if(isset($idnivel) and $idnivel<="2")
      {
       echo "<a class='item' href='$dirRoot"."cuentas/ver-pedidos.php'>Ver Pedidos</a>";
       echo "<a class='item' href='$dirRoot"."reportes/reporte.php'>Reportes</a>";
      }
     ?>
     <a class='item' href='#'>Extra</a>
   </div>
  </div>
 </div>
 <div class="right menu computer only">
   <div class="ui simple dropdown item whiteText">
     <i class="user tie icon whiteText"></i>
     <div class="menu">
       <?php
        if(isset($usuario) and $usuario<>"")
        {
          echo "<a class='item' href='$dirRoot"."users/user-logout.php'>Logout</a>";
        }
        else
        { echo "<a class='item' href='$dirRoot"."user-login.php'>Entrar</a>"; }
       ?>
     </div>
   </div>
 </div>
</div>

<?php
include("$dirRoot"."data/marquee.php");
?>
