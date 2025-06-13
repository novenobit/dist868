<?php
//include("$dirRoot"."data/marquee2.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Untitled HTML5 Document</title>

<style>

body { margin: 20px; }

.marquee {
  height: 90px;
 /* width: 420px; */
  overflow: hidden;
  position: relative;
}

.marquee div {
  display: block;
  width: 200%;
  /* height: 30px; */
  position: absolute;
  overflow: hidden;
  animation: marquee 15s linear infinite;
}

.marquee span {
  float: left;
  width: 50%;
  font-family: verdana;
  font-size: 46pt;
}

@keyframes marquee {
  0% { left: 0; }
  100% { left: -100%; }
}
</style>
</head>
<body>
<div class="marquee">
  <div>
    <span>You spin me right round, baby. Like a record, baby.</span>
    <span>You spin me right round, baby. Like a record, baby.</span>
  </div>
</div>

</body>
</html>
