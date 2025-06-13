<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
    <style>
      #grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-gap: 15px;
      }
      #grid > div {
        font-size: 40px;
        padding: .5em;
        color: #ffffff;
        background: #1c87c9;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div id="grid">
      <div>1</div>
      <div>2</div>
      <div>3</div>
      <div>4</div>
      <div>5</div>
      <div>6</div>
      <div>7</div>
      <div>8</div>
      <div>9</div>
      <div>1</div>
      <div>2</div>
      <div>3</div>
      <div>4</div>
      <div>5</div>
      <div>6</div>
      <div>7</div>
      <div>8</div>
      <div>9</div>
    </div>
  </body>
</html>
