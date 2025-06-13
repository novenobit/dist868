<?php
//include("$dirRoot"."bots/find-productos.php");

if(isset($_GET["term"]))
{
   // $dbh = new     PDO('mysql:host=localhost;dbname=test', $user, $pass);
   $connect = new PDO("mysql:host=localhost;dbname=productos","root","admin2111");
   $query = "
   SELECT id_producto,nom_producto,foto_producto FROM productos
   WHERE nom_producto LIKE '%".$_GET["term"]."%' and activo='S'
   ORDER BY nom_producto ASC";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();

   $output = array();
   if($total_row > 0)
   {
      foreach($result as $row)
      {
         $temp_array = array();
         $temp_array['value'] = $row['nom_producto'];
         $temp_array['label'] = '<img src="./imagenes/productos/'.$row['foto_producto'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['nom_producto'].'';
         $output[] = $temp_array;
      }
   }
   else
   {
      $output['value'] = '';
      $output['label'] = 'No Record Found';
   }
   echo json_encode($output);
}

?>
