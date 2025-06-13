<?php
include("../libs1/config-db.php");
$req = "SELECT nom_cliente FROM clientes WHERE nom_cliente LIKE '%".$_REQUEST['term']."%' ";
$queryAC = mysqli_query($conex1, $req);
while($row = mysqli_fetch_array($queryAC))
{
 $resultsAC[] = array('label' => $row['nom_cliente']);
}
if(isset($resultsAC))
{ echo json_encode($resultsAC); }
?>
