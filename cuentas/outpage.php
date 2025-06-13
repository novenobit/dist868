<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  oitpage.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta http-equiv="no-cache">

<script type="text/javascript">
 // this page should never load inside of another frame
 if (top.location != self.location)
 { top.location = self.location; }
 function InitFrames()
 {
 if( "object" == typeof( top.deeptree ) && "unknown" == typeof( top.deeptree.Sync ) )
 { top.deeptree.Sync(); }
 }
</script>
<?php
echo "<html><meta http-equiv=refresh content=0;url=cuentas.php?sistema=$sistema>";
