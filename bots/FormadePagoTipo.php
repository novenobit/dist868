<?php
//Function FormadePagoTipo()
// global $conex1, $tipo_formapago, $formapagoData;
if(isset($tipo_formapago) and $tipo_formapago<>"")
{
 $sqlFPT=mysqli_query($conex1,"select * from formadepago where tipo_formapago='$tipo_formapago'");
 $formapagoData=mysqli_fetch_array($sqlFPT);
 mysqli_free_result($sqlFPT);
}
// return $formapagoData;
?>
