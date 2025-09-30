<div class="ui grey segment" style="background-color: #A0A0A0;color:#ffffff;">
 <?php
  echo "<form class='ui grey form' action='producto-edit2.php?op=edt&id=$id' method='POST'  id='submitform'>";
 ?>

 <div class="field">
  <label>Nombre Producto</label>
   <?php echo "<input value='{$proData['nom_producto']}' name='nom_producto' type='text'>"; ?>
 </div>

<div class="two fields">
 <div class="field">
   <label>Breve Descripci&oacute;n</label>
   <?php
    echo "<input value='{$proData['pro_brevedato']}' name='pro_brevedato' type='text'>";
   ?>
 </div>
 <div class="field">
   <label>Descripci&oacute;n</label>
   <?php
    echo "<input value='{$proData['datos_producto']}' name='datos_producto' type='text'>";
   ?>
 </div>
</div>

<div class="two fields">
  <div class="field">
    <label>Codigo Barra</label>
    <?php
     echo "<input value='{$proData['codigo_barra']}' name='codigo_barra' type='text'>";
    ?>
  </div>

  <div class="field">
    <label>UP/CEAN</label>
    <?php
     echo "<input value='{$proData['cod_upcean']}' name='cod_upcean' type='text'>";
    ?>
  </div>
</div>

<div class="two fields">
  <div class="field">
   <label>Unidad/Medida</label>
   <?php
     include("$dirRoot"."datafiles/unidades-select-nom.php");
   ?>
  </div>
  <div class="field">
   <label>Empaque</label>
   <?php
    echo "<input value='{$proData['empaque']}' name='empaque' type='text'>";
   ?>
  </div>
</div>

<div class="two fields">
 <div class="field">
   <label>Marca</label>
   <?php
    echo "<input value='{$proData['brand_marca']}' name='brand_marca' type='text'>";
   ?>
 </div>

  <div class="field">
   <label>Pais Origen</label>
   <?php
    echo "<input value='{$proData['paisorigen']}' name='paisorigen' type='text'>";
   ?>
 </div>
</div>


<div class="two equal width fields">
 <div class="field">
  <label>Precio Compra</label>
   <?php
    echo "<input value='{$proData['precio_compra']}' name='precio_compra' type='text'>";
   ?>
 </div>
 <div class="field">
  <label>Precio Detal</label>
   <?php
    echo "<input value='{$proData['precio1_producto']}' name='precio1_producto' type='text'>";
   ?>
 </div>
</div>

<div class="three equal width fields">
 <div class="field">
  <label>Precio Mayorista</label>
   <?php
    echo "<input value='{$proData['precio2_producto']}' name='precio2_producto' type='text'>";
   ?>
 </div>
 <div class="field">
  <label>Precio Gran Mayorista</label>
   <?php
    echo "<input value='{$proData['precio3_producto']}' name='precio3_producto' type='text'>";
   ?>
 </div>

 <div class="field">
  <label>Precio Especial</label>
   <?php
    echo "<input value='{$proData['precio4_producto']}' name='precio4_producto' type='text'>";
   ?>
 </div>
</div>

<button class="ui blue button" type="submit">Enviar Datos</button>
<button class="ui button" type="reset">Limpiar Campos</button>

 </form>
 </div>

