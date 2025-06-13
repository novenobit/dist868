<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($iduser) or !isset($_SESSION['apellido']))
{ include_once("../users/user-check2.php"); }
FechayHora();
$todoBien="N";

if(isset($_SESSION['sistema']))
{ $sistem=$_SESSION['sistema']; }

if($idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php?sistema=$sistema>";
 exit();
}

if(!isset($mobile))
{ $mobile="N"; }

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."mobile/index.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
?>

 <div class="mainContent" id="content">
   <div class="ui grid">
     <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       if($VerVentas=="S")
       { include("$dirRoot"."data/marquee.php");  }
      ?>
     </div>
     <div class="sixteen wide tablet ten wide computer column">

      <div class="ui two column grid">

          <!-- Tienda -->
          <div class="column">
            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php echo "<a class='header' href='$dirRoot"."index.php'>"; ?>
                 <img src="../imagenes/banners/latienda.jpg">
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php echo "<a class='header' href='$dirRoot"."index.php'>"; ?>
                    <h2>La Tienda</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$dirRoot"."index.php'>"; ?>
                    <i class="circular colored blue store icon"></i>
                    Tienda de Productos
                   </a>
                </div>
              </div>
            </div>

          </div>
          <!-- Productos -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkProductos'>"; ?>
               <img src="../imagenes/banners/productos.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkProductos'>"; ?>
                    <h2>Productos</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkProductos'>"; ?>
                    <i class="circular colored blue product hunt icon"></i>
                     Lista de Productos y Items
                   </a>
                </div>
              </div>
            </div>

          </div>
          <!-- Clientes -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkClientes'>"; ?>
               <img src="../imagenes/banners/clientes.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkClientes'>"; ?>
                    <h2>Clientes</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkClientes'>"; ?>
                     <i class="circular colored blue users icon"></i>
                     Listado de Clientes
                   </a>
                </div>
              </div>
            </div>

          </div>
         <!-- Usuarios -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkUsuarios'>"; ?>
               <img src="../imagenes/banners/usuarios.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkUsuarios'>"; ?>
                    <h2>Usuarios</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkUsuarios'>"; ?>
                     <i class="circular colored blue user tie icon"></i>
                     Lista de Usuarios
                   </a>
                </div>
              </div>
            </div>

          </div>
          <!-- Comentarios -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkComenta'>"; ?>
               <img src="../imagenes/banners/comentarios.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkComenta'>"; ?>
                    <h2>Comentarios</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkComenta'>"; ?>
                    <i class="circular colored blue comment icon"></i>
                    Lista de Comentarios
                   </a>
                </div>
              </div>
            </div>

          </div>
          <!-- Cuentas Todos -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkCtaEmpleado'>"; ?>
               <img src="../imagenes/banners/cuentas.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkCtaEmpleado'>"; ?>
                    <h2>Cuentas</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkCtaEmpleado'>"; ?>
                    <i class="circular colored blue user outline icon"></i>
                    Area de Ventas
                   </a>
                </div>
              </div>
            </div>

          </div>
          <!-- Cuentas Publico -->
          <div class="column">


            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkCtaPublico'>"; ?>
               <img src="../imagenes/banners/pedironline.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkCtaPublico'>"; ?>
                    <h2>Online</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkCtaPublico'>"; ?>
                   <i class="circular colored blue shopping cart icon"></i>
                   Pedidos Online / Publico General
                   </a>
                </div>
              </div>
            </div>


          </div>
          <!-- Catalogo -->
          <div class="column">

            <div class="ui fluid raised horizontal card" style="background-color:#f4f7fa;border-radius:15px;">
              <div class="image">
                <?php  echo "<a class='header' href='$linkCatalogo'>"; ?>
               <img src="../imagenes/banners/catalogo.jpg" alt="" />
                </a>
              </div>
              <div class="content">
                <div class="meta">
                  <?php  echo "<a class='header' href='$linkCatalogo'>"; ?>
                    <h2>Catalogos</h2>
                  </a>
                </div>
                <div class="description">
                   <?php echo "<a class='header' href='$linkCatalogo'>"; ?>
                   <i class="circular colored blue clipboard icon"></i>
                   Creaci&oacute;n de C&aacute;talogos
                   </a>
                </div>
              </div>
            </div>


           </div>
          </div>

     </div>
     <div class="sixteen wide tablet six wide computer column">
      <?php
       if($VerVentas=="S")
       {
      ?>
        <div class="ui grid">

         <div class="sixteen wide tablet eight wide computer column">
          <?php
           if($VerVentas=="S")
           {
             include("../includes/left-menu.php");
           }
          ?>
         </div>
         <div class="sixteen wide tablet eight wide computer column">
          <?php
           if($VerVentas=="S")
           {
             include("../productos/left-menu.php");
           }
          ?>
         </div>
        </div>
      <?php
       }
       else
       {
          echo "<div class='ui floating message' style='background-color:#303443;color:#fff;text-align:center;'>mas de 6mil productos</div>";
       }
      ?>
     </div>
   </div>

 </div>

<?php
}
$showStatus="N";
include("../includes/statusAdmin.php");
?>
