<?php
// ******************************************************* 2023 ***
// *  Web Site End del Sistema ven868.net                        //
// *  statusbar.php                                              //
// ****************************************************************
if(!isset($mobile))
{ $mobile="N"; }
if($mobile=="S")
{
?>
<style>
.mobilbar {
  overflow: hidden;
  background-color: #ffffff;
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>
<div class="ui hidden divider" style="margin-top:60px;"></div>
<div class="mobilbar">
 <div class="ui fluid three item menu">
  <?php echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='$dirRoot"."index.php'>"; ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
   </svg>
  </a>
    <?php
      if(isset($_SESSION['pedido']) and $_SESSION['pedido']>0)
      {
        echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='$dirRoot"."cesta/cesta-ver.php'>";
         echo count($_SESSION['pedido']);
    ?>
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
         <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
         </svg>
        </a>
    <?php
      }
    ?>
  <?php echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='$dirRoot"."user-login.php'>"; ?>
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
     <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
   </svg>
  </a>
 </div>
</div>

<?php
$showStatus="N";
}

if(!isset($showStatus))
{ $showStatus="S"; }
if($showStatus=="S")
{
?>

<br><div class="ui hidden divider"></div><br>
<div class="ui mobile only grid container"  style="margin-bottom:60px;">
  <div class="sixteen wide column center aligned">
   <a class='ui header' href="#top" > Subir <i class="arrow alternate circle up outline icon blueText"></i></a>
  </div>
</div>
<div class="ui computer only grid container">
  <div class="sixteen wide column center aligned aos-item" aos="zoom-in-up" style="margin-bottom:20px;">
   <a class='ui header' href="#top" > Subir <i class="arrow alternate circle up outline icon blueText"></i></a>
  </div>
</div>
<div class="ui hidden divider"></div>

<div class="ui computer only grid">
 <div class="sixteen wide column center aligned statusbar">
 <div class="ui vertical footer segment">

    <div class="ui stackable one column computer only grid">
      <div class="column center aligned">
            <div class="ui hidden divider"></div>
            <a href='#'><i class="large facebook icon"></i></a>
            <a href='#'><i class="large twitter icon"></i></a>
            <a href='#'><i class="large google plus icon"></i></a>
            <a href='#'><i class="large instagram icon"></i></a>
            <a href='#'><i class="large youtube icon"></i></a>
            <a href='https://web.whatsapp.com/send?phone=+584228868868' target='_blank'><i class="large whatsapp icon"></i></a>
            <a href='#'><i class="large telegram icon"></i></a>
      </div>
    </div>

    <div class="ui stackable one column  computer only grid">
     <div class="column center aligned ">
      <p>Importacion y  Distribucion  de Productos Para: Ferreteria, Quincalleria en General, Cosmeticos,  Articulos de Uso Diario,  Articulos de Limpieza,  Cauchos  y Baterias</p>
      <div class="ui container padded30 roundBox" style="background-color:#003399;color:#ffffff;text-align: center">
       <h1 class="ui huge blue header"><a href="galeria.php" class="item">Los Mejores Productos Para Comprar</a></h1>
       <?php
        $sqlCat1=mysqli_query($conex1,"select * from categoria order by nom_categoria");
        while($catData=mysqli_fetch_array($sqlCat1))
        {
         $id_categoria=$catData['id_categoria'];
         $codCat=$catData['cod_categoria'];
         $nom_categoria=$catData['nom_categoria'];
         $icono=$catData['icono'];
         if(isset($icono) and $icono<>"")
         { echo "&nbsp;&#32;<i class='$icono icon'></i>&#32;"; }
         echo "&nbsp;<a href='vercat1.php?op=pl&id=$id_categoria&codCat=$codCat'><span class='white-text'> $nom_categoria</span></a>&nbsp;";
        }
       ?>
      </div>
     </div>
    </div>
    <div class="ui hidden divider"></div>
    <div class="ui container">
     <div class="ui divided equal height grid">
      <div class="eight wide mobile six wide tablet three wide computer column">
          <h4 class="ui header"><span class='font-white'>ven868.net</span></h4>
          <div class="ui link list">
            <a href="sitemap.php" class="item"><span class='font-white'>Sitemap</span></a>
            <a href="contact1.php" class="item"><span class='font-white'>Contacto</span></a>
            <a href="politica-gdpr.php" class="item"><span class='font-white'>Política de Cookies</span></a>
            <a href="politica-privacidad.php" class="item"><span class='font-white'>Política de Privacidad</span></a>
          </div>
        </div>
        <div class="eight wide mobile six wide tablet three wide computer column">
          <h4 class="ui header"><span class='font-white'>Servicos</span></h4>
          <div class="ui link list">
            <a href="faq.php" class="item"><span class='font-white'>FAQ</span></a>
            <a href="vercat-foto3.php?op=pl&id=14&codCat=185&codSubCat=1850010" class="item"><span class='font-white'>Ofertas</span></a>
            <a href="galeria.php" class="item"><span class='font-white'>Galeria</span></a>
            <a href="contact1.php" class="item"><span class='font-white'>Oferta Trabajo</span></a>
          </div>
        </div>
        <div class="sixteen wide mobile six wide tablet nine wide computer column middle aligned center aligned">
          <div class="ui stackable four column computer only grid">
            <div class="column middle aligned center aligned">
              <a href="sitemap.php"><img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner9.jpg'></a>
            </div>
            <div class="column">
             <a href="sitemap.php"><img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner10.jpg'></a>
            </div>
            <div class="column">
             <a href="sitemap.php"><img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner12.jpg'></a>
            </div>
            <div class="column">
             <a href="sitemap.php"><img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner11.jpg'></a>
            </div>
          </div>
          <div class="ui  two column  mobile only grid">
            <div class="column middle aligned center aligned">
             <img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner9.jpg'>
            </div>
            <div class="column">
             <img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner10.jpg'>
            </div>
            <div class="column">
             <img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner12.jpg'>
            </div>
            <div class="column">
             <img class='ui centered rounded image' src='<?php echo $dirRoot; ?>imagenes/100x100/banner11.jpg'>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="ui computer only grid statusbar">
  <div class="sixteen wide mobile eight wide tablet eight wide computer column middle aligned center aligned">
     <p> © 2023-2024 All Rights Reserved - Website creado por: <a href='https://novenobit.com' target='_blank'>novenoBIT.com</a></p>
  </div>
  <div class="sixteen wide mobile eight wide tablet eight wide computer column middle aligned center aligned">
    <h4>Atenci&oacute;n al Cliente +58 212 5417903 </h4>
  </div>
</div>

<?php
if($mobile=="Sss")
{
?>
<div class="ui mobile only vertical footer segment"  style="margin-bottom:30px;">
  <div class="sixteen wide center aligned column">
    <h4>Atenci&oacute;n al Cliente +58 212 5417903 </h4>
  </div>
</div>
<?php
}
?>

<!-- Site Scripts -->
<?php
} // end $showStatus=

if(!isset($dirRoot))
{ $dirRoot="./"; }
if(!isset($jquery))
{ $jquery="S"; }
if($jquery=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/jquery/jquery.min.js"></script>
<script src="<?php echo $dirRoot; ?>libs2/jquery-ui/jquery-ui.min.js"></script>
<?php
}
if(!isset($styleAll))
{ $styleAll="N"; }
if($styleAll=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/semantic.min.js"></script>
<?php
}
else
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/visibility.min.js"></script>
<?php
if(!isset($transition))
{ $transition="N";
  if(isset($dropdown) and $dropdown=="S")
  { $transition="S"; }
}
if($transition=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/transition.min.js"></script>
<?php
}
if(!isset($modal))
{ $modal="N"; }
if($modal=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/dimmer.min.js"></script>
<script src="<?php echo $dirRoot; ?>libs2/components/modal.min.js"></script>
<script>
const openModal = () => {
 $('.ui.modal').modal('setting',
  'transition', 'horizontal flip' ).modal('show');
}
</script>
<?php
}
if(!isset($jQueryModal))
{ $jQueryModal="N"; }
if($jQueryModal=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/jqmodal/jquery.modal.min.js"></script>
<script>
 $("#custom-close").modal({
  fadeDuration: 1000,
  fadeDelay: 1.75 // Will fade in 750ms after the overlay finishes.
  escapeClose: false,
  clickClose: false,
  closeExisting: false,
  closeClass: 'icon-remove',
  closeText: '!'
});
</script>
<?php
}
if(!isset($slider))
{ $slider="N"; }
if($slider=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/slider.min.js"></script>
<?php
}
if(!isset($checkbox))
{ $checkbox="N"; }
if($checkbox=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/checkbox.min.js"></script>
<?php
}
// Tabs Script -------------------
if(!isset($tabs))
{ $tabs="N"; }
if($tabs=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/tab.min.js"></script>
<script>
 $('.menu .item')
   .tab()
 ;
</script>
<?php
}

// PopUp Script -------------------
if(!isset($popup))
{ $popup="N"; }
if($popup=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/popup.min.js"></script>
<script>
$('.boundary.example .button')
  .popup({
    boundary: '.boundary.example .segment'
  })
;
</script>
<?php
}

if(!isset($dropdown))
{ $dropdown="N"; }
if($dropdown=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/dropdown.min.js"></script>
<script>
$('.max.example .ui.normal.dropdown')
  .dropdown({
    maxSelections: 3
  })
;
</script>
<?php
}

if(!isset($accordion))
{ $accordion="N"; }
if($accordion=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/accordion.min.js"></script>
<script>
$('.ui.accordion')
  .accordion()
;
</script>
<?php
}
}
// End styleAll

