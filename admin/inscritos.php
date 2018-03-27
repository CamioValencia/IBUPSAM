
<?php
error_reporting(E_ALL ^ E_NOTICE);
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


    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienestar Universitario | Administrador </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap1.min.css" rel="stylesheet">
    
  <link rel="shortcut icon" sizes="144x144" href="../img/logo2.ico">

    <!-- Custom CSS -->
    <link href="../css/round-about.css" rel="stylesheet">

    <title>Universidad Piloto de Colombia </title>

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
                    <li><a href="./usuarios.php">Inicio</a></li>
                    <li class="active"><a href="./inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./Pre-inscripciones/table_personal.php">En espera</a></li>
          <li><a href="./Pre-inscripciones/aceptados.php">Aceptados</a></li>
          <li><a href="./Pre-inscripciones/todos.php">Todos</a></li>
        </ul>
          <li><a href="./estadisticas.php">Estadisticas</a></li>
          
        
        
        <li><a href="../logout.php">Cerrar sesión </a></li>
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

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
      <!-- Page Content -->
    <center>
<div class="container">       
    <h2>Consulta de personas inscritas por curso libre</h2>
    <form action="#" method="post">
        <div class="form-group">
            <select class="form-control" name="search">
              <option value=""> SELECCIONE UN CURSO LIBRE...</option>
                <?php
                      $sql = "SELECT * FROM cursos ";
                      include('./conexion.php');
                    $result = mysql_query($sql);
                    while($row = mysql_fetch_array($result)){
                ?>
                  <option value="<?php echo $row["idCursos"];?>">  <?php echo $row["NombreCurso"];?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <input class='btn btn-default' type="submit" value="search" />

    </form>
    <br>
   <input type="text" id="myInput" class="form-control input-md" onkeyup="myFunction()" placeholder="Buscar por cedula" title="Type in a name">
    <table class="table" id="myTable">
    <thead>
      <tr>
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
        
      
        
      </tr>
    </thead>
    <tbody>
            </tr>
              <?php
                  include './conexion.php';

                  $num_rows = mysql_num_rows($result);
                  if($_POST['search']){

                  $categoria_seleccionada = $_POST['search'];

                  $result=mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo, personas.Imagen, personas.aceptado 
FROM personas_has_cursos LEFT JOIN personas ON personas_has_cursos.idPersonas= personas.idPersonas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN 
semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo 
WHERE personas.cursoslibres='1' AND personas.aceptado='S' AND personas_has_cursos.estado= 'S' AND personas_has_cursos.idCursos = '$categoria_seleccionada' ")or die(mysql_error());
                  $num_rows = mysql_num_rows($result);
                  }




                  if($result != 0){
                  while ($row=mysql_fetch_array($result)){                  
              ?>
            <tr>
              <td><?php echo $row["Cedula"]; ?></td>
              <td><?php echo $row["Nombres"];?></td>
              <td><?php echo $row["Sexo"];?></td>
              <td><?php echo $row["Rh"];?></td>
              <td><?php echo $row["Codigo"];?></td>
              <td><?php echo $row["FechaNac"];?></td>
              <td><?php echo $row["Edad"];?></td>
              <td><?php echo $row["Direccion"];?></td>
              <td><?php echo $row["Telefono"];?></td>
              <td><?php echo $row["Correo"];?></td>
              <td><?php echo $row["Nombre"];?></td>
              <td><?php echo $row["Nombresemestre"];?></td>
              <td><?php echo $row["Nombretipo"];?></td>
              


            </tr>
            <?php
            }
            ?>
            <?php 
            }else{
            echo'<p>No se encontrarón datos </p>';
            }
            ?>
        </table>
    </div>
  
  
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
    td = tr[i].getElementsByTagName("td")[0];
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
?>