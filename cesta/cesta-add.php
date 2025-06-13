<?php
session_start();
if(isset($_GET["id"]))
{ $id="$_GET[id]";
  $id_producto="$_GET[id]";
}
if(isset($_GET["cat1"]))
{ $cat1="$_GET[cat1]"; }
if(isset($_GET["cat2"]))
{ $cat2="$_GET[cat2]"; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_GET['codSubCat']))
{ $codSubCat=$_GET['codSubCat']; }

if(isset($_GET["returnto"]))
{ $returnTo="$_GET[returnto]"; }
if(isset($_GET["codigo_barra"]))
{ $codigo_barra="$_GET[codigo_barra]"; }

//echo "<br>sss ".$id." / cat1 ".$cat1." / cat21 ".$cat2. " returnTo ".$returnTo ;

// Check if product is coming or not
if (isset($_GET['id']))
{
  $proid = $_GET['id'];
  // If session cart is not empty
  if (!empty($_SESSION['pedido']))
  {
    // Using "array_column() function" we get the product id existing in session cart array
    $acol = array_column($_SESSION['pedido'], 'id');
    // now we compare whther id already exist with "in_array() function"
    if (in_array($proid, $acol)) {
      // Updating quantity if item already exist
      $_SESSION['pedido'][$proid]['cantidad'] += 1;
    } else {
      // If item doesn't exist in session cart array, we add a new item
      $item = [
        'id' => $_GET['id'],
        'cantidad' => 1
      ];
      $_SESSION['pedido'][$proid] = $item;
    }
  } else {
    // If cart is completely empty, then store item in session cart
    $item = [
      'id' => $_GET['id'],
      'cantidad' => 1
    ];
    $_SESSION['pedido'][$proid] = $item;
  }
}

//if(isset($_SESSION['pedido']) and $_SESSION['pedido']<>"")
//{ $cart=count($_SESSION['pedido']); }

//Return to Page -----------------------------

if(isset($returnToSSSS) and $returnToSSSS<>"")
{
  if(isset($codigo_barra) and $codigo_barra<>"")
  { echo "<html><meta http-equiv=refresh content=0;url=../barcode2.php?codigo_barra=$codigo_barra>"; }

 if(isset($_GET['cat1']) and $_GET['cat1']<>"")
 {
  if(isset($id) and $id<>"")
  { echo "<html><meta http-equiv=refresh content=0;url=../$returnTo.php?cat1=$cat1&cat2=$cat2&idpro=$id&lan=$lan>"; }
  else
  { echo "<html><meta http-equiv=refresh content=0;url=../$returnTo.php?cat1=$cat1&cat2=$cat2&lan=$lan>"; }
  exit();
 }
 else
 {
  echo "<html><meta http-equiv=refresh content=0;url=../$returnTo.php?idpro=$id&lan=$lan>";
 }
}
//else
//{
 //header('location: ../vercat3.php?idpro=$id');
// if(!isset($cat1) or $cat1=="")
// { echo "<html><meta http-equiv=refresh content=0;url=../vercat1.php?cat1=10>"; }
// else
// { echo "<html><meta http-equiv=refresh content=0;url=../vercat1.php?cat1=$cat1>"; }
//}
//echo $cart;
?>
