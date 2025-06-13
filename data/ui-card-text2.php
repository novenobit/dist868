<?php
if(!isset($cardWidth))
{ $cardWidth="100%"; }
if(!isset($cardTitle))
{ $cardTitle=""; }
if(!isset($cardSubTitle))
{ $cardSubTitle=""; }
if(!isset($cardData))
{ $cardData=""; }
if(!isset($cardFooter))
{ $cardFooter=""; }
if(!isset($cardImageWidth))
{ $cardImageWidth="100%"; }
if(!isset($cardImageHeight))
{ $cardImageHeight="100%"; }
if(!isset($cardLink))
{ $cardLink="#"; }
if(!isset($cardLinkTarget))
{ $cardLinkTarget=""; }
if(!isset($cardImage) or $cardImage=="")
{ $cardImage=""; }
if(!isset($cardMeta))
{ $cardMeta=""; }
?>

<div class="ui cards">
 <div class="card">
  <div class="content">
   <?php
    if($cardLink<>"")
    {
     if($cardLinkTarget<>"")
     { echo "<a href='$cardLink' target='$cardLinkTarget'>"; }
     else
     { echo "<a href='$cardLink'>"; }
    }
    if($cardImage<>"")
    { echo "<img class='right floated tiny ui image' src='$cardImageDir/$cardImage'>"; }
    if($cardLink<>"")
    {
     echo "</a>";
    }
    if($cardTitle<>"")
    { echo "<div class='header'>$cardTitle</div>"; }
    if($cardSubTitle<>"")
    { echo "<br>$cardSubTitle"; }
    if($cardData<>"")
    { echo "$cardData"; }
   ?>
  </div>
  <?php
    if($cardLink<>"")
    {
     echo "<div class=' extra content right aligned'>";
      if($cardLinkTarget<>"")
      { echo "<a class='ui basic button' href='$cardLink' target='$cardLinkTarget'>Ejecutar</a>"; }
      else
      { echo "<a class='ui basic button' href='$cardLink'>Ejecutar</a>"; }
     echo "</div>";
    }
  ?>
 </div>
</div>
