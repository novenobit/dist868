<?php
//include("$dirRoot"."data/marquee4.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Untitled HTML5 Document</title>

<style>
.marquee {
    position: relative;
    overflow: hidden;
    --offset: 20vw;
    --move-initial: calc(-25% + var(--offset));
    --move-final: calc(-50% + var(--offset));
}

.marquee__inner {
    width: fit-content;
    display: flex;
    position: relative;
    transform: translate3d(var(--move-initial), 0, 0);
    animation: marquee 5s linear infinite;
   /* animation-play-state: paused; */
}

.marquee span {
    font-size: 10vw;
    padding: 0 2vw;
}

.marquee:hover .marquee__inner {
    animation-play-state: running;
}

@keyframes marquee {
    0% {
        transform: translate3d(var(--move-initial), 0, 0);
    }

    100% {
        transform: translate3d(var(--move-final), 0, 0);
    }
}
</style>
</head>
<body>

<div class="marquee">
   <div class="marquee__inner" aria-hidden="true">
      <span>Showreel</span>
      <span>Showreel</span>
      <span>Showreel</span>
      <span>Showreel</span>
   </div>
</div>

</body>
</html>
