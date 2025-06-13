<?php
//include("$dirRoot"."data/marquee3.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Untitled HTML5 Document</title>

<style>
section {
  background-color: teal;
  color: white;
  font-family: helvetica;
  text-transform: uppercase;
  overflow-x: hidden;
}
section div {
  display: flex;
  flex-wrap: nowrap;
  white-space: nowrap;
  min-width: 100%;
}
section div .news-message {
  display: flex;
  flex-shrink: 0;
  height: 50px;
  align-items: center;
  animation: slide-left 20s linear infinite;
}
section div .news-message p {
  font-size: 2.5em;
  font-weight: 100;
  padding-left: 0.5em;
}
@keyframes slide-left {
  from {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  to {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
}
</style>
</head>
<body>

?<section>
<div>
  <section class="news-message">
    <p>China</p>
    <p>Italy</p>
    <p>Iran</p>
    <p>South Korea</p>
    <p>Spain</p>
    <p>France</p>
    <p>Germany</p>
    <p>United States</p>
    <p>Switzerland</p>
    </section>
 <section class="news-message">
    <p>China</p>
    <p>Italy</p>
    <p>Iran</p>
    <p>South Korea</p>
    <p>Spain</p>
    <p>France</p>
    <p>Germany</p>
    <p>United States</p>
    <p>Switzerland</p>
    </section>
</div>
  </section>

</body>
</html>
