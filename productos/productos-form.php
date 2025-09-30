  <div class="ui sizer vertical blue segment">
   <div class="ui large header">Producto Nuevo</div>
  </div>

  <div class="ui segment">
   <form class="ui form" action="producto-nuevo2.php" method="POST" enctype="multipart/form-data" id="submitForm">
    <div class="ui stackable grid" style="background-color: #2c3e50;color: #FFFFFF;">
     <div class='eight wide column'>
      <label>Categoria</label>
       <?php
       // Select_ProCat();
       //include("$dirRoot"."bots/Select_ProCat.php");
       if(!empty($mcod_categoria))
       {
         $cod_categoria=$mcod_categoria;
         include("../bots/bot-procat.php");
         $cod_categoria=$proCatData['cod_categoria'];
         $nom_categoria=$proCatData['nom_categoria'];
         echo "<select class='select' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
         <option selected value='$cod_categoria'>$nom_categoria</option>";
       }
       else
       {
        // include("$dirRoot"."bots/bot-categoria.php");
         echo "<select class='ui input' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
         <option class='ui input' selected value=''>selecciona</option>";
       }
       $result1=mysqli_query($conex1,"select cod_categoria,nom_categoria from categoria");
       while($categoria=mysqli_fetch_array($result1))
       {
        $cod_categoria=$categoria['cod_categoria'];
        $nom_categoria=$categoria['nom_categoria'];
        echo "<option value='producto-nuevo1.php?codigo_barra=$codigo_barra&mcod_categoria=$cod_categoria'>$nom_categoria</option>";
       }
      echo "</select>";
     ?>
    </div>
    <?php
     //  if(isset($cod_categoria))
     //  $mcod_categoria=$cod_categoria;
     if(!empty($mcod_categoria))
     {
      $numFilas=0;
      $result2=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$mcod_categoria'");
      $numFilas=mysqli_num_rows($result2);
      if($numFilas>0)
      {
       echo "<div class='eight wide column'>
             <label>Sub-Categor&iacute;a</label>";
        echo "<select class='ui input' name='cod_subcategoria'>
          <option selected>seleccione</option>";
          while($subcategoria=mysqli_fetch_array($result2))
          {
            $cod_subcategoria=$subcategoria['cod_subcategoria'];
            $nom_subcategoria=$subcategoria['nom_subcategoria'];
           echo "<option value='$cod_subcategoria'>$nom_subcategoria</option>";
          }
        echo "</select>";
       echo "</div>";
      }
     }
    ?>
    <div class="sixteen wide column">
     <label>Nombre del producto</label>
     <?php
      if(isset($nom_producto) and $nom_producto<>"")
      { echo "<br><input class='ui input' size='25' maxlength='100' type='text' name='nom_producto' id='tags' value='$nom_producto'>"; }
      else
      { echo "<br><input class='ui input' size='25' maxlength='100' type='text' name='nom_producto' id='tags' placeholder='Nombre Producto'>"; }
     ?>
    </div>

    <div class="five wide column">
      <label>Codigo Barra</label>
      <input class='ui input' size='30' maxlength='30' type='text' name='codigo_barra' id='tags' value="<?php echo $codigo_barra; ?>">
    </div>

    <div class="six wide column">
      <label>Codigo UP/CEAN</label>
      <input class='ui input' size='16' maxlength='16' type='text' name='cod_upcean' id='tags' placeholder='Codigo UP/CEAN'>
    </div>

    <div class="five wide column">
      <label>Brand/Marca</label>
      <input class='ui input' size='50' maxlength='100' type='text' name='brand_marca' id='tags' placeholder='Marca'>
    </div>

    <div class="eight wide column">
      <label>Breve Descripcion</label>
      <textarea class="ui input"  name='pro_brevedato' rows=1 cols=30  placeholder='Breve Descripci&oacute;n del Producto'></textarea>
    </div>
    <div class="eight wide column">
     <label>Descripcion</label>
      <textarea class="ui input"  name='datos_producto' rows=2 cols=30  placeholder='Descripci&oacute;n del Producto'></textarea>
    </div>

    <div class="four wide column">
      <label>Precio Compra</label>
      <input  class="ui input" size='12' maxlength='12' type='text' name='precio_compra' placeholder='Precio Compra'>
    </div>

    <div class="four wide column">
      <label class="yellow">Precio Detal</label>
      <input  class="ui input" size='12' maxlength='12' type='text' name='precio1_producto' placeholder='Precio Datal'>
    </div>
    <div class="four wide column">
      <label>Mayorista</label>
      <input  class="ui input" size='12' maxlength='12' type='text' name='precio2_producto' placeholder='Precio Mayorista'>
    </div>
    <div class="four wide column">
      <label>Gran Mayorista</label>
     <input  class="ui input" size='12' maxlength='12' type='text' name='precio3_producto' placeholder='Precio Gran Mayorista'>
    </div>
    <div class="four wide column">
     <label>Precio Especial</label>
     <input  class="ui input" size='12' maxlength='12' type='text' name='precio4_producto' placeholder='Precio Especial'>
    </div>

    <div class='four wide column'>
     <lable>Tipo de Unidad</lable>
     <?php
       echo "<select class='ui input' name='nom_unidad'>
        <option selected>Unidad</option>
         <option></option>";
          $result=mysqli_query($conex1,"select nom_unidad from unidades");
          while($unidades=mysqli_fetch_array($result))
          {
            echo "<option value='{$unidades['nom_unidad']}'>{$unidades['nom_unidad']}</option>";
          }
       echo "</select>";
     ?>
    </div>

    <div class="four wide column">
      <label>Empaque</label>
      <input class='ui input' size='50' maxlength='50' type='text' name='empaque' id='tags' placeholder='Empaque'>
    </div>

    <div class="four wide column">
      <label>Tamano Fisico</label>
      <input class='ui input' size='20' maxlength='20' type='text' name='fisico' id='tags' placeholder='Fisico'>
    </div>

    <div class="four wide column">
      <label>Tamano</label>
      <input class='ui input' size='12' maxlength='12' type='text' name='tamano' id='tags' placeholder='Tamano'>
    </div>

    <div class="four wide column">
      <label>Peso</label>
      <input class='ui input' size='12' maxlength='12' type='text' name='peso' id='tags' placeholder='Peso'>
    </div>

    <div class="four wide column">
      <label>Bultos</label>
      <input class='ui input' size='12' maxlength='12' type='text' name='bultos' id='tags' placeholder='Bultos'>
    </div>

    <div class="four wide column">
      <label>Pais Origen</label>
       <?php
        include("$dirRoot"."datafiles/select-pais.php");
       ?>
    </div>

    <div class='eight wide column'>
     <label>Foto/Imagen</label>
     <input type='file' class='ui input' name='foto_producto'>
     <p>30 caracteres max sin simbolos &#124; Tama&ntilde;o de Max:600x600px </p> 
    </div>
    <div class='sixteen wide column'>
     <input class="ui submit blue button" type="submit" value="Enviar Datos" id="btnSubmit">
     <input class="ui submit button" type="reset" value='Limpiar Campos'>
    </div>
   </div>
  </form>
  </div>

