<?php
//fetch.php;
//include("./libs1/config-db.php");
if(isset($_GET["dirRoot"]))
{ $dirRoot=$_GET["dirRoot"];  }
if(!isset($dirRoot))
{ $dirRoot="../"; }
include("../libs1/config-db.php");
if(isset($_GET["term"]))
{
   // $conex3 = new PDO("mysql:host=localhost;dbname=dist868","root","admin2111");
   // $conex3 = new PDO("mysql:host=localhost; dbname=nvbitcom_dist868", "nvbitcom", "Nov.218421*");
   $query = "SELECT id_producto,nom_producto,precio1_producto,foto_producto FROM productos  WHERE nom_producto LIKE '%".$_REQUEST['term']."%'  and activo='S' limit 100";
   $statement = $conex3->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   $output = array();
   if($total_row > 0)
   {
      foreach($result as $row)
      {
         $foto_producto=$row['foto_producto'];
         if($foto_producto=="")
         { $foto_producto="sinfoto.png"; }
         $temp_array = array();
         $temp_array['value'] = $row['nom_producto'];
         $temp_array['label'] = "<a style='background-color:#ffffff;color:black;text-decoration:none;border:none;display:inline-block;z-index:1;' href='$dirRoot"."vercat3.php?idpro={$row['id_producto']}'><img src='$dirRoot"."imagenes/productos/$foto_producto' style='width:30px; margin-rifgt:2px;display:inline;float:left;'><span class='position:absolute;bottom:0'> {$row['nom_producto']} / ref: {$row['precio1_producto']}</span></a>";
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
