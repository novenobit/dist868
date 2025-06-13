<?php
// ******************************************************* 2023 ***
// *  Web Site End del Sistema ven868.net                        //
// *  statusAdmin.php                                            //
// ****************************************************************
if(!isset($mobile))
{ $mobile="N"; }
if(!isset($showStatus))
{ $showStatus="S"; }

if($mobile=="S" and $showStatus=="S")
{
?>
<style>
.mobilbar {
  overflow: hidden;
  background-color: #ffffff;
  position: fixed;
  bottom: 0;
  width: 100%;
  margin-top:60px;
}
</style>
<div class="ui hidden divider" style="padding: 1rem;"></div>
<div class="ui hidden divider" style="margin-top:60px;"></div>
<div class="mobilbar">
 <div class="ui fluid four item menu">
  <?php echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='../index.php'>"; ?>
   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
     <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
   </svg>
  </a>
  <?php echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='productos.php'>"; ?>
   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-scooter" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M9 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-.39l1.4 7a2.5 2.5 0 1 1-.98.195l-.189-.938-2.43 3.527A.5.5 0 0 1 9.5 13H4.95a2.5 2.5 0 1 1 0-1h4.287l2.831-4.11L11.09 3H9.5a.5.5 0 0 1-.5-.5M3.915 12a1.5 1.5 0 1 0 0 1H2.5a.5.5 0 0 1 0-1zm8.817-.789A1.499 1.499 0 0 0 13.5 14a1.5 1.5 0 0 0 .213-2.985l.277 1.387a.5.5 0 0 1-.98.196z"/>
   </svg>
  </a>
  <?php
   //if(isset($_SESSION['pedido']) and $_SESSION['pedido']>0)
  // {
    echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='clientes.php'>";
     //   echo count($_SESSION['pedido']);
  ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
      </svg>
    </a>
  <?php
  // }
  ?>
  <?php echo "<a style='background-color:#f4f7fa;color:#000;' class='item' href='cuentas.php?sistema=e&filter=e'>"; ?>
   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-inboxes" viewBox="0 0 16 16">
     <path d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562A.5.5 0 0 0 1.884 9h12.234a.5.5 0 0 0 .496-.438zM3.809.563A1.5 1.5 0 0 1 4.981 0h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zm.941.83.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438l.32-2.562H10.45a2.5 2.5 0 0 1-4.9 0z"/>
   </svg>
  </a>
 </div>
</div>

<?php
$showStatus="N";
}

if($showStatus=="S" and $mobile=="S")
{
?>
<div class="ui hidden divider"></div><br>
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
<?php
}

if($showStatus=="S" and $mobile=="N")
{
?>
<style type="text/css">
.ui.footer.segment {
 margin: 4em 0em 0em;
 padding: 4em 0em;
}
</style>

<div class="ui section divider"></div>
<div class="ui vertical footer segment">
 <div class="ui center aligned container">
  <img src="<?php echo $dirRoot; ?>imagenes/empresa/868-logo-f.png" class="ui centered mini image">
  <div class="ui hidden divider"></div>
  <div class="ui horizontal small divided link list">
    <a class="item" href="<?php echo $dirRoot; ?>clientes/clientes.php">Clientes</a> &#124;
    <a class="item" href="<?php echo $dirRoot; ?>productos/productos.php">Productos</a> &#124;
    <a class="item" href="<?php echo $dirRoot; ?>productos/pro-cat-list.php">Categorias</a> &#124;
    <a class="item" href="<?php echo $dirRoot; ?>productos/pro-subcat-list.php">SubCategorias</a>
  </div>
 </div>
</div>
<!-- Site Scripts -->
<?php
}
if(!isset($dirRoot))
{ $dirRoot="./"; }
if(!isset($jquery))
{ $jquery="S"; }
if($jquery=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/jquery/jquery.min.js"></script>
<?php
}
if(!isset($jqueryUI))
{ $jqueryUI="N"; }
if($jqueryUI=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/jquery-ui/jquery-ui.min.js"></script>
<?php
}
?>
<script src="<?php echo $dirRoot; ?>libs2/components/visibility.min.js"></script>
<script src="<?php echo $dirRoot; ?>libs2/components/transition.min.js"></script>
<script src="<?php echo $dirRoot; ?>libs2/components/sidebar.min.js"></script>
<?php
if(!isset($modal))
{ $modal="N"; }
if($modal=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/dimmer.min.js"></script>
<script src="<?php echo $dirRoot; ?>libs2/components/modal.min.js"></script>
<script>
$('center .button').on('click', function(){
  // using the attribute data-modal to identify for what modal the button references
  modal = $(this).attr('data-modal');
  // creating the individual event attached to click over button
  $('#'+modal+'.modal')
   .modal('setting', 'closable', false)
   .modal('show');
});
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
  fadeDelay: 1.75,
  escapeClose: false,
  clickClose: false,
  closeExisting: false,
  closeClass: 'icon-remove',
  closeText: '!'
});
</script>
<?php
}

if(!isset($checkbox))
{ $checkbox="N"; }
if($checkbox=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/checkbox.min.js"></script>
<script>
  $('.test.checkbox').checkbox('attach events', '.toggle.button');
  $('.ui.checkbox')
  .checkbox()
;
</script>
<?php
}
?>
<script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
</script>

<?php
if(!isset($slider))
{ $slider="N"; }
if($slider=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/components/slider.min.js"></script>
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
  });
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

if(!isset($loadPage))
{ $loadPage="N"; }
if($loadPage=="S")
{
?>
<script>
// A function that loads a page using jQuery
function loadPage(url) {
// Use the jQuery load method to load the page into the content element
  $("#content").load(url);
}
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
<script>
  $('.autoplay').slick({
   centerMode: true,
   slidesToShow: 4,
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
        .data("<?php echo $dirRoot; ?>bots/auto-clientes.php", item)
        .append(item.label)
        .appendTo(ul);
    };
  });
</script>
<?php
}

// New Script -------------------
if(!isset($swiper))
{ $swiper="N"; }
if($swiper=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/swiper/swiper.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
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
// PD Script -------------------
if(!isset($pdscripts))
{ $pdscripts="S"; }
if($pdscripts=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scripts/pdscripts.js"></script>
<?php
}

// Prototype Script -------------------
if(!isset($prototype))
{ $prototype="N"; }
if($prototype=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scripts/prototype.js"></script>
<?php
}

// PopUp Window Script -------------------
if(!isset($popupWindow))
{ $popupWindow="N"; }
if($popupWindow=="S")
{
?>
<script src="<?php echo $dirRoot; ?>libs2/scripts/popup.js"></script>
<?php
}
if($mobile=="S")
{
?>
<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
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
