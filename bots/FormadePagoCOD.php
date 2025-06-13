<?php
//Function FormadePagoID()
// global $conex1, $cod_formapago, $formapagoData;
if(isset($cod_formapago) and $cod_formapago<>"")
{
 $sqlFPT=mysqli_query($conex1,"select * from formadepago where cod_formapago='$cod_formapago'");
 $formapagoData=mysqli_fetch_array($sqlFPT);
 mysqli_free_result($sqlFPT);
}
// return $formapagoData;
?>
