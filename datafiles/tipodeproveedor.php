<style>
html {
  font-family: "helvetica neue", helvetica, arial, sans-serif;
}
table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

table, th, td {
  border: 1px solid black;
  font-family: "Rock Salt", cursive;
}
td {
  padding: 8px;
  letter-spacing: 1px;
}

tfoot th {
  text-align: right;
}
</style>

<?php
if(isset($_GET['id']))
{ $id="$_GET[id]"; }
if(isset($_POST['id']))
{ $id="$_POST[id]"; }
if(isset($_GET['op']))
{ $op="$_GET[op]"; }

if(!isset($id))
{ $id=""; }
if(!isset($op))
{ $op="R"; }

$file="./data/tipodeproveedor.txt";

if($id<>"" and $op=="F")
{
  // echo "<br>Codigo: $codigo <br>";
  $file_to_read = fopen($file, 'r');
  if($file_to_read !== FALSE)
  {
    echo "<table>\n";
     while(($data = fgetcsv($file_to_read, 100, '|')) !== FALSE)
     {
      if($Data[0]==$id)
      {
        $id=$Data[0];
        $id_tipoprov=$Data[0];
        $cod_tipoprov=$Data[1];
        $tipo_proveedor=$Data[2];
        echo "<tr>
         <td>$id</td>
         <td>$cod_tipoprov</td>
         <td><a href='tipodeproveedor.php?id=$id&op=F'>$tipo_proveedor</a></td>
        </tr> ";
      }
     }
    echo "</table>\n";
    fclose($file_to_read);
  }
  //echo "<br>----------------------<br>";
}

$file_to_read = fopen($file, 'r');
if($file_to_read !== FALSE)
{
  echo "<br><table>";
    while(($data = fgetcsv($file_to_read, 100, '|')) !== FALSE)
    {
        $id=$Data[0];
        $id_tipoprov=$Data[0];
        $cod_tipoprov=$Data[1];
        $tipo_proveedor=$Data[2];
        echo "<tr>
         <td>$id</td>
         <td>$cod_tipoprov</td>
         <td><a href='tipodeproveedor.php?id=$id&op=F'>$tipo_proveedor</a></td>
        </tr> ";
    }
  echo "</table>\n";
}
fclose($file_to_read);


echo "<br><br>Clean Link: <a href='tipodeproveedor.php?id=&op=R'>Clean<br>";

?>

<br><a href='index.php'>index.php</a>
