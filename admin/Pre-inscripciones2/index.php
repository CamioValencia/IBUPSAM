<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Universidad Piloto de Colombia S.A.M.</title>
<link href="../../css/estilo.css" rel="stylesheet">
<script src="../../js/jquery.js"></script>
<script src="../../js/myjava2.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min1.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../../css/bootstrap/js/bootstrap.js"></script>
<link href="../../css/bootstrap.min.css" rel="stylesheet">



  


<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/bootstrap/css/bootstrap1.min.css" rel="stylesheet">

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
    <header>Personas pre-inscritas</header>
    <section>
    <table  border="0" align="center">


    	<tr>
          <td width="335"><input type="text" class="form-control input-md" placeholder="Buscar por Cedula" id="bs-prod"/></td>
    
         
        </tr>




    </table>

    </section>
    <div class="table-responsive" >
    <div class="registros1" id="agrega-registros" method="POST" action="../CRUDpersonas.php"></div>
    
      </div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    



    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-image: url(../../img/fondo.png)">
            <div class="modal-header">
              <button onclick=" window.location.reload()" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">


                 
           
            <input id="pro" name="pro"  type="hidden">
           
           
           <div class="modal-body" id="Cedula1">         
           <label for="exampleInputEmail1"><b>Cedula(*):</b></label>
            <input type="number" class="form-control" id="Cedula" name="Cedula" >
           </div>
           <div class="modal-body" id="Nombres1">
            <label for="exampleInputEmail1"><b>Nombres(*):</b></label>
            <input type="text" class="form-control" id="Nombres"   name="Nombres" >
           </div>
           <div class="modal-body" id="FechaNac1">
            <label for="exampleInputEmail1"><b>Fecha de Nacimiento(*):</b></label>
            <input type="date" class="form-control" id="FechaNac" name="FechaNac" >
           </div>
           <div class="modal-body" id="Telefono1">
            <label for="exampleInputEmail1"><b>Telefono(*):</b></label>
            <input type="number" class="form-control" id="Telefono"   name="Telefono" >
           </div>
           <div class="modal-body" id="Correo1">
            <label for="exampleInputEmail1"><b>Correo Electronico(*):</b></label> 
            <input type="text" class="form-control" id="Correo"   name="Correo" >
         </div>
         <input type="hidden"  name="Tipo" value="1" class="form-control input-md">
         <hr>
           <div class="modal-body" >
            <label for="exampleInputEmail1"><b>Usuario(*):</b></label>
            <input type="text" class="form-control" id="User"   name="User" required="required"></div>
           
          <div class="modal-body">
            <label for="exampleInputEmail1"><b>Contraseña(*):</b></label>
            <input type="Password" class="form-control" id="Password"   name="Password" required="required">
           </div>
        <div class="modal-body">
            <label for="exampleInputEmail1"><b>Tipo de usuario(*):</b></label>
            <select id="idRol" name="Perfil" class="form-control" required="required">
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
