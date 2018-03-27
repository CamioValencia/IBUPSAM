<?php
session_start();

?>





<!DOCTYPE html>
<html lang="es">

<head>

     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de  cursos libres</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../../img/logo1.ico">

    <!-- Custom CSS -->
    <link href="../../css/round-about.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("p").slideUp();
  $(".btn1").click(function(){
    $("p").slideDown();
  });
  $(".btn2").click(function(){
    $("p").slideUp();
  });
});  




function addInput() {
    /*if (fields < 31) {
        var nombre = "nombre" + fields;
        var link = "link" + fields;
        document.getElementById('text').innerHTML +=
        "<table><tr><td>Nombre #"+fields+"</td><td><input type='text' name='"+nombre+"' /></td></tr><tr><td>Link #"+fields+"</td><td><input type='text' name='"+link+"' /></td></tr></table>";
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+fields+"'/>";
        fields += 1;
    }
    else {
        document.getElementById('warning').innerHTML =
        "Máximo 3 familiares.";
        document.form.add.disabled = true;
    } */

    var fila = '<fieldset id="field">';
    fila += '<div class="form-group col-md-4"><select name="Dia[]" id="Dia" class="form-control"> <option>Seleccione una Opci&oacuten...</option><option value="LUNES">Lunes</option><option value="MARTES">Martes</option><option value="MIERCOLES">Miercoles</option><option value="JUEVES">Jueves</option><option value="VIERNES">Viernes</option><option value="SABADO">Sabado</option></select></div>';
    fila += '<div class="form-group col-md-3"><input type="time" class="form-control" id="Horaini"   name="Horaini[]" ></div>';
    fila += '<div class="form-group col-md-3"><input type="time" class="form-control" id="Horafin"   name="Horafin[]" ></div>';
    fila += '<input type="button" name="X_0" value="X" class="btn btn-default" onclick="removeInput(this);">';
    fila += '</fieldset>';
    $('#insertar').append(fila);
}

function removeInput( el ) {
    /*if (fields > 2) {
        document.getElementById('warning').innerHTML = "";
        var parent = document.getElementById('text');
        parent.removeChild(el);
        fields -= 1;
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+(fields-1)+"'/>";
    }*/
    $(el).parent().remove();
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
          <li ><a href="../Pre-inscripciones/table_personal.php">En espera</a></li>
          <li ><a href="../Pre-inscripciones/aceptados.php">Aceptados</a></li>
          <li ><a href="../Pre-inscripciones/todos.php">Todos</a></li>
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
        <form class="form-horizontal"  id='CRUDCursos' method='post' action='CRUDCursos.php' >
            <fieldset>
                <!-- Form Name -->
                <h3>REGISTRO USUARIOS</h3>
                <hr>

                <input type="hidden" id="Prénom" name="Cedula" class="form-control input-md" required="" type="text">

                <div class="form-group">
                    <label class="control-label      col-sm-4" for="Prénom">Nombre del curso libre:</label>                     
                    <div class="col-sm-4">
                        <input id="Prénom" name="Cursolibre" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="selectbasic">Docente</label>
                    <div class="col-sm-4">
                        <select id="selectbasic" name="Docente" class="form-control">
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
                                                    $result2 = mysql_query("SELECT * FROM usuarios, personas where personas.idPersonas=usuarios.idPersonas And idRol='2'", $link); 
                                                    while($row2 = mysql_fetch_array($result2)){
                                                        echo'<OPTION VALUE="'.$row2['idPersonas'].'">'.$row2['Nombres'].'</OPTION>';
                                                    }
                                                ?>         
                           
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label      col-sm-4" for="selectbasic">Tipo de área del curso libre</label>
                    <div class="col-sm-4">
                        
                <select name="Tipo" id="Tipo" class="form-control">
                    <option>Seleccione una Opci&oacuten...</option>
                    <option>Cultura</option>
                    <option>Deportes</option></select>
                    </div>
                </div>



            
              
                <!-- Text input-->
                <hr>

                 <div class="form-group">
            <B>HORARIO DE LOS CURSOS LIBRES</B><br><br>

            <label class="control-label col-sm-3" for="send"></label>
            <div class="col-sm-8">
                <div id="insertar">
                    <fieldset id="field">                        
                    <div class="form-group col-md-4">
                      <select name="Dia[]" id="Dia" class="form-control">
                                                <option>Seleccione una Opci&oacuten...</option>
                                                <option value="LUNES">Lunes</option>
                                                <option value="MARTES">Martes</option>
                                                <option value="MIERCOLES">Miercoles</option>
                                                <option value="JUEVES">Jueves</option>
                                                <option value="VIERNES">Viernes</option>
                                                <option value="SABADO">Sabado</option>
                                            </select>
                    </div> 
                    <div class="form-group col-md-3">                       
                        <input type="time" class="form-control" id="Horaini"   name="Horaini[]" >
                    </div>
                        <div class="form-group col-md-3">
                        <input type="time" class="form-control" id="Horafin"   name="Horafin[]" >
                    </div>
                    
                        <input type='button' name = "X_0" value='X' class='btn btn-default'>
                        <input type="button" value="Agregar día" class="btn btn-default" onclick="addInput();">
                    </fieldset><br>
                </div>                      
            </div> <br>
            
                
                          
                
                <div class="form-group">
                    <label class="control-label      col-sm-5" for="send">Confirma el registro!</label>
                    <div class="col-sm-4">
                        <input class='btn btn-default' type='submit' value='Agregar' name="Guardar" />
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
