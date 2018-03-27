<?php
$conexion = mysqli_connect("localhost", "root", "", "mydb");
$idseguro = $_POST['idsegur']; 
 
mysqli_query($conexion, "DELETE FROM seguro WHERE idseguro = '$idseguro' ");
		echo '<script type="text/javascript">
    			alert("Eliminado correctamente");
    			window.location.href="vereps.php";
    			</script>';
mysqli_close($conexion);
?>