if(!isset($countUp))
{ $countUp="N"; }
if($countUp=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scripts/vanilla-counter.js"></script>
<script>
  VanillaCounter()
</script>
<?php
}

if(!isset($scrollBar))
{ $scrollBar="N"; }
if($scrollBar=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scrollbar/perfect-scrollbar.min.js"></script>
<script>
  new PerfectScrollbar('#container');
      // Initialize the plugin
      const demo = document.querySelector('#container');
      const ps = new PerfectScrollbar(demo);

      // Handle size change
      document.querySelector('#resize').addEventListener('click', () => {

        // Get updated values
        width = document.querySelector('#width').value;
        height = document.querySelector('#height').value;

        // Set demo sizes
        demo.style.width = `${width}px`;
        demo.style.height = `${height}px`;

        // Update Perfect Scrollbar
        ps.update();
      });
</script>
<?php
}

// Aos Script -------------------
if(!isset($aos))
{ $aos="N"; }
if($aos=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/aos/aos.js"></script>
<script>
  AOS.init({
   easing: 'ease-in-out-sine'
  });
</script>
<?php
}

// Slick Script -------------------
if(!isset($slick))
{ $slick="N"; }
if($slick=="S")
{
?>
 <script src="<?php echo $dirRoot; ?>libs2/slick/slick.min.js"></script>
 <script type="text/javascript">
  $('.autoplay').slick({
   centerMode: true,
   slidesToShow: 4,
   arrows: false,
   slidesToScroll: 1,
     infinite: true,
     centerMode: true,
     centerPadding: '40px',
   autoplay: true,
   autoplaySpeed: 2000,
  });
 </script>
<?php
}

