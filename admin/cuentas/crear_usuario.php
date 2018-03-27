<?php
session_start();

?>





<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de empleados</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../../img/logo.ico">

    <!-- Custom CSS -->
    <link href="../../css/round-about.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>



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
<br><br><br>
    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <form class="form-horizontal"  id='CRUDUsuarios' method='post' action='CRUDUsuarios.php' >
            <fieldset>
                <!-- Form Name -->
                <h3>REGISTRO USUARIOS</h3>
                <hr>

                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Cedula:</label>                     
                    <div class="col-sm-4">
                        <input id="Prénom" name="Cedula" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Nombre Completo:</label>                     
                    <div class="col-sm-4">
                        <input type="text"  name="Nombres"  class="form-control input-md">
                    </div>
                </div>
            <input type="hidden"  name="Tipo" value="1" class="form-control input-md">
                
				<div class="form-group">
                    <label class="control-label      col-sm-4" for="selectbasic">Fecha de nacimiento(*):</label>
                    <div class="col-sm-4">
                     <input type="date" class="form-control" name="FechaNac" id="FechaNac" placeholder="Fecha de Nacimiento">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">N&uacutemero de Celular(*):</label>                     
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="Telefono" onkeypress="return validarNum(event)"  id="Telefono" placeholder="Telefono">
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Correo Electr&oacutenico(*):</label>                     
                    <div class="col-sm-4">
                        <input type="e-mail" class="form-control" name="Correo"   id="Correo" placeholder="Correo">
                    </div>
                </div>
              
                <!-- Text input-->
                <hr>
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Usuario:</label>                     
                    <div class="col-sm-4">
                        <input id="Prénom" name="User" placeholder="usuario" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Contraseña:</label>                     
                    <div class="col-sm-4">
                        <input type="password"  name="Password" placeholder="********" class="form-control input-md">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Confirmar contraseña:</label>                     
                    <div class="col-sm-4">
                        <input type="password"  name="Password2" placeholder="********" class="form-control input-md">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="selectbasic">Tipo usuario</label>
                    <div class="col-sm-4">
                        <select id="selectbasic" name="Perfil" class="form-control">
                            <option>Seleccione una Opci&oacuten...</option>
                                                <?php 
                                                    function Conectarse()  {
                                                        if (!( $link = mysql_connect("localhost","root","")))  {
                                                            echo"<script>
                                                            alert('Error al conectarse al servidor');
                                                            </script>";
                                                        }                                                       
                                                        if (!mysql_select_db("mydb",$link))  {
                                                            echo"<script>
                                                            alert('Error al conectarse a la base de datos');
                                                            </script>";
                                                        }  
                                                        return $link;  
                                                    }
                                                    $link = Conectarse();
                                                    mysql_query("SET NAMES 'utf8'");
                                                    $result2 = mysql_query("SELECT * FROM rol", $link); 
                                                    while($row2 = mysql_fetch_array($result2)){
                                                        echo'<OPTION VALUE="'.$row2['idRol'].'">'.$row2['Tiporol'].'</OPTION>';
                                                    }
                                                ?>         
                           
                        </select>
                    </div>
                </div>
                          
                
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="send">Confirma el registro!</label>
                    <div class="col-sm-4">
                        <input class='btn btn-default' type='submit' value='Agregar' name="Guardar" onclick="validar_campos();" />
                        <input type="button" class="btn btn-danger" action="../usuarios.php" value="Cancelar" onclick = "location='../usuarios.php'"> 
                    </div>
                </div>
            </fieldset>
        </form>
        <!-- Team Members Row -->
      

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
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>
