<?php
if(!isset($_SESSION['iduser']) or empty($_SESSION['iduser']))
{
  echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

if(!isset($sistema) or $sistema=="")
{
 if(!isset($AreaCuentas))
 { $AreaCuentas="N"; }
 if(!isset($CrearCuenta))
 { $CrearCuenta="N"; }

 if($AreaCuentas=="S")
 { $sistema="e"; }
 if($CrearCuenta=="S")
 { $sistema="e"; }
 if(!isset($idnivel) or $idnivel=="")
 { $idnivel=4;
  $sistema="c";
 }
}

if($sistema=="e")
{ $pageTitle="Oficina"; }
if($sistema=="o")
{ $pageTitle="Online"; }
if($sistema=="c")
{ $pageTitle="Cliente"; }


if(isset($CrearCuenta) and $CrearCuenta<>"S")
{
//  $error="No Tienes Permiso de Usar Esta Seccion";
//  error();
//  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
//  exit();
}
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(!isset($pageTitle))
{ $pageTitle="Cuentas"; }
?>

<div class="ui breadcrumb" id="submenu">
<?php
     echo "<span class='font-16'>$pageTitle</span> ";
     if(isset($titlePage) and $titlePage<>"")
     {
      echo "<span class='font-14'>- $titlePage -</span>";
     }
    ?>
    <?php
     if($sistema=="e" or $sistema=="o")
     { echo "<a href='../users/usersection.php'>".$_SESSION['nombre']." ". $_SESSION['apellido']."</a>"; }
     if($sistema=="c")
     {
       echo "<a href='../users/usersection.php'>".$_SESSION['nombre']."</a>";
     }
    ?>

    <div class="divider"><span class='font-white'> / </span></div>
    <?php
     if($sistema=="c")
     { echo "<a href='abrir-cuenta2.php?id=$iduser&sistema=$sistema' target='data2'>NuevaCuenta</a>"; }
     if($sistema=="e")
     { echo "<a href='abrir-cuenta1.php?id=$iduser&sistema=$sistema' target='data2'>NuevaCuenta</a>"; }
    ?>
    <div class="divider"><span class='font-white'> / </span></div>
    <?php
      echo "<a href='cuentas.php?sistema=o?id=$iduser&sistema=$sistema'>Listado Cuentas</a>";
      // echo "<a href='$dirRoot"."cuentas/cuentas.php?sistema=o?id=$iduser'><span class='font-white'>Cta.Empleado</span></a>";
      // echo "<a href='$dirRoot"."cuentas/cuentas.php?id=$iduser'>Cta.Vendedor</a>";
      // echo "<a href='$dirRoot"."cta-publico/pedidos.php?id=$iduser'>Cta.Publico</a>";
?>
</div>
