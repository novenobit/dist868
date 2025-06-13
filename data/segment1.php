<?php
//include("$dirRoot"."data/segment1.php");

if(isset($segmentTitle) and $segmentTitle<>"")
{
?>
 <div class="ui segments">
  <?php
   if(isset($segmentTitle))
   {
    echo "<h4 class='ui top attached block header'>$segmentTitle</h4>";
   }
   if(isset($segmentData))
   {
  ?>
   <div class="ui readme padded segment">
     <?php echo $segmentData; ?>
    </div>
  <?php
   }
  ?>
 </div>
<?php
}
?>
