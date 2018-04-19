<?php
$conexion = mysqli_connect("localhost", "root", "", "mydb");
$cedula = $_POST['cedula']; 
 
mysqli_query($conexion, "DELETE FROM horario WHERE horario.idCursos = '$cedula' ");
		echo '<script type="text/javascript">
    			alert("Eliminado correctamente");
    			window.location.href="horarios.php";
    			</script>';
mysqli_close($conexion);
?>