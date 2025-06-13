<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  session.php                                                //
// ****************************************************************
//if(!isset($_SESSION))
//{ session_start(); }
//if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
 }
 else
 {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 }
//initialize cart if not set or is unset
if(!isset($_SESSION['pedido'])){
  $_SESSION['pedido'] = array();
}
//unset qunatity
unset($_SESSION['qty_array']);
if(!headers_sent())
{ header("Cache-control: private");  }
ini_set("max_execution_time", "0");
//userid();
if(!isset($usuario) or $usuario=="")
{
 if(isset($_SESSION['usuario']) and $_SESSION['usuario']<>"")
 {
  $usuario=$_SESSION['usuario'];
 }
}
if(!isset($_SESSION['pedido']))
{
  $_SESSION['pedido'] = array();
}
if(isset($_SESSION['pedido']) and $_SESSION['pedido']<>"")
{ $cart=count($_SESSION['pedido']); }
?>
