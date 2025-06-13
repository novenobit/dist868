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

$file="./data/tipodeempleados.txt";

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
        $id_tipoemp=$Data[0];
        $tipo_empleado=$Data[1];
        $nivel_empleado=$Data[2];
        echo "<tr>
         <td>$id</td>
         <td><a href='tipodeempleados.php?id=$id&op=F'>$tipo_empleado</a></td>
         <td>$nivel_empleado</td>
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
        $id_tipoemp=$Data[0];
        $tipo_empleado=$Data[1];
        $nivel_empleado=$Data[2];
        echo "<tr>
         <td>$id</td>
         <td><a href='tipodeempleados.php?id=$id&op=F'>$tipo_empleado</a></td>
         <td>$nivel_empleado</td>
        </tr> ";
    }
  echo "</table>\n";
}
fclose($file_to_read);


echo "<br><br>Clean Link: <a href='tipodeempleados.php?id=&op=R'>Clean<br>";

?>
<br><a href='index.php'>index.php</a>
