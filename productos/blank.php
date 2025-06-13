<?php
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(!isset($op))
{ $op=""; }
if(!isset($id))
{ $id=""; }
?>
<style>
.font-white { color: #ffffff; }
</style>
<?php
if(isset($id) and $id<>"")
{
?>
<iframe src="<?php echo "producto-ver3.php?id=$id"; ?>" height='500'  width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
<?php
}
if($op=="empaque")
{
  //  echo "$id / ".$op;
}
if($op=="" and $id=="")
{
 $mensaje="Area para la edicion de Productos.";
}
if($op=="del")
{
 $mensaje="Producto fue Eliminado. Puede Continuar Trabajando.";
}
if($op=="des")
{
 $mensaje="Producto fue Desactivado.  Puede Continuar Trabajando.";
}

//$mensaje;
if(isset($mensaje) and $mensaje<>"")
{
?>
<div class="ui message">
  <div class="header">
    <?php echo $mensaje; ?>
  </div>
</div>
<?php
}
?>
