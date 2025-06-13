<?php
$dbVentas=new Database($DBase1);
$dbVentas->connect();
$dbVentas->select('ventas',"monto_apagar","empleado='{$usuarioData['cid_usuario']}'","",'');
$ventasData=$dbVentas->getResult();

$Tmonto_apagar=0;
if($numR==1) {
   $Tmonto_apagar=$ventasData['monto_apagar'];
}else{
   foreach($ventasData as $row=>$ventasData) {
      $Tmonto_apagar=$Tmonto_apagar+$ventasData['monto_apagar'];
      
   }
}
?>
