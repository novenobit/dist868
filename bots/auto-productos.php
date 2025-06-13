<?php
//fetch.php;
if(isset($_GET['DBase']))
{ $DBase="$_GET[DBase]"; }
if(isset($_GET["dirRoot"]))
{ $dirRoot=$_GET["dirRoot"];  }
if(isset($DBase))
{ $DBase1=$DBase; }
if(isset($DBase1))
{ $DBase=$DBase1; }

include("../libs1/config-db.php");
$num=0;
$req = "SELECT id_producto,nom_producto FROM productos  WHERE nom_producto LIKE '%".$_REQUEST['term']."%'  and activo='S'";
$queryAP = mysqli_query($conex1, $req);
while($row = mysqli_fetch_array($queryAP))
{
 //$resultsAP[] = array('label' => $row['nom_producto']);
         $temp_array = array();
         $temp_array['value'] = $row['nom_producto'];
         $temp_array['label'] = "<a href='producto-ver1.php?idpro={$row['id_producto']}'>{$row['nom_producto']}</a>";

 $resultsAP[] = $temp_array;
 $num++;
}
if(isset($resultsAP) and $num>0)
{ echo json_encode($resultsAP); }
?>
