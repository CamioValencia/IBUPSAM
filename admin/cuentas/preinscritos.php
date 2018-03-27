<?php
session_start();
?>

<?php
if(isset($_SESSION['Usuario'])){
    if($_SESSION['Perfil']=='Administrador'){

?>


<?php
    if (!isset($_SESSION['Usuario'])){
    
?>

<?php
} else{
?> 
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INTERCONEXIONES TECNOLOGICAS </title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../../imagenes/logo.ico">

    <!-- Custom CSS -->
    <link href="../../css/round-about.css" rel="stylesheet">  



   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function(){
      });

      function mostrar(dato){
        $.ajax({
            type: "GET",
            url: "./consultar.php?dato="+dato,
            
            async: false
        })
        .done(function( transport ) {
            var response = transport;
            if(response.flag){
                $.each(response.data,function (key,value){
                    $('#'+key).val(value);
                });
                
                $('#mostrarmodal').modal();
            }
            else{
                console.log('Error');
            }
        })
        .fail(function( jqXHR, textStatus ) {
            console.log("error");
        });
      }
    </script>
</head>
<body>
<!-- Navigation -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
       <div class="navbar-header">
            <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
              <img style="max-width:150px; margin-top: -7px;" src="../../imagenes/logo.png">
            </a>		            
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-form navbar-right" >
			        <li><a href="#">Bienvenido(a)! <?php echo $_SESSION['nombres_personal'];?></a></li>                
              <li><a href="../../panel.php">Inicio</a></li>
              <li class="active"><a href="from_agenda.php">Registros</a></li>
              <li><a href="table_agenda.php">Ver agendamiento</a></li>
              <li><a href="../../administrador/usuarios.php">Usuarios</a></li>
              <li><a href="../../logout.php">Cerrar sesión </a></li> 
            </ul>
        </div>
    </div>
  </div>
      <!-- Page Content -->
    <div class="container">
        <!-- Introduction Row --><br>
        <h3>REGISTRO DE AGENDA TECNICOS</h3>
                <hr>
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table class="table" id="myTable">
    <thead>
      <tr>
		<th>Cedula</th>
	    <th>Nombres</th>
        <th>Sexo</th>
        <th>RH</th>
        <th>Codigo</th>
        <th>Fecha de nacimiento</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo electronico</th>
        <th>Programa</th>
		<th>Semestre</th>
		<th>Tipo</th>
		<th>Carné</th>
      </tr>
    </thead>
    <tbody>


      <?php
          include '../conexion.php';
          $consul=mysql_query("SELECT * FROM `personas")or die(mysql_error());
          while ($resul=mysql_fetch_array($consul)) {
      ?>

<form method="POST" action="eliminar.php"> 
        <tr>      
  		    <td><?php echo $resul["Cc"]; ?></td>
          <td><?php echo $resul["Nombres"]; ?></td>
          <td><?php echo $resul["Sexo"]; ?></td>
          <td><?php echo $resul["Rh"]; ?></td>
          <td><?php echo $resul["FechaNac"]; ?></td>
          <td><?php echo $resul["Direccion"]; ?></td>
          <td><?php echo $resul["Telefono"]; ?></td>
          <td><?php echo $resul["Correo"]; ?></td>
          <td><?php echo $resul["Programa"]; ?></td>
		  <td><?php echo $resul["Semestes"]; ?></td>
		  <td><?php echo $resul["Tipo"]; ?></td>
          <td><?php echo $resul["Imagen"]; ?></td>
          <td><button type="button" onclick="mostrar(<?php echo $resul["idagendar"]; ?>)" class="btn btn-primary btn-large" >Abrir</button></td>
          <td>
			<button type="submit" class="btn btn-danger" name="idagendar" value="<?php echo $resul["idagendar"]; ?>" >Eliminar</button>
    		
    		  </td>  		    		
    		</tr>
</form>			
    </tbody>
    <?php
        }
    ?>        
                        
  </table>
  
  
  
 <hr>
 

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; interconexiones tecnologicas 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
	<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>

</html>
<div class="modal fade"  id="mostrarmodal" tabindex="-1"  role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" onclick= window.location.reload() data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Formulario de finalizacion del trabajo</h3>
           </div>
           
           <div class="modal-body">         
           <label for="exampleInputEmail1"><b>Numero de agendamiento(*):</b></label>
            <input type="text" class="form-control" id="idagendar" name="idagendar" readonly>
           </div>
           
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Fecha de realizaci&oacuten del trabajo(*):</b></label>
            <input type="date" class="form-control" id="Fecha_fin"   name="Fecha_fin" readonly>
           </div>
           
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Hora de inicio(*):</b></label>
            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" readonly>
           </div>
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Hora de finalizacion(*):</b></label>
            <input type="time" class="form-control" id="hora_final"   name="hora_final" readonly>
           </div>
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Estado(*):</b></label> 
            <input type="text" class="form-control" id="estado"   name="estado" readonly>
                                            
                                            </div>
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Tipo de falencia(*):</b></label>
            <input type="text" class="form-control" id="falencia"   name="falencia" readonly>
           
                       
          <div class="modal-body">
            <label for="exampleInputEmail1"><b>Descripcion(*):</b></label>
            <textarea rows="4" cols="20" class="form-control" name="detalle" id="detalle" readonly>
            </textarea> 
           </div>
           <div class="modal-footer">
          <a  onclick= window.location.reload() href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
         
           </div>
      </div>
   </div>
</div>
    </div>

<?php
}
?>

<?php
}else{

    echo '<script type="text/javascript">
    alert("No tienes los suficientes privilegios para estar aquí");
    window.location.href="../../index.php";
    </script>';

}


}else{
    echo '<script type="text/javascript">
    window.location.href="../../index.php";
    </script>';

}
?>