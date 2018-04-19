<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Universidad Piloto de Colombia S.A.M.</title>
<link href="../../css/estilo.css" rel="stylesheet">
<script src="../../js/jquery.js"></script>
<script src="../../js/horario.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min1.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../../css/bootstrap/js/bootstrap.js"></script>
<link href="../../css/bootstrap.min.css" rel="stylesheet">




  


<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/bootstrap/css/bootstrap2.min.css" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



<link href="../../css/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../../css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../../css/round-about.css" rel="stylesheet">


<link rel="shortcut icon" sizes="144x144" href="../../img/icono.png">
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


<body id="body">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
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
                    <li class="active"><a href="../usuarios.php" >Inicio</a></li>
                    <li ><a href="../inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="./table_personal.php">En espera</a></li>
          <li><a href="./aceptados.php">Aceptados</a></li>
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
    <header>Cuentas de usuario</header>
    <section>
    <table  border="0" align="center">
      
    	<tr>
          <td width="335"><input type="text" placeholder="Busca nombre de usuario" id="bs-prod"/></td>
          <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
         
        </tr>




    </table>
    </section>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>



    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog" >
            <div class="modal-content " style="background-image: url(../../img/fondo.png);width: 900px;height: 100%; align-items: center;">
            <div class="modal-header">
              <button onclick=" window.location.reload()" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">


                 
           
            <input id="pro" name="pro"  type="hidden">
            <input type="hidden" id="Prénom" name="Cedula" class="form-control input-md" required="" type="text">
           
           <fieldset>
           <div class="modal-body" id="Cedula1">   
           <label class="control-label      col-sm-3" for="Prénom">Nombre del curso libre:</label>                     
            <div class="col-sm-3">      
            <input id="Prénom" name="Cursolibre" class="form-control input-md" required="" type="text">
           </div></div><br>
           <div class="modal-body">
            <label class="control-label      col-sm-3" for="Prénom">Docente:</label>
            <div class="col-sm-3">  
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
           </div></div><br>
           <div class="modal-body" id="Nombres1">
           <label class="control-label      col-sm-3" for="Prénom">Área a la que pertenece:</label>
           <div class="col-sm-3"> 
            <select name="Tipo" id="Tipo" class="form-control">
                    <option>Seleccione una Opci&oacuten...</option>
                    <option>Cultura</option>
                    <option>Deportes</option></select>
           </div></div></fieldset><br>

          <hr>

            <center><b>HORARIO DE LOS CURSOS LIBRES</b></center>


          <hr>
          
                <div id="insertar">
                    <fieldset id="field" nowrap>                        
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
                <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
    
           </div>               
            



           
         


                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>

            
            </div>
            </form>
         


</body>
</html>
