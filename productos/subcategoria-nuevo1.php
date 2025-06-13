
<h2>Nueva Sub-Categor&iacute;a</h2>

<?php echo "<form class='ui form' action='subcategoria-nuevo2.php?op=pl&mobile=$mobile' method='post' enctype='multipart/form-data'>"; ?>
<div class='ui grid'>
  <div class='sixteen wide column'>
    Categor&iacute;a
    <?php include("$dirRoot"."bots/Select_ProCat.php"); ?>
  </div>
  <div class='sixteen wide column'>
    Nombre Sub Categoria
    <input size='30' maxlength='30' type='text' class='ui input' name='nom_subcategoria'>
  </div>
  <div class='sixteen wide column'>
    Descripci&oacute;n Sub Categoria
  </div>
  <div class='sixteen wide column'>
    <textarea class='ui input' name='datos_subcategoria' rows=2 cols=40></textarea>
  </div>
  <div class='sixteen wide column'>
    Foto Imagen <span class='font-10 font-red'>(Tama&ntilde;o Foto = 90x90px del Tipo JPG o PNG)</span>
    <input type='file' class='ui input' name='foto_subcategoria'>
  </div>
 </div>
 <input class='ui pink button' type="submit" value='Enviar Datos'>
 <input class='ui button' type="reset" value='Limpiar Campos'>
</form>

