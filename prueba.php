<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("p").slideUp();
  $(".btn1").click(function(){
    $("p").slideDown();
  });
  $(".btn2").click(function(){
    $("p").slideUp();
  });
});  
</script>
</head>
<body>
<p><input type="text"></p>
<button class="btn1">Añadir</button>
<button class="btn2">Guardar</button>
</body>
</html>