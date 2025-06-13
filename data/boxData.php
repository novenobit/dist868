<?php
//Function boxData()
//{
// global $boxTitle, $boxData, $boxColor, $boxFoot,  $boxColorH, $boxColorF;
if(!isset($boxColor))
{ $boxColor="white"; }
echo "<div class='ui purple floating message'>";
 if(isset($boxTitle) and $boxTitle<>"")
 {
   if(!isset($boxColorH) or $boxColorH=="")
   { $boxColorH=""; }
   echo "<h2 class='ui horizontal divider header'>
     $boxTitle
   </h2>";
 }
 if(isset($boxData) and $boxData<>"")
 {
   echo "<h4>
    $boxData
   </h4>";
 }
 if(isset($boxFoot) and $boxFoot<>"")
 {
   if(!isset($boxColorF) or $boxColorF=="")
   { $boxColorF="blue"; }
   echo "<footer class='container $boxColorF padding round'>
      $boxFoot
   </footer>";
 }
echo "</div>";
?>
