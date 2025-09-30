<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat-edit1.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$autoCliente="S";
$topFile="N";
$headFile="N";
$topAdmin="N";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$message="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$loadPage="S";
$popup="S";
$table="S";
$tabs="S";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
//-------------------------------------------
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
//-------------------------------------------
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $id_subcategoria=$id;
}
if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(isset($_GET['cod_subcategoria']))
{ $cod_subcategoria="$_GET[cod_subcategoria]"; }

if(!isset($id) or $id=="")
{
  $error="error en los datos";
  error();
  exit();
}
if(isset($id) and $id<>"")
{
  include("$dirRoot"."bots/bot-subcategoria.php");
  if(!isset($subCatData))
  {
      $error="esta categoria no existe en la base de datos";
      error();
      exit();
  }
}

include("find-products.php");

//-----------------------------------------------
include("$dirRoot"."datafiles/subCatData.php");
//-----------------------------------------------
?>


<p><div class="ui hidden divider"></div></p>
<div class="ui container">
 <h3 style="color:#fc411e;"> <?php echo $subCatData['nom_subcategoria']; ?></h3>

<div class="ui top attached tabular menu">
  <a class="active item" data-tab="datos">Datos</a>
  <a class="active item" data-tab="foto">Foto</a>
  <a class="item" data-tab="edita">Del</a>
</div>
<div class="ui bottom attached active tab segment" data-tab="datos">

  <div class="ui stackable two column grid">
   <div class="column">
      <form class="ui form" action="<?php echo "pro-subcat-edit2.php?id=$id"; ?>" method="post" enctype="multipart/form-data" style="width:400px">

        <div class="ui card"  style="width:100%">
          <div class="content">
            <div class="header">Cambiar Datos Sub-Categoria</div>
          </div>
          <div class="content">
            <h4 class="ui sub header">Categoria/Grupo</h4>
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <?php
                      //echo "<input class='ui input' size='30' maxlength='30' type='text' name='nom_categoria' value='$nom_categoria'>";
                        if(isset($mcod_categoria) and $mcod_categoria<>"")
                        {
                          $cod_categoria=$mcod_categoria;
                          include("$dirRoot"."bots/bot-categoria.php");
                          include("$dirRoot"."datafiles/catData.php");
                          if(!isset($nom_categoria) or $nom_categoria=="")
                          { $nom_categoria="error de categoria"; }
                          echo "<select class='select' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
                            <option selectedclass='font-14' value='$cod_categoria'>$nom_categoria</option>";
                        }
                        else
                        {
                            echo "<select class='ui input' name='cod_categoria' onchange=\"MM_jumpMenu(this,0)\">
                            <option class='ui input' selected value=''>selecciona</option>";
                        }
                        $result1=mysqli_query($conex1,"select cod_categoria,nom_categoria from categoria");
                        while($categoria=mysqli_fetch_array($result1))
                        {
                          $cod_categoria=$categoria['cod_categoria'];
                          $nom_categoria=$categoria['nom_categoria'];
                          echo "<option class='font-14' value='pro-subcat-edit1.php?id=$id&mcod_categoria=$cod_categoria'>$nom_categoria</option>";
                        }
                        echo "</select>";
                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content">
            <h4 class="ui sub header">Sub-Categoria</h4>
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <?php
                    //echo "<input class='ui input' size='30' maxlength='30' type='text' name='nom_subcategoria' value='$nom_subcategoria'>";
                    if(isset($mcod_categoria) and $mcod_categoria<>"")
                    {
                      //    if(!empty($mcod_categoria))
                      //    {
                      //    echo "<select class='ui input' name='cod_subcategoria'>
                    //     <option selected value='$cod_subcategoria'>$nom_subcategoria</option>";
                    //       $result2=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$mcod_categoria'");
                    //       while($subcategoria=mysqli_fetch_array($result2))
                    //       {
                    //       $cod_subcategoria="{$subcategoria['cod_subcategoria']}";
                    //       $nom_subcategoria="{$subcategoria['nom_subcategoria']}";
                    //       echo "<option class='font-14' value='$cod_subcategoria'>$nom_subcategoria</option>";
                    //       }
                    //     echo "</select>";
                    //     }

              echo "<input class='ui input' size='30' maxlength='30' type='text' name='nom_subcategoria' value='$nom_subcategoria'>";
                      }

                  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content">
            <h4 class="ui sub header">Foto</h4>
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <div class="summary">
                    <input class='ui input' type='file' name='foto_subcategoria'>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="extra content">
            <button class="ui button" type="submit"  style="background-color:#fc411e;color:#ffffff;">Enviar Datos</button>
          </div>
        </div>

      </form>
   </div>

  </div>

</div>


<div class="ui bottom attached tab segment" data-tab="foto">
        <?php
         if(isset($foto_subcategoria) and $foto_subcategoria<>"")
         {
        ?>
         <div class="content">
           <?php echo "<img class='ui image' src='../imagenes/menu/$foto_subcategoria'  style='width:300px'>"; ?>
         </div>
        <?php
         }
        ?>
</div>

<div class="ui bottom attached tab segment" data-tab="edita">
  <?php
      $numFilas=0;
      $sqlSubCat=mysqli_query($conex1, "select id_producto,nom_producto from productos  where cod_subcategoria='$cod_subcategoria' and activo='S' limit 20");
      $numFilas=mysqli_num_rows($sqlSubCat);
      if($numFilas==0)
      {
         echo "<a class='ui red button' href='pro-subcat-del1.php?id=$id'>Borrar este Sub-Categoria</a>";
      }
      else
      {
       echo "<div class='ui red message'>
        <div class='header'>no puedo borrar porque tiene datos de Productos:</div>
       </div><br>";
          $ves=1;
          while($proData=mysqli_fetch_array($sqlSubCat))
          {
             echo $ves." ".$proData['nom_producto'];
             $ves++;
             if($ves>=2 and $ves<=$numFilas)
             { echo " &#124; "; }
          }
      }
  ?>
</div>
</div>

<br><br><br>
<?php
$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
