<?php
session_start();

if(isset($_GET["lan"]))
{ $lan="$_GET[lan]"; }

if ($_POST['update']) {

  $upid = $_POST['upid'];

  $acol = array_column($_SESSION['pedido'], 'id');

  if (in_array($_POST['upid'], $acol)) {
    $_SESSION['pedido'][$upid]['cantidad'] = $_POST['cantidad'];
  } else {
    $item = [
      'id' => $upid,
      'cantidad' => 1
    ];
    $_SESSION['pedido'][$upid] = $item;
  }

  header("location: cesta-ver.php?lan=$lan");
}
