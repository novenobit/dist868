<?php
// session_start();
if(isset($_POST['save'])){
  foreach($_POST['indexes'] as $key){
    $_SESSION['cantidad'][$key] = $_POST['qty_'.$key];
  }
  $_SESSION['message'] = 'Cart updated successfully';
  header('location: ver.php');
}
