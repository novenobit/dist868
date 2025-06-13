<?php
$numFields=0;
if(isset($fieldCount) and $fieldCount<>"" and isset($tableCount) and $tableCount<>"")
{
 if(isset($field) and $field<>"" and isset($value) and $value<>"")
 {
  $sqlCount=mysqli_query($conex1, "select $fieldCount from $tableCount where $field='$value'");
  $numFields=mysqli_num_rows($sqlCount);
 }
}
?>
