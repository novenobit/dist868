<?php
//include("$dirRoot"."data/last-tabs.php");
?>

<style>
* {
    box-sizing: border-box;
}

/* The grid: Three equal columns that floats next to each other */
.columnTab {
    float: left;
    width: 33.33%;
    padding: 50px;
    text-align: center;
    font-size: 25px;
    cursor: pointer;
    color: white;
}

.containerTab {
    padding: 20px;
    color: white;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Closable button inside the container tab */
.closebtn {
    float: right;
    color: white;
    font-size: 35px;
    cursor: pointer;
}
.admiralBlueT {
  background-color: #00509f;
  border-top-left-radius: 25px;
  border-bottom-left-radius: 25px;
}
.lightBlueT {
 background-color: #12a9e0;
 border-top-right-radius: 25px;
 border-bottom-right-radius: 25px;
}
.briteRedT {
 background: #e5002b;
}

.admiralBlue {
 color: white;
  background-color: #00509f;
  border-radius: 25px;
}
.lightBlue {
 background-color: #12a9e0;
 border-radius: 25px;
}
.briteRed {
 color: white;
 background: #e5002b;
 border-radius: 25px;
}


</style>

<!-- Three columns -->
<div class="row">
  <div class="columnTab admiralBlueT aos-item" aos="zoom-in-right" onclick="openTab('otroCat');">
   Misma Categoria
  </div>
  <div class="columnTab briteRedT aos-item" aos="flip-up"  onclick="openTab('ofertas');">
    Ofertas
  </div>
  <div class="columnTab lightBlueT aos-item" aos="zoom-in-left"  onclick="openTab('nuevos');">
    Recien Llegando
  </div>
</div>

<!-- Full-width columns: (hidden by default) -->
<div id="otroCat" class="containerTab admiralBlue" style="display:none">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <?php
   include("./data/subcategoria.php");
  ?>
</div>

<div id="ofertas" class="containerTab briteRed" style="display:none;background:#e5002b">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <?php
   include("./data/ofertas.php");
  ?>
</div>

<div id="nuevos" class="containerTab  lightBlue" style="display:none;background:#12a9e0">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <?php
   include("./data/nuevos-prod.php");
  ?>
</div>

<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>
