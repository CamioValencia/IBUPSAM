<?php
session_start();
?>

<?php
    if (!isset($_SESSION['usuarios'])){
        echo '<script type="text/javascript">
                window.location.href="../index.html";
              </script>';
    
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
	<link rel="shortcut icon" sizes="144x144" href="../img/logo2.ico">

    <!-- Custom CSS -->
    <link href="../css/round-about.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <li class="active"><a href="./usuarios.php" >Inicio</a></li>
                    <li ><a href="./inscritos.php">Inscritos</a></li>
                    <li ><a href="./inscritos/personasinscritas.php">tabla por persona</a></li>
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
<br><br><br>

    <!-- Page Content -->
    <div class="container">
        <!-- Team Members Row -->
        <div class="row">
           
            <div class="col-lg-4 col-sm-6 text-center">
                <a title="REGISTRO Usuarios" href="cuentas2/index.php" ><img class="img-circle img-responsive img-center" src="../img/persona.png" alt="" style="width: 253px; height: 222px;"></a>
                <h3>Gestión de usuarios</h3>                             
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <a title="Gestión de cursos libres" href="./cursoslibres2" ><img class="img-circle img-responsive img-center" src="../img/editar.png" alt="" style="width: 253px; height: 222px;"></a>
                <h3>Gestión de cursos libres </h3>                             
            </div>

            <div class="col-lg-4 col-sm-6 text-center">
                <a title="Gestión de EPS" href="./eps2" ><img class="img-circle img-responsive img-center" src="../img/inscribete.png" alt="" style="width: 253px; height: 222px;"></a>
                <h3>Gestion de EPS </h3>                             
            </div>

            
        </div>

        <hr>

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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
<?php
 }
?>

