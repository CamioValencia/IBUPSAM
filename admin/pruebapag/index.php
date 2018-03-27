<!DOCTYPE html>
<html>
<head>
	<title>Paginador</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">		
</head>

<body>
	<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
	<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Sexo</th>
				<th>Programa</th>				
			</tr>
		</thead>
		<tbody id="table" >

		</tbody>
	</table>
	<div class="col-md-12 text-center">
		<ul class="pagination" id="paginador"></ul>
	</div>
	</div>
<script src="js/jquery-2.min.js"></script>	
<script src="js/bootstrap.min.js"></script>
<script src="js/paginator.min.js"></script>
<script src="js/main.js"></script>
<script src="js/peticion.js"></script>
</body>
</html>




