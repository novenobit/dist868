<?php
//Function FormadePagoID()
// global $conex1, $id_formapago, $formapagoData;
if(isset($id_formapago) and $id_formapago<>"")
{
 $sqlFPT=mysqli_query($conex1,"select * from formadepago where id_formapago='$id_formapago'");
 $formapagoData=mysqli_fetch_array($sqlFPT);
 mysqli_free_result($sqlFPT);
}
// return $formapagoData;
?>
