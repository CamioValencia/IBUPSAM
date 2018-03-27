<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Tabla_estudiantes_aceptados.xls");


		$conexion=mysql_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("mydb",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="13" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
  	<td><strong>CEDULA</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>CURSOS LIBRES</strong></td>
    <td><strong>PROGRAMA</strong></td>
    <td><strong>SEMESTRE</strong></td>
    <td><strong>TIPO</strong></td>
    
  </tr>

  
<?PHP

$sql=mysql_query("SELECT tipo.Nombretipo as estamento, semestre.Nombresemestre as nivelacademico, personas.Cedula, personas.Nombres, programa.Nombre as programa, cursos.NombreCurso as cursolibre, personas.seguro_id  FROM personas_has_cursos LEFT JOIN cursos ON personas_has_cursos.idCursos = cursos.idCursos LEFT JOIN personas ON personas.idPersonas=personas_has_cursos.idPersonas LEFT JOIN programa ON personas.idPrograma=programa.idPrograma LEFT JOIN semestre ON semestre.idsemestre= personas.idsemestre LEFT JOIN tipo ON personas.idTipo=tipo.idTipo ORDER BY personas.Nombres ASC");
while($res=mysql_fetch_array($sql)){		

	
	$Cedula=$res["Cedula"];
	$Nombres=$res["Nombres"];
	$cursolibre=$res["cursolibre"];
	$Programa=$res["programa"];
	$Semestre=$res["nivelacademico"];
	$Tipo=$res["estamento"];



	
					

?>  
 <tr>
	<td><?php echo $Cedula; ?></td>
	<td><?php echo $Nombres; ?></td>
	<td><?php echo $cursolibre; ?></td>
	<td><?php echo $Programa; ?></td>
	<td><?php echo $Semestre; ?></td>
	<td><?php echo $Tipo; ?></td>
	                   
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>