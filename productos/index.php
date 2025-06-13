<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo1.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$dropdown="S";
$list="S";
$icon="S";
$input="S";
$sideBar="S";
$divider="S";

$table="N";
$message="N";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="N";
$forms="N";
$breadCrumb="N";
$findData="N";
$popup="N";
$tabs="N";
$findPro="N";
$adminArea="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
$autoPro="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
?>

<!-- Page Contents -->
<div class="pusher">
  <div class="ui vertical masthead center aligned segment">

    <div class="ui container">
      <div class="ui large pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a class="active item">Inicio</a>
 <div class="ui simple dropdown item">
        Admin <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="#">Usuario</a>
          <a class="item" href="#">Cliente</a>
       </div>
 </div>
 <div class="ui simple dropdown item">
        Reportes <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="#">Ventas</a>
          <a class="item" href="#">Cuentas Abiertas</a>
       </div>
 </div>
 <div class="ui simple dropdown item">
        Productos <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="#">Producto</a>
          <a class="item" href="#">Categoria</a>
          <a class="item" href="#">Sub-Categoria</a>
          <div class="divider"></div>
          <div class="header">Header Item</div>
          <div class="item">
            <i class="dropdown icon"></i>
            Sub Menu
            <div class="menu">
              <a class="item" href="#">Link Item</a>
              <a class="item" href="#">Link Item</a>
            </div>
          </div>
          <a class="item" href="#">Link Item</a>
        </div>
    </div>
        <div class="right item">
          <a class="ui ../button">Salir</a>
        </div>
      </div>
    </div>

<div class="ui grid container">
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
  <div class="four wide column"></div>
</div>

    <div class="ui text container">
      <h1 class="ui header">
        Imagine-a-Company
      </h1>
      <h2>Do whatever you want when you want to.</h2>
      <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div>
    </div>

  </div>

  <div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">We Help Companies and Companions</h3>
          <p>We can give your company superpowers to do things that they never thought possible. Let us delight your customers and empower your needs...through pure data analytics.</p>
          <h3 class="ui header">We Make Bananas That Can Dance</h3>
          <p>Yes that's right, you thought it was the stuff of dreams, but even bananas can be bioengineered.</p>
        </div>
        <div class="six wide right floated column">
          <img src="assets/images/wireframe/white-image.png" class="ui large bordered rounded image">
        </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a class="ui huge button">Check Them Out</a>
        </div>
      </div>
    </div>
  </div>


  <div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
      <div class="center aligned row">
        <div class="column">
          <h3>"What a Company"</h3>
          <p>That is what they all say about us</p>
        </div>
        <div class="column">
          <h3>"I shouldn't have gone with their competitor."</h3>
          <p>
            <img src="assets/images/avatar/nan.jpg" class="ui avatar image"> <b>Nan</b> Chief Fun Officer Acme Toys
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
      <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
      <a class="ui large button">Read More</a>
      <h4 class="ui horizontal header divider">
        <a href="#">Case Studies</a>
      </h4>
      <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
      <p>Yes I know you probably disregarded the earlier boasts as non-sequitur filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
      <a class="ui large button">I'm Still Quite Interested</a>
    </div>
  </div>


  <div class="ui ../vertical footer segment">
    <div class="ui container">
      <div class="ui stackable ../divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui ../header">About</h4>
          <div class="ui ../link list">
            <a href="#" class="item">Sitemap</a>
            <a href="#" class="item">Contact Us</a>
            <a href="#" class="item">Religious Ceremonies</a>
            <a href="#" class="item">Gazebo Plans</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui ../header">Services</h4>
          <div class="ui ../link list">
            <a href="#" class="item">Banana Pre-Order</a>
            <a href="#" class="item">DNA FAQ</a>
            <a href="#" class="item">How To Access</a>
            <a href="#" class="item">Favorite X-Men</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui ../header">Footer Header</h4>
          <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

