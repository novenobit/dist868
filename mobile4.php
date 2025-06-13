<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Untitled HTML5 Document</title>
<style>
* {
  box-sizing: border-box;
}
main {
  max-width: 1200px;
  margin: 30px auto;
  padding: 0 20px;
  width: 100%;
  display: grid;
  /* Define Auto Row size */
  grid-auto-rows: 100px;
  /*Define our columns */
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-gap: 1em;
}

article {
  border-radius: 10px;
  padding: 20px;
  color: #fff;
}

article:nth-child(odd) {
  background-color: #55BBE9;
}

article:nth-child(even) {
  background-color: #afbe29;
}
</style>
</head>
<body>




<main>
  <article>1</article>
  <article>2</article>
  <article>3</article>
  <article>4</article>
  <article>5</article>
  <article>6</article>
  <article>7</article>
  <article>8</article>
  <article>9</article>
</main>


</body>
</html>
