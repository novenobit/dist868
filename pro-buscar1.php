<?php
$request = 0;
if(isset($_POST['request'])){
   $request = $_POST['request'];
}
echo "<br>request $request";

if(isset($_POST['id']))
{ $id=$_POST['id']; }
if(isset($_GET['buscar']))
{ $buscar=$_GET['buscar']; }

if(isset($_POST['buscar']))
{ $buscar=$_POST['buscar']; }

if(isset($buscar))
{ echo "<br>Busca: $buscar"; }
if(isset($id))
{ echo "<br>Id Busca:  $id"; }
?>
