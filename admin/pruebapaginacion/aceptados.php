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

    <title>Universidad Piloto de Colombia </title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../../img/logo2.ico">

    <!-- Custom CSS -->
    <link href="../../css/round-about.css" rel="stylesheet">  



   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
                <a class="navbar-brand" href="#"><img style="max-width:150px; margin-top: -12px;" src="../../img/logo1.png"></a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-form navbar-right" >
                    <li ><a href="../usuarios.php" >Inicio</a></li>
                    <li ><a href="../inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="./table_personal.php">En espera</a></li>
          <li class="active"><a href="./aceptados.php">Aceptados</a></li>
          <li ><a href="./todos.php">Todos</a></li>
        </ul>
          <li><a href="../estadisticas.php">Estadisticas</a></li>
          
        
        
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
    <div class="container">
        <!-- Introduction Row --><br>
        <h3>ESTUDIANTES PRE-INSCRITOS</h3>
        
     <hr>
  
   <input type="text" id="myInput" class="form-control input-md" onkeyup="myFunction()" placeholder="Buscar por cedula" title="Type in a name">
    <hr><td><strong>Exportar tabla a Excel</strong></td>
<td align="center"><a href="../Excel/aceptadosExcel.php" value='1' name="boton1"><img src="../../img/excel.jpg" width="30" height="25"/></a></td><hr>
    <div class="table-responsive" >
    <table class="table" id="myTable" style="text-align:center;"">

  <thead >
      <tr>
    <th style="text-align: center;">Cedula</th>
    <th style="text-align: center;">Nombres</th>
      <th style="text-align: center;">Sexo</th>
        <th style="text-align: center;">Rh</th>
        <th style="text-align: center;">Codigo</th>
        <th nowrap>Fecha de nacimiento</th>
    <th style="text-align: center;">Edad</th>
        <th style="text-align: center;">Dirección</th>
        <th style="text-align: center;">Teléfono</th>
        <th style="text-align: center;">Correo electronico</th>
        <th style="text-align: center;">Programa</th>
        <th style="text-align: center;">Semestre</th>
    <th style="text-align: center;">Tipo</th>
        <th style="text-align: center;">Carné</th>
        <th style="text-align: center;">Aprobar solicitud</th>
        
      </tr>
    </thead>
     <tbody id="table">
    
    </tbody>
           
                        
  </table>
 
</div>
  
  <br>
  <center><button type="submit" class="btn btn-primary btn-large" name="BotonAceptar" value="Aceptar">Enviar</button></center>
</form> 
 <div class="col-md-12 text-center">
    <ul class="pagination" id="paginador"></ul>
  </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
  <script src="js/jquery-2.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/paginator.min.js"></script>
  <script src="js/main.js"></script>

  <script>
$(function () {

  $('#search').quicksearch('table ');               
});

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
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





          


  <!--<form id="formulario" method="post" action="modify.php" enctype="multipart/form-data">
<div class="modal fade"  id="mostrarmodal" tabindex="-1"  role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content" style="background-color:#ff0000;">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Cambio de contraseña</h3>
           </div>
           <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Usuario:</b></label>
            <input type="text" class="form-control" id="idCursos" name="idCursos" readonly>
           </div>         
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Contraseña:</b></label>
            <input type="text" class="form-control" id="NombreCurso"   name="NombreCurso" >
           </div>
           
           
                       <div class="modal-footer">
                                    
                            <button type="submit" class="btn btn-danger" name="Guardar" cursor:hand >Guardar</button>
                    </div>
           </form>-->












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