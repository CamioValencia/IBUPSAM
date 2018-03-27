<?php
session_start();

unset($_SESSION['User']);

$_SESSION=array();

session_destroy();

echo '<script type="text/javascript">
	alert("Ha finalizado su sesion");
	window.location.href="index.html";
	</script>'

?>