// New Script -------------------
//if(!isset($autoPro))
//{ $autoPro="N"; }
if(isset($autoPro) and $autoPro=="S")
{
?>
<script>
  $(document).ready(function(){
    $('#search').autocomplete({
      source: "<?php echo $dirRoot; ?>bots/auto1-productos.php?dirRoot=<?php echo $dirRoot; ?>",
      minLength: 1,
      maxShowItems: 5,
      select: function(event, ui)
      {
        $('#search').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
  });
</script>

<?php
}

// Find Productos -------------------
if(!isset($findPro))
{ $find="N"; }
if(isset($findPro) and $findPro=="S")
{
?>
<script>
  $(document).ready(function(){
  var dirRoot="<?php echo $dirRoot; ?>";
  var DBase="<?php echo $DBase; ?>";
    $('#findProduct').autocomplete({
     source:'<?php echo $dirRoot; ?>bots/auto-productos.php?DBase=<?php echo "$DBase&dirRoot=$dirRoot"; ?>',
      minLength: 3,
      maxShowItems: 5,
      select: function(event, ui)
      {
        $('#search').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
  });
</script>
<?php
}

// New Script -------------------
if(isset($subCatForm) and $subCatForm=="S")
{
?>
<script>
 $(document).ready(function(){
  $("#btn").click(function(){
   var vnom_categoria = $("#nom_categoria").val();
   if(vnom_categoria)
   {
     alert("Campo Vacio");
   }
   else if(vnom_categoria==""){alert('Campo es requerido')}
   else{
    $.post("<?php echo $dirRoot; ?>pro-cat-post.php", //Required URL of the page on server
    { // Data Sending With Request To Server
     nom_categoria:vnom_categoria,
    },
    function(response,status)
    { // Required Callback Function
     $("#form")[0].reset();
    });
   }
  });
});
</script>

<?php
}

// New Script -------------------
if(isset($autoCliente) and $autoCliente=="S")
{
?>
 <script>
  $(document).ready(function(){
    $('#search').autocomplete({
      source: "../bots/auto-clientes.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#search').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("<?php echo $dirRoot; ?>bots/cliente.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
  });
</script>
<?php
}

// New Script -------------------
if(!isset($animeJs))
{ $animeJs="N"; }
if($animeJs=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scripts/anime.min.js"></script>
<?php
}

// New Script -------------------
if(!isset($swiper))
{ $swiper="N"; }
if($swiper=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper1", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 9000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper2 = new Swiper(".mySwiper2", {
      slidesPerView: 4,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        type: "fraction",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    var swiper3 = new Swiper(".mySwiper3", {
      slidesPerView: 2,
      spaceBetween: 60,
      centeredSlides: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

    var swiper2 = new Swiper(".mySwiper6", {
      slidesPerView: 6,
      spaceBetween: 10,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        type: "fraction",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    var swiper2 = new Swiper(".mySwiper7", {
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: true,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        type: "fraction",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

</script>
<?php
}

// Cart Script -------------------
if(!isset($addCart))
{ $addCart="N"; }
if($addCart=="S")
{
 if(!isset($returnTo))
 { $returnTo=""; }
 if(!isset($idProCesta))
 { $idProCesta=""; }
 if(!isset($cat1))
 { $cat1=""; }
 if(!isset($cat2))
 { $cat2=""; }
?>
<script>
var id = <?php echo $idProCesta; ?>;
var cat1 = "<?php echo $cat1; ?>";
var cat2 = "<?php echo $cat2; ?>";
var returnto = "<?php echo $returnTo; ?>";

$(document).ready(function(){
    $("#addBasket").click(function(event){
        event.preventDefault();
        $("#basketContent").load("./cesta/cesta-add.php?id=" + id + "&cat1=" + cat1 + "&cat2=" + cat2 + "&returnto=" + returnto);
    });
});
</script>

<?php
}
?>

<script>
 $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
          $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });

        $(".ui.dropdown").dropdown();
 });

function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");
  const offsetTop = document.querySelector(href).offsetTop;
  scroll({
    top: offsetTop,
    behavior: "smooth"
  });
}

window.scroll({
  behavior: 'smooth'
});

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
});
</script>

<?php
if($mobile=="N")
{
?>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
</script>

<?php
}

if(!isset($pageLoader))
{ $pageLoader="N"; }
if($pageLoader=="S")
{
?>
<script>
const allSkeleton = document.querySelectorAll('.skeleton')

window.addEventListener('load', function() {
  allSkeleton.forEach(item=> {
    item.classList.remove('skeleton')
  })
})
</script>
<?php
}

// End Scripts -------------------

if(!isset($endPage))
{ $endPage="S"; }
if($endPage=="S")
{
?>
</body></html>
<?php
}
?>
