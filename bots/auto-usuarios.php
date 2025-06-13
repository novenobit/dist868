<?php
include("../libs1/config-db.php");
$req = "SELECT nombre,apellido FROM usaurios  WHERE nom_usuario LIKE '%".$_REQUEST['term']."%' ";
$queryAC = mysqli_query($conex1, $req);
while($row = mysqli_fetch_array($queryAC))
{
 $resultsAC[] = array('label' => $row['nom_usuario']);
}
if(isset($resultsAC))
{ echo json_encode($resultsAC); }
?>
