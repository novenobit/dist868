<?php
// ******************************************************* 2023 ***
// *  Página Principal del Sistema ven868.net                    //
// *  topfile.php                                                //
// ****************************************************************
if(!isset($mobile))
{ $mobile="N"; }
if(!isset($tablet))
{ $tablet="N"; }

if($mobile=="S")
{
?>
<style>
/* From Uiverse.io by satyamchaudharydev */
/* From uiverse.io by @satyamchaudharydev */
/* removing default style of button */

.topForm button {
  border: none;
  background: none;
  color: #8b8ba7;
}
/* styling of whole input container */
.topForm {
  --timing: 0.3s;
  --width-of-input: 200px;
  --height-of-input: 40px;
  --border-height: 2px;
  --input-bg: #fff;
  --border-color: #2f2ee9;
  --border-radius: 30px;
  --after-border-radius: 1px;
  position: relative;
  width: var(--width-of-input);
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#fff);
}
/* styling of Input */
.input {
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
}
/* styling of animated border */
.topForm:before {
  content: "";
  position: absolute;
  background: var(--border-color);
  transform: scaleX(0);
  transform-origin: center;
  width: 100%;
  height: var(--border-height);
  left: 0;
  bottom: 0;
  border-radius: 1px;
  transition: transform var(--timing) ease;
}
/* Hover on Input */
.topForm:focus-within {
  border-radius: var(--after-border-radius);
}

input:focus {
  outline: none;
}
/* here is code of animated border */
.topForm:focus-within:before {
  transform: scale(1);
}
/* styling of close button */
/* == you can click the close button to remove text == */
.reset {
  border: none;
  background: none;
  opacity: 0;
  visibility: hidden;
}
/* close button shown when typing */
input:not(:placeholder-shown) ~ .reset {
  opacity: 1;
  visibility: visible;
}
/* sizing svg icons */
.topForm svg {
  width: 17px;
  margin-top: 3px;
}
</style>
<!-- Mobile Menu -->
 <div class="ui large top fixed main borderless navbar menu" style="background-color:#f4f7fa;color:#000;border-style:none;height:50px;">
  <div class="ui container" style="background-color:#f4f7fa;color:#000;border-style: none;">
   <div class="ui scrolling dropdown item">
    <img class="logo" src="<?php echo $dirRoot; ?>imagenes/empresa/868-logo.png" alt="ven868.net" style='height:40px;'>
    <div class="menu">
      <?php
         echo "<a class='item' href='index.php'><i class='home icon'></i> Inicio</a>";
         $sqlCat=mysqli_query($conex1,"select cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
         while($catData=mysqli_fetch_array($sqlCat))
         {
           $codCat=$catData['cod_categoria'];
           $nom_categoria=$catData['nom_categoria'];
           $icono=$catData['icono'];
           if(!isset($icono))
           { $icono=""; }
           echo "<a class='item' href='$dirRoot"."vercat1.php?codCat=$codCat'><i class='$icono icon'></i>$nom_categoria</a>";
         }
      ?>
    </div>
   </div>
   <div class="item mobile only">
    <?php
     if(!isset($topFindPro))
     {$topFindPro="S"; }
     if($topFindPro=="S")
     {
    ?>

      <form class="topForm" action='productos-buscar.php?op2=nomall' method='POST' enctype='multipart/form-data'>
         <button>
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <input class="input" placeholder="Buscar Producto.." required="" type="text" name="buscar" id="search">
            <button class="reset" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
         </button>
      </form>

    <?php
     }
    ?>
   </div>
  </div>
  <div class="right menu mobile only" style="background-color:#f4f7fa;color:#000;">

    <div class="ui simple dropdown item">
     <i class="user tie icon"></i>
     <div class="menu">
      <?php
        if(isset($usuario) and $usuario<>"")
        {
          echo "<a class='item' href='$dirRoot"."mobile/index.php'>Admin</a>";
          echo "<a class='item' href='$dirRoot"."users/user-logout.php'>Logout</a>";
        }
        else
        { echo "<a class='item' href='$dirRoot"."user-login.php'>Entrar</a>"; }
      ?>
       <div class="divider"></div>
       <a class="item" href='<?php echo $dirRoot; ?>user-registrar1.php'>Registra</a>
     </div>
    </div>
  </div>
 </div>

<?php
}
else
{
?>
<!-- Computer Menu -->
<div class="ui large top fixed main borderless menu" id="navbar">
 <div class="ui container">

   <a href="<?php echo $dirRoot; ?>contact1.php" class="header item">
       <img class="logo" src="<?php echo $dirRoot; ?>imagenes/empresa/868-logo.png"  alt="ven868.net">
   </a>
   <a class="item" href='<?php echo $dirRoot; ?>index.php'> <i class="home icon"></i></a>
   <a class="item" href="https://api.whatsapp.com/send?phone=584228868868" target='_blank'><i class="phone icon"></i></a>
   <a class="item"><i class="facebook icon"></i></a>

   <div class="item computer only">
    <?php
     if(!isset($topFindPro))
     {$topFindPro="S"; }
     if($topFindPro=="S")
     {
    ?>
     <form action='productos-buscar.php?op2=nomall' method='POST' enctype='multipart/form-data'>
      <div class="ui small icon input">
       <input type="text" name="nomBuscar" placeholder="Buscar Producto.." id="search" style="width:400px;border-radius:10px;">
       <i class="search icon" type="submit"></i>
      </div>
     </form>
    <?php
     }
    ?>
   </div>
   <div class="right menu  mobile only">
    <?php echo "<a class='item' href='$dirRoot"."productos-buscar.php'><i class='product hunt icon'></i></a>"; ?>
    <?php echo "<a class='item' href='$dirRoot"."barcode1.php'><i class='big barcode icon'></i></a>"; ?>
    <div class="ui scrolling dropdown item">
      <span>Productos</span> <i class="dropdown icon"></i>
      <div class="menu">
        <?php
         $sqlCat=mysqli_query($conex1,"select cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
         while($catData=mysqli_fetch_array($sqlCat))
         {
           $codCat=$catData['cod_categoria'];
           $nom_categoria=$catData['nom_categoria'];
           $icono=$catData['icono'];
           if(!isset($icono))
           { $icono=""; }
           echo "<a class='item' href='$dirRoot"."vercat1.php?codCat=$codCat'><i class='$icono icon'></i>$nom_categoria</a>";
         }
        ?>
      </div>
    </div>
    <div class="ui simple dropdown item">
      <i class="user tie icon"></i>
      <div class="menu">
       <?php
        if(isset($usuario) and $usuario<>"")
        {
          echo "<a class='item' href='$dirRoot"."users/usersection.php'>Admin</a>";
          echo "<a class='item' href='$dirRoot"."users/user-logout.php'>Logout</a>";
        }
        else
        { echo "<a class='item' href='$dirRoot"."user-login.php'>Entrar</a>"; }
       ?>
        <div class="divider"></div>
        <a class="item" href='<?php echo $dirRoot; ?>user-registrar1.php'>Registra</a>
      </div>
     </div>
     <?php
        if(isset($_SESSION['pedido']) and $_SESSION['pedido']<>"")
        {
          if(!isset($cart))
          { $cart=""; }
//echo count($_SESSION['pedido'] ?? []);
if(isset($_SESSION['pedido']) and $_SESSION['pedido']<>"")
{ $cart=count($_SESSION['pedido']); }
          //<div class='item' id='basketContent'>$cart</div>
          echo "<a class='item' href='$dirRoot"."cesta/cesta-ver.php'><i class='shopping cart icon'></i> <div id='basketContent'></div>$cart</a>";
        }
     ?>
  </div>
 </div>
</div>
<?php
} // end Computer Section
if(!isset($showTitle))
{ $showTitle="S"; }

if(!isset($mainFile))
{ $mainFile="N"; }
if(!isset($userLogin))
{ $userLogin="N"; }
if($mainFile=="S" or $userLogin=="S" and $showTitle=="S")
{
 if($mobile=="N")
 {
 //<h1 class="ui center aligned header"><span class='font-white'>Distribuidora <span class='font-blue'>868</span>, ca</span></h1>
 }
}
else
{
 if($mobile=="N" and $showTitle=="S")
 {
   //<h1 class="ui center aligned header">Distribuidora <span class='blueTextBold'>868</span>, ca</h1>
 }
}
?>
<span class='header'></span>
