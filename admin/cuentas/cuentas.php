<?php
session_start();
?>

<?php
if(isset($_SESSION['usuarios'])){
    if($_SESSION['privilegio']=='1'){

?>


<?php
    if (!isset($_SESSION['usuarios'])){
    
?>

<?php
} else{
?> 
<!DOCTYPE html>
<html lang="es">


<head>



    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bienestar Universitario </title>

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
            type: "SET",
            url: "./editar1.php?dato="+dato,
            
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
<style>
body {
  background-image: url(../../img/fondo.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #464646;
  color: #fff;
}

</style>
<body>
<!-- Navigation -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
       <div class="navbar-header">
            <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
              <img style="max-width:150px; margin-top: -12px;" src="../../img/logo1.png">
            </a>		            
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-form navbar-right" >
                    <li ><a href="../usuarios.php" >Inicio</a></li>
                    <li ><a href="../inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="../Pre-incripciones/table_personal.php">En espera</a></li>
          <li ><a href="../Pre-incripciones/aceptados.php">Aceptados</a></li>
          <li ><a href="../Pre-incripciones/todos.php">Todos</a></li>
        </ul>
          <li><a href="../estadisticas.php">Estadisticas</a></li>
          
        
        
        <li><a href="../../logout.php">Cerrar sesión </a></li>
      </li>                    
                    <!--SOLO LO PUEDE VER EL ADMINISTRADOR-->
                    <?php
                    if(isset($_SESSION['User'])){
                        if($_SESSION['Perfil']=='Administrador'){
                        
                        echo'
                            <li class="active"><a href="#">Usuarios </a></li>
                        ';
                        }}
                    ?>
                    <!--FIN SOLO LO PUEDE VER EL ADMINISTRADOR-->
                  
                </ul>
        </div>
    </div>
  </div>
      <!-- Page Content -->
    <div class="container">
        <!-- Introduction Row --><br>
        <h3>REGISTRO DE AGENDA TECNICOS</h3>
    <table class="table" id="myTable">
    <thead>
      <tr>
		<th>Usuario</th>
        <th>Perfil</th>
		<th>Editar</th>
		<th>Eliminar</th>
     </tr>
    </thead>
    	
	<tbody>


<?php
    include '../conexion.php';
    $consul=mysql_query("SELECT * FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol")or die(mysql_error());
    while ($resul=mysql_fetch_array($consul)) {
?>


      <tr>
        <td><?php echo $resul["User"]; ?></td>
        <td><?php echo $resul["Tiporol"]; ?></td>
		<td><button type="button" onclick="mostrar(<?php echo $resul["Cedula"]; ?>)" class="btn btn-primary btn-large" >Abrir</button></td>
        <td>
			<form action="eliminar.php" method="post">
				<button class="btn btn-primary" name="cedula" value="<?php echo $resul["Cedula"]; ?>"><i class="fa fa-edit glyphicon glyphicon-edit "></i> Eliminar</button>
			</form></br>
      </td>
       
               
        </tr>      

    </tbody>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <?php
        }
    ?>        
                        
  </table>
 

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Universidad Piloto de Colombia S.A.M. 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
	
	
	
	
	
	<form id="formulario" method="post" action="modify.php" enctype="multipart/form-data">
<div class="modal fade"  id="mostrarmodal" tabindex="-1"  role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content" style="background-image: url(../../img/fondo.png)">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Cambio de contraseña</h3>
           </div>
           <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Usuario:</b></label>
            <input type="text" class="form-control" id="User" name="User" readonly>
           </div>         
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Contraseña:</b></label>
            <input type="password" class="form-control" id="password"   name="password" >
           </div>
           
           
                       <div class="modal-footer">
                                    
                            <button type="submit" class="btn btn-danger" name="Guardar" cursor:hand >Guardar</button>
                    </div>
           </form>
    <!-- /.container -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
	
	
	
	
	<?php
}
?>

<?php
}else{

    echo '<script type="text/javascript">
    alert("Privilegio no admitido");
  
    </script>';

}


}else{
    echo '<script type="text/javascript">
    </script>';

}
?>
	
   