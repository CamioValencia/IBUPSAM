<?php
$conexion = mysqli_connect("localhost", "root", "", "mydb");
$cedula = $_POST['cedula']; 
 
mysqli_query($conexion, "DELETE FROM personas WHERE Cedula = '$cedula' ");
		echo '<script type="text/javascript">
    			alert("Eliminado correctamente");
    			window.location.href="cuentas.php";
    			</script>';
mysqli_close($conexion);
?>