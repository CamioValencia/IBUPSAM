<!--<?php
session_start();
?>

<?php
if(isset($_SESSION['usuarios'])){
    if($_SESSION['privilegio']=='Administrador'){

?>


<?php
    if (!isset($_SESSION['usuarios'])){
    
?>

<?php
} else{
?> -->
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../img/logo2.ico">

    <!-- Custom CSS -->
    <link href="../css/round-about.css" rel="stylesheet">  



   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
<style>
body {
  background-image: url(../img/fondo.png);
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
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img style="max-width:150px; margin-top: -12px;" src="../img/logo1.png"></a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-form navbar-right" >
                    <li><a href="../usuarios.php">Inicio</a></li>
                    <li><a href="../Pre-inscripciones/table_personal.php">Pre-inscritos</a></li>
					<li><a href="../estadisticas.php">Estadisticas</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Actividades <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Baloncesto</a></li>
          <li><a href="#">Danzas</a></li>
          <li><a href="#">Fútbol</a></li>
		  <li><a href="#">Microfutbol</a></li>
          <li><a href="#">Musica Instrumental</a></li>
		  <li><a href="#">Musica Vocal</a></li>
          <li><a href="#">Produccion de television</a></li>
		  <li><a href="#">Teatro</a></li>
          <li><a href="#">Voleibol</a></li>
        </ul>
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
                    <li><a href="../logout.php">Cerrar sesión </a></li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
      <!-- Page Content -->
    <div class="container">
        <!-- Introduction Row --><br>
        <h3>REGISTRO DE AGENDA TECNICOS</h3>
     <hr>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table class="table" id="myTable">
	<thead>
      <tr>
      <th>Fecha de inscripción</th>
		<th>Cedula</th>
		<th>Nombres</th>
	    <th>Sexo</th>
        <th>Rh</th>
        <th>Codigo</th>
        <th>Fecha de nacimiento</th>
		<th>Edad</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Correo electronico</th>
        <th>Programa</th>
        <th>Semestre</th>
		<th>Tipo</th>
        <th>Carné</th>
        
      </tr>
    </thead>
    <tbody>


      <?php
          include '../admin/conexion.php';
          $consul=mysql_query("SELECT * FROM personas, detinscripcion WHERE personas.Cc = detinscripcion.Cedula AND detinscripcion.Actividad='MusicaInstrumental'")or die(mysql_error());
          while ($resul=mysql_fetch_array($consul)) {
      ?>

	  
	  
<form method="POST" action="../CRUDpersonas.php"> 
		
		<tr>
    <td><?php echo $resul["Fecha"]; ?></td>
		<td><input type='hidden' id='cedula' name='cedula[]' value="<?php echo $resul["Cc"]; ?>"><?php echo $resul["Cc"]; ?></td>
		<td><?php echo $resul["Nombres"]; ?></td>
        <td><?php echo $resul["Sexo"]; ?></td>
        <td><?php echo $resul["Rh"]; ?></td>
        <td><?php echo $resul["Codigo"]; ?></td>
        <td><?php echo $resul["FechaNac"]; ?></td>
		<td><?php echo $resul["Edad"]; ?></td>
        <td><?php echo $resul["Direccion"]; ?></td>
        <td><?php echo $resul["Telefono"]; ?></td>
        <td><input type='hidden' id='correo' name='correo[]' value="<?php echo $resul["Correo"]; ?>"><?php echo $resul["Correo"]; ?></td>
        <td><?php echo $resul["Programa"]; ?></td>
		<td><?php echo $resul["Semestres"]; ?></td>
		<td><?php echo $resul["Tipo"]; ?></td>
		<td><a href='../fotos/<?php echo $resul["Imagen"]; ?>' target='_blank'><img src='../fotos/<?php echo $resul["Imagen"]; ?>' width='100px' height='100px'></a></td>
     
                                                
      </tr>       
		
    </tbody>
    <?php
        }
    ?>        
                        
  </table>
  
  <center><button type="submit" class="btn btn-primary btn-large" name="BotonAceptar" value="Aceptar">Enviar</button></center>
</form>	
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

<?php
}
?>

<?php
}else{

    echo '<script type="text/javascript">
    alert("No tienes los suficientes privilegios para estar aquí");
    window.location.href="../../login.php";
    </script>';

}


}else{
    echo '<script type="text/javascript">
    window.location.href="../../login.php";
    </script>';

}
?>-->