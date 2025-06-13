<?php
if(isset($id_cuenta) and $id_cuenta<>"")
{
 echo "<a class='ui small primary button' href='agrega-cesta1.php?id_cuenta=$id_cuenta&sistema=$sistema'>Agregar Item</a>
 <a class='ui small primary button' href='ajustes.php?id_cuenta=$id_cuenta&sistema=$sistema'>Ajuste</a>
 <a class='ui small primary button' href='cerrar-cesta1.php?id_cuenta=$id_cuenta&sistema=$sistema'>Cerrar</a>";
}
?>
