<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuenta1-ver1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="S";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$noFrame="S";
$popup="N";
$popupWindow="S";
$rating="N";
$sidebar="N";
$slick="N";
$step="S";
$swiper="N";
$table="S";
$tableScroll="S";
$topAdmin="S";
$tableUse="cuentas1";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($sistema))
{ $sistema=$_SESSION['sistema']; }

FechayHora();
$todoBien="N";
//if(!isset($sistema))
//{ $sistema='e'; }
//if($sistema=="e" or $sistema=="v")
// if($CrearCuenta=="N" or $AreaCuentas=="N" or $idnivel>=4)
// echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php?sistema=$sistema>";
//  exit();
//if($sistema=="c" or $sistema=="o")

//if(isset($sistema) and $sistema<>"")
//{

// if($sistema=="e" or $sistema=="v")
   include("../includes/leftbar.php");
// if($sistema=="c" or $sistema=="o")
//   include("../includes/leftbar-clientes.php");

 FechayHora();
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['op']))
 { $op=$_GET['op']; }
 if(isset($_GET['op2']))
 { $op2=$_GET['op2']; }
 if(isset($_GET['idcart']))
 { $idcart=$_GET['idcart']; }
 if(isset($_GET['id_cuenta']))
 { $id_cuenta=$_GET['id_cuenta']; }
 if(isset($_GET['rand_num']))
 { $rand_num=$_GET['rand_num']; }
 if(isset($_GET['sistema']))
 { $sistema=$_GET['sistema']; }
?>

<div class="mainContent">
 <div id="content">
  <?php
//--------------------------------
   include("sub-menu.php");
//--------------------------------
  ?>

   <div class="ui centered grid">
    <div class="twelve wide tablet eleven wide computer column">
     <?php
      include("cuenta-ver2.php");
     ?>
     <div id="dataDiv"></div>
    </div>
    <div class="four wide tablet five wide computer column">
       <?php
         //include("left-menu.php");
       ?>
       <div class="result text-center"></div>
       <style>
        iframe {
         position: absolute;
           display: block;       /* iframes are inline by default */
           font-color: #fff;
           border: none;         /* Reset default border */
           height: 100vh;        /* Viewport-relative units */
           width: 100%;
           right: 10px;
        }
       </style>
       <iframe src="<?php echo "agrega-cesta1.php?id_cuenta=$id_cuenta&nivelprecio=$nivelprecio&sistema=$sistema"; ?>" name="data2" id="data2"></iframe>
    </div>
   </div>
 </div>
</div>

<?php
//}

// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
function checkForUpdates() {
   var id_cuenta="<?php echo $id_cuenta; ?>";
   var sistema="<?php echo $sistema; ?>";
    $.ajax({
        url: 'checkForUpdates.php?id_cuenta=<?php echo "$id_cuenta&sistema=$sistema"; ?>',
        type: 'GET',
        success: function(data) {
            if ($('#dataDiv').html() != data) {
                $('#dataDiv').html(data);
            }
        }
    });
}
setInterval(checkForUpdates, 5000);
</script>
</body>
</html>
