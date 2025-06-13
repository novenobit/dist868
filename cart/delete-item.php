<?php
	session_start();

	//remove the id from our cart array
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['cantidad'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['cantidad'] = array_values($_SESSION['cantidad']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: view-cart.php');
?>
