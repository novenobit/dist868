
<div class="ui segment" style="background-color:#3970fe;color:#ffffff;">
 <?php
  echo "<form class='ui grey form' action='producto-edit2.php?op=$op&id=$id' method='POST'  id='submitform'>";
 ?>
  <div class="field">
    <label style="color:#ffffff;">Nombre Producto</label>
    <?php echo "<input value='{$proData['nom_producto']}' name='nom_producto' type='text'>"; ?>
  </div>
  <div class="two fields">
    <div class="field">
      <label style="color:#ffffff;">Breve Descripci&oacute;n</label>
      <?php
        echo "<input value='{$proData['pro_brevedato']}' name='pro_brevedato' type='text'>";
      ?>
    </div>
    <div class="field">
      <label style="color:#ffffff;">Descripci&oacute;n</label>
      <?php
        echo "<input value='{$proData['datos_producto']}' name='datos_producto' type='text'>";
      ?>
    </div>
  </div>
  <div class="two fields">
      <div class="field">
        <label style="color:#ffffff;">Codigo Barra</label>
        <?php
        echo "<input value='{$proData['codigo_barra']}' name='codigo_barra' type='text'>";
        ?>
      </div>

      <div class="field">
        <label style="color:#ffffff;">UP/CEAN</label>
        <?php
        echo "<input value='{$proData['cod_upcean']}' name='cod_upcean' type='text'>";
        ?>
      </div>
  </div>
  <div class="ui stackable two column padded grid">
    <div class="column"  style="background-color:#101010;color:#ffffff;">
        <h3>Precios</h3>
        <div class="field">
        <label style="color:#ffffff;"><span class='font-yellow'>Precio Compra</span></label>
          <?php
          echo "<input value='{$proData['precio_compra']}' name='precio_compra' type='text'>";
          ?>
        </div>
        <div class="field">
        <label style="color:#ffffff;"><span class='font-yellow'>Precio Detal</span></label>
          <?php
          echo "<input value='{$proData['precio1_producto']}' name='precio1_producto' type='text'>";
          ?>
        </div>
        <div class="field">
        <label style="color:#ffffff;"><span class='font-yellow'>Precio Mayorista</span></label>
          <?php
          echo "<input value='{$proData['precio2_producto']}' name='precio2_producto' type='text'>";
          ?>
        </div>
        <div class="field">
        <label style="color:#ffffff;"><span class='font-yellow'>Precio Gran Mayorista</span></label>
          <?php
          echo "<input value='{$proData['precio3_producto']}' name='precio3_producto' type='text'>";
          ?>
        </div>
        <div class="field">
        <label style="color:#ffffff;"><span class='font-yellow'>Precio Especial</span></label>
          <?php
          echo "<input value='{$proData['precio4_producto']}' name='precio4_producto' type='text'>";
          ?>
        </div>
    </div>
    <div class="column">
      <div class="field">
        <label style="color:#ffffff;">Unidad/Medida</label>
        <?php
          include("$dirRoot"."datafiles/unidades-select-nom.php");
        ?>
      </div>
      <div class="field">
        <label style="color:#ffffff;">Empaque</label>
        <?php
          echo "<input value='{$proData['empaque']}' name='empaque' type='text'>";
        ?>
      </div>
      <div class="field">
        <label style="color:#ffffff;">Existencia</label>
        <?php
          echo "<input value='{$proData['stock_actual']}' name='stock_actual' type='text'>";
        ?>
      </div>
    </div>
    <div class="column">
      <div class="field">
        <label style="color:#ffffff;">Marca</label>
        <?php
          echo "<input value='{$proData['brand_marca']}' name='brand_marca' type='text'>";
        ?>
      </div>
      <div class="field">
        <label style="color:#ffffff;">Pais Origen</label>
        <?php
          echo "<input value='{$proData['paisorigen']}' name='paisorigen' type='text'>";
        ?>
      </div>
      <div class="field padded" style="background-color:#0970cd;color:#ffffff;">
        <label style="color:#ffffff;">Bloquear Precio Gran Mayor</label>
        <?php
         if($proData['cambia_precio']=="S")
         {
        ?>
         <div class="ui radio checkbox checked">
         <input type="radio" name="cambia_precio" checked="S" tabindex="0" class="hidden">
         <label style="color:#ffffff;">Cambia precio</label>
        <div class="ui radio checkbox">
         <input type="radio" name="cambia_precio" tabindex="0" class="hidden">
         <label style="color:#ffffff;">No Cambia precio</label>
       </div>
       <?php
       }
       else
       {
        ?>
         <div class="ui radio checkbox checked">
         <input type="radio" name="cambia_precio" tabindex="0" class="hidden">
         <label style="color:#ffffff;">Si Cambia Precio</label>
        <div class="ui radio checkbox">
         <input type="radio" name="cambia_precio" checked="S" tabindex="0" class="hidden">
         <label style="color:#ffffff;">No Cambia Precio</label>
       </div>
       <?php
       }
       ?>

      </div>
     </div>
   </div>
  </div>
  <button class="ui pink button" type="submit">Enviar Datos</button>
  <button class="ui button" type="reset">Limpiar Campos</button>
 </form>
</div>

