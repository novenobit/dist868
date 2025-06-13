<?php
if(!isset($areasSistema))
{
 include("$dirRoot"."bots/AreasSistema.php");
}
$num_rows=0;
if(isset($usuarioData))
{ $cid_usuario=$usuarioData['cid_usuario']; }

$sqlAS=mysqli_query($conex1,"select * from areassistema where cid_usuario='$cid_usuario'");
$num_rows=mysqli_num_rows($sqlAS);
if($num_rows==0)
{
 $Mcid_usuario=$usuarioData['cid_usuario'];

echo "ssss $Mcid_usuario /  $cid_usuario / $usuario";
 include("./usuario-areas.php");
}

if(!isset($AreaSisUsuario))
{ include_once("$dirRoot"."bots/AreaSisUsuario.php"); }

if(isset($usuarioData))
{ $title="{$usuarioData['nombre']} {$usuarioData['apellido']} / Areas de Acceso";
  echo "<h3>$title</h3>";
  $cid=$usuarioData['cid_usuario'];
}

if(isset($usuarioAreaAdmin) and $AreaSisUsuario<>"")
{
 echo "<form class='ui form' action='usuario-edit3.php?iduser=$iduser&Mcid_usuario=$Mcid_usuario' method='POST' id='submitForm'>";

  echo "<input type='hidden' name='id' value='$iduser'>";
  echo "<input type='hidden' cid_usuario='{$usuarioData['cid_usuario']}' name='cid_usuario' value='{$usuarioData['cid_usuario']}'>";
  echo "<table class='ui unstackable celled selectable table' style='width:100%;background-color:#fff;color:#000;'>";
   echo "<tr>
   <td>Area Administraci&oacute;n</td><td width=120>";
    if($usuarioAreaAdmin=="S")
    {
     echo "<input type=radio checked value='S' name='mAreaAdmin'> SI &nbsp; <input type=radio value='N' name='mAreaAdmin'> NO";
    }
    else
    {
     echo "<input type=radio name='mAreaAdmin'> SI &nbsp; <input type=radio checked value='N'  name='mAreaAdmin'> NO";
    }
   echo "</td></tr>";
//AreaProductos
   echo "<tr class='w3-border tableData'><td>Area Productos</td><td width=120>";
    if($usuarioAreaProductos=="S")
    {
     echo "<input type=radio checked value='S' name='mAreaProductos'> SI &nbsp; <input type=radio value='N' name='mAreaProductos'> NO";
    }
    else
    {
     echo "<input type=radio name='mAreaProductos'> SI &nbsp; <input type=radio checked value='N'  name='mAreaProductos'> NO";
    }
   echo "</td></tr>";
//AreaCuentas
   echo "<tr class='w3-border tableData'><td>Area Cuentas</td><td width=120>";
    if($usuarioAreaCuentas=="S")
    {
     echo "<input type=radio checked value='S' name='mAreaCuentas'> SI &nbsp; <input type=radio value='N' name='mAreaCuentas'> NO";
    }
    else
    {
     echo "<input type=radio name='mAreaCuentas'> SI &nbsp; <input type=radio checked value='N'  name='mAreaCuentas'> NO";
    }
   echo "</td></tr>";
//AreaUsuario
   echo "<tr class='w3-border tableData'><td>Area Usuario</td><td width=120>";
    if($usuarioAreaUsuario=="S")
    {
     echo "<input type=radio checked value='S' name='mAreaUsuario'> SI &nbsp; <input type=radio value='N' name='mAreaUsuario'> NO";
    }
    else
    {
     echo "<input type=radio name='mAreaUsuario'> SI &nbsp; <input type=radio checked value='N'  name='mAreaUsuario'> NO";
    }
   echo "</td></tr>";

//AreaClientes
   echo "<tr class='w3-border tableData'><td>Area Clientes</td><td width=120>";
    if($usuarioAreaClientes=="S")
    {
     echo "<input type=radio checked value='S' name='mAreaClientes'> SI &nbsp; <input type=radio value='N' name='mAreaClientes'> NO";
    }
    else
    {
     echo "<input type=radio name='mAreaClientes'> SI &nbsp; <input type=radio checked value='N'  name='mAreaClientes'> NO";
    }
   echo "</td></tr>";


//CrearProductos
   echo "<tr class='w3-border tableData'><td>Crear Productos</td><td width=120>";
    if($usuarioCrearProductos=="S")
    {
     echo "<input type=radio checked value='S' name='mCrearProductos'> SI &nbsp; <input type=radio value='N' name='mCrearProductos'> NO";
    }
    else
    {
     echo "<input type=radio name='mCrearProductos'> SI &nbsp; <input type=radio checked value='N'  name='mCrearProductos'> NO";
    }
   echo "</td></tr>";
//CambiarDatos
   echo "<tr class='w3-border tableData'><td>Cambiar Datos</td><td width=120>";
    if($usuarioCambiarDatos=="S")
    {
     echo "<input type=radio checked value='S' name='mCambiarDatos'> SI &nbsp; <input type=radio value='N' name='mCambiarDatos'> NO";
    }
    else
    {
     echo "<input type=radio name='mCambiarDatos'> SI &nbsp; <input type=radio checked value='N'  name='mCambiarDatos'> NO";
    }
   echo "</td></tr>";
//CrearCuenta
   echo "<tr class='w3-border tableData'><td>Crear Cuenta</td><td width=120>";
    if($usuarioCrearCuenta=="S")
    {
     echo "<input type=radio checked value='S' name='mCrearCuenta'> SI &nbsp; <input type=radio value='N' name='mCrearCuenta'> NO";
    }
    else
    {
     echo "<input type=radio name='mCrearCuenta'> SI &nbsp; <input type=radio checked value='N'  name='mCrearCuenta'> NO";
    }
   echo "</td></tr>";
//Descuento
   echo "<tr class='w3-border tableData'><td>Descuento</td><td width=120>";
    if($usuarioDescuento=="S")
    {
     echo "<input type=radio checked value='S' name='mDescuento'> SI &nbsp; <input type=radio value='N' name='mDescuento'> NO";
    }
    else
    {
     echo "<input type=radio name='mDescuento'> SI &nbsp; <input type=radio checked value='N'  name='mDescuento'> NO";
    }
   echo "</td></tr>";
//LimpiarCuenta
   echo "<tr class='w3-border tableData'><td>Limpiar Cuenta</td><td width=120>";
    if($usuarioLimpiarCuenta=="S")
    {
     echo "<input type=radio checked value='S' name='mLimpiarCuenta'> SI &nbsp; <input type=radio value='N' name='mLimpiarCuenta'> NO";
    }
    else
    {
     echo "<input type=radio name='mLimpiarCuenta'> SI &nbsp; <input type=radio checked value='N'  name='mLimpiarCuenta'> NO";
    }
   echo "</td></tr>";
//Facturar
   echo "<tr class='w3-border tableData'><td>Facturar</td><td width=120>";
    if($usuarioFacturar=="S")
    {
     echo "<input type=radio checked value='S' name='mFacturar'> SI &nbsp; <input type=radio value='N' name='mFacturar'> NO";
    }
    else
    {
     echo "<input type=radio name='mFacturar'> SI &nbsp; <input type=radio checked value='N'  name='mFacturar'> NO";
    }
   echo "</td></tr>";
//AnularItems
   echo "<tr class='w3-border tableData'><td>Anular Items</td><td width=120>";
    if($usuarioAnularItems=="S")
    {
     echo "<input type=radio checked value='S' name='mAnularItems'> SI &nbsp; <input type=radio value='N' name='mAnularItems'> NO";
    }
    else
    {
     echo "<input type=radio name='mAnularItems'> SI &nbsp; <input type=radio checked value='N'  name='mAnularItems'> NO";
    }
   echo "</td></tr>";
//VerPrecioMayor
   echo "<tr class='w3-border tableData'><td>Ver Precio Mayor</td><td width=120>";
    if($usuarioVerPrecioMayor=="S")
    {
     echo "<input type=radio checked value='S' name='mVerPrecioMayor'> SI &nbsp; <input type=radio value='N' name='mVerPrecioMayor'> NO";
    }
    else
    {
     echo "<input type=radio name='mVerPrecioMayor'> SI &nbsp; <input type=radio checked value='N'  name='mVerPrecioMayor'> NO";
    }
   echo "</td></tr>";
//VerPrecioEspecial
   echo "<tr class='w3-border tableData'><td>Ver Precio Especial</td><td width=120>";
    if($usuarioVerPrecioEspecial=="S")
    {
     echo "<input type=radio checked value='S' name='mVerPrecioEspecial'> SI &nbsp; <input type=radio value='N' name='mVerPrecioEspecial'> NO";
    }
    else
    {
     echo "<input type=radio name='mVerPrecioEspecial'> SI &nbsp; <input type=radio checked value='N'  name='mVerPrecioEspecial'> NO";
    }
   echo "</td></tr>";
//VerVentas
   echo "<tr class='w3-border tableData'><td>VerVentas</td><td width=120>";
    if($usuarioVerVentas=="S")
    {
     echo "<input type=radio checked value='S' name='mVerVentas'> SI &nbsp; <input type=radio value='N' name='mVerVentas'> NO";
    }
    else
    {
     echo "<input type=radio name='mVerVentas'> SI &nbsp; <input type=radio checked value='N'  name='mVerVentas'> NO";
    }
   echo "</td></tr>";

//CambiaFotos
   echo "<tr class='w3-border tableData'><td>Cambia Fotos</td><td width=120>";
    if($usuarioCambiaFotos=="S")
    {
     echo "<input type=radio checked value='S' name='mCambiaFotos'> SI &nbsp; <input type=radio value='N' name='mCambiaFotos'> NO";
    }
    else
    {
     echo "<input type=radio name='mCambiaFotos'> SI &nbsp; <input type=radio checked value='N'  name='mCambiaFotos'> NO";
    }
   echo "</td></tr>";
//CambiarPrecios
   echo "<tr class='w3-border tableData'><td>CambiarPrecios</td><td width=120>";
    if($usuarioCambiarPrecios=="S")
    {
     echo "<input type=radio checked value='S' name='mCambiarPrecios'> SI &nbsp; <input type=radio value='N' name='mCambiarPrecios'> NO";
    }
    else
    {
     echo "<input type=radio name='mCambiarPrecios'> SI &nbsp; <input type=radio checked value='N'  name='mCambiarPrecios'> NO";
    }
   echo "</td></tr>";


  echo "</table>";
}
?>

<br>
<?php

 $user1=$usuarioData['cid_usuario'];
 $user2=$usuarioData['cid_usuario'];
?>

  <div class="ui grid">
    <div class="sixteen wide column">
      <input class="ui blue button" type='submit' value='Enviar Datos'>
      <input class="ui button" type='reset' value='Limpiar Campos'>
    </div>
  </div>
  
<?php

?>
<?php echo "</form>"; ?>
<br><br><br><br>
