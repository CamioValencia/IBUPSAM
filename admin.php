<?php

    session_start();
    if(isset($_SESSION['logueado']) and $_SESSION['logueado']){
        if(isset($_SESSION['nombre']))
            $nombre = $_SESSION['nombre'];
        else
            $nombre = "";
        if(isset($_SESSION['privilegio']))
            $privilegio = $_SESSION['privilegio'];
        else
            $privilegio = "";
        if(isset($_SESSION['usuario']))
            $usuario = $_SESSION['usuario'];
        else
            $usuario = "";
        if(isset($_SESSION['actividad']))
            $actividad = $_SESSION['actividad'];
        else
            $actividad = "";
        if(isset($_SESSION['cedula']))
            $cedula = $_SESSION['cedula'];
        else
            $cedula = "";
    }
    else{
        //Si el usuario no está logueado redireccionamos al login.
        header('Location: login.html');
        exit;
    }
?>

<!DOCTYPE html>
<html>
    
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

<body class="flat-blue">
    
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li><B>
                                <?php 
                                    if($privilegio == "Administrador"){
                                        echo $nombre. " (Administrador del sistema)"; 
                                    }
                                    else if($privilegio == "General"){
                                        echo $nombre. " (Usuario General)"; 
                                    }
                                    else if($privilegio == "Docente"){
                                        echo $nombre. " (Docente)"; 
                                    }
                                    
                                ?><B></li>
                        </ol>
                        
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PERFIL <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <?php
                                        if($privilegio == "Administrador"){
                                            echo "<img src='img/profile/admin/Admin.jpg' class='profile-img'>";
                                        }
                                        else if($privilegio == "General"){
                                            echo "<img src='img/profile/general/general.png' class='profile-img'>";
                                        }
                                        else if($privilegio == "Docente"){
                                            echo "<img src='img/profile/docente/docente.png' class='profile-img'>";
                                        }
                                    ?>
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">
                                            <?php
                                                echo $privilegio;
                                            ?>
                                        </h4>
                                        <p>
                                            <?php
                                                echo $usuario . "@upc.edu.co";
                                            ?>
                                        </p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <form id="Deslog" method="post" action="Logout.php">
                                                <button type="submit" class="btn btn-default" name="Logout" cursor:hand><i class="fa fa-sign-out"></i>Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="login.html">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">Bienestar UPC SAM</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index2.html">
                                    <span class="icon fa fa-tachometer"></span><span class="title">Todo sobre el Bienestar de UPC SAM</span>
                                </a>
                            </li>
                            <?php
                                if($privilegio == "Administrador"){
                                    function Conectarse()  {
                                        if (!( $link = mysql_connect("sql112.eshost.com.ar","eshos_18995039","12345")))  {
                                            echo"<script>
                                                alert('Error al conectarse al servidor');
                                            </script>";
                                        }  
                                        if (!mysql_select_db("eshos_18995039_ActividadeUPCSAM",$link))  {
                                            echo"<script>
                                                alert('Error al conectarse a la base de datos');
                                            </script>";
                                        }  
                                        return $link;  
                                        } 
                                    echo "<li class='panel panel-default dropdown'>
                                    <a data-toggle='collapse' href='#dropdown-table'>
                                    <span class='icon fa fa-table'></span><span class='title'>Personal</span>
                                    </a>
                                    <!-- Dropdown level 1 -->
                                        <div id='dropdown-table' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <ul class='nav navbar-nav'>
                                                    <li><a href='admin.php'>Cuentas de Usuario</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class='active panel panel-default dropdown'>
                                        <a data-toggle='collapse' href='#dropdown-form'>
                                        <span class='icon fa fa-file-text-o'></span><span class='title'>Actividades</span>
                                        </a>
                                    <!-- Dropdown level 1 -->
                                        <div id='dropdown-form' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <ul class='nav navbar-nav'>";                                                    
                                                    $link = Conectarse();
                                                    $result = mysql_query("SELECT Nombre FROM actividades", $link);
                                                    while($row = mysql_fetch_array($result)){
                                                        echo"<li><a href='form/ui-kits.html'>".$row['Nombre']."</a>";
                                                    }
                                                    echo "</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                   <!-- Dropdown -->
                                   <li class='panel panel-default dropdown'>
                                            <a data-toggle='collapse' href='#dropdown-example'>
                                            <span class='icon fa fa-cubes'></span><span class='title'>Inscripciones</span>
                                            </a>
                                   <!-- Dropdown level 1 -->
                                        <div id='dropdown-example' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <ul class='nav navbar-nav'>
                                                    <li><a href='personas.php'>Pre-inscritos</a>
                                                        </li>
                                                        
                                                </ul>
                                            </div>
                                        </div>
                                        </li>
                                    <!-- Dropdown-->
                                        <li class='panel panel-default dropdown'>
                                            <a data-toggle='collapse' href='#component-example'>
                                            <span class='icon fa fa-slack'></span><span class='title'>Academico</span>
                                            </a>
                                    <!-- Dropdown level 1 -->
                                        <div id='component-example' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <ul class='nav navbar-nav'>
                                                    <li><a href='pages/login.html'>Facultades</a>
                                                    </li>
                                                    <li><a href='pages/index.html'>Programas Academicos</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>";
                                }
                                elseif($privilegio == "Docente"){
                                    function Conectarse()  {
                                        if (!( $link = mysql_connect("sql112.eshost.com.ar","eshos_18995039","12345")))  {
                                            echo"<script>
                                                alert('Error al conectarse al servidor');
                                            </script>";
                                        }  
                                        if (!mysql_select_db("eshos_18995039_ActividadeUPCSAM",$link))  {
                                            echo"<script>
                                                alert('Error al conectarse a la base de datos');
                                            </script>";
                                        }  
                                        return $link;  
                                        } 
                                     echo "<li class='active panel panel-default dropdown'>
                                     <a data-toggle='collapse' href='#dropdown-form'>
                                        <span class='icon fa fa-file-text-o'></span><span class='title'>Inscripciones</span>
                                        </a>
                                    <!-- Dropdown level 1 -->
                                        <div id='dropdown-form' class='panel-collapse collapse'>
                                            <div class='panel-body'>
                                                <ul class='nav navbar-nav'>";                                                    
                                                    $link = Conectarse();
                                                    $result = mysql_query("SELECT Nombre FROM actividades", $link);
                                                    while($row = mysql_fetch_array($result)){
                                                        echo"<li><a href='form/ui-kits.html'>".$row['Nombre']."</a>";
                                                    }
                                                    echo "</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>";
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            
            <!-- Main Content -->
            <div class="container-fluid" style="background-image:url(/img/backdrop/FondoDiv2.jpg)">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title" style="color: white;">PANEL PARA EDICION DE CUENTAS DE USUARIO</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administracion de cuentas de usuario</B></div>
                                        <?php
                                        if($privilegio == "Administrador"){
                                            $link = Conectarse();
                                            $result = mysql_query("SELECT * FROM usuarios", $link);
                                            echo "<table>  
                                                  <tr>  
                                                  <th>USUARIO</th>  
                                                  <th>CONTRASENIA</th>  
                                                  <th>PERFIL</th>
                                                  </tr>";
                                            while ($row = mysql_fetch_row($result)){   
                                                echo "<tr>";  
                                                echo "<td>$row[0]</td>";  
                                                echo "<td>*******</td>";  
                                                echo "<td>$row[2]</td>";  
                                                echo "</tr>";  
                                            }  
                                            echo "</table>"; 
                                            echo "<table>
                                                <form id='CRUDUsuarios' method='post' action='CRUDUsuarios.php'>
                                                    <tr>
                                                        <th>USUARIO</th>
                                                        <th>CONTRASENIA</th>
                                                        <th>PERFIL</th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <input  type='text' value='' placeholder='usuario' name='username' height='50'/>
                                                        </th>
                                                        <th>
                                                            <input  type='password' value='' placeholder='Contrasenia' name='password' /><br>
                                                        </th>  
                                                        <th>
                                                            <SELECT NAME='perfiles'>
                                                                <option>Seleccione una Opcion</option>";
    	                                                            $link = Conectarse();
                                                                    $result1 = mysql_query("SELECT * FROM perfiles", $link);
		                                                            while ($row1 = mysql_fetch_array($result1)){
		                                                                echo'<OPTION VALUE="'.$row1['Nombre'].'">'.$row1['Nombre'].'</OPTION>';
		                                                            }
	                                                        echo "</SELECT>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <input class='button' type='submit' value='Agregar' name='Boton1' cursor:hand />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class='button' type='submit' value='Modificar' name='Boton2' cursor:hand />
                                                        </th> 
                                                        <th>
                                                            &nbsp;
                                                        </th> 
                                                        <th>
                                                            <input class='button'' type='submit'' value='Eliminar'' name='Boton3' cursor:hand />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class='button' type='button' value='Limpiar' onclick='formReset()' name='Boton6' cursor:hand />
                                                        </th> 
                                                    </tr>    
                                                
                                            </table>";
                                            }
                                            elseif($privilegio == "Docente"){
                                                $link = Conectarse();
                                                $sql = "SELECT DISTINCT personas.*
                                                        FROM personas
                                                        INNER JOIN detinscripcion
                                                            ON detinscripcion.Cedula=personas.Cc
                                                        INNER JOIN actividades
                                                            ON detinscripcion.Actividad=actividades.Nombre
                                                        WHERE actividades.Docente='$cedula'";
                                                $result = mysql_query($sql, $link);
                                                echo "<table>  
                                                      <tr>  
                                                      <th>Documento</th>  
                                                      <th>Nombres</th>  
                                                      <th>Sexo</th>
                                                      <th>Rh</th>
                                                      <th>Codigo</th>
                                                      <th>Fec. Nacimiento</th>
                                                      <th>Direccion</th>
                                                      <th>Telefono</th>
                                                      <th>Correo</th>
                                                      <th>Programa</th>
                                                      <th>Semestre</th>
                                                      <th>Tipo</th>
                                                      </tr>";
                                                      while ($row = mysql_fetch_row($result)){   
                                                        echo "<tr>";  
                                                        echo "<td>$row[0]</td>";  
                                                        echo "<td>$row[1]</td>";  
                                                        echo "<td>$row[2]</td>"; 
                                                        echo "<td>$row[3]</td>";
                                                        echo "<td>$row[4]</td>";
                                                        echo "<td>$row[5]</td>";
                                                        echo "<td>$row[6]</td>";
                                                        echo "<td>$row[7]</td>";
                                                        echo "<td>$row[8]</td>";
                                                        echo "<td>$row[9]</td>";
                                                        echo "<td>$row[10]</td>";
                                                        echo "<td>$row[11]</td>";
                                                        echo "</tr>";  
                                                }  
                                                echo "</table>";
                                        }
                                        else{
                                            function Conectarse()  {
                                                if (!( $link = mysql_connect("sql112.eshost.com.ar","eshos_18995039","12345")))  {
                                                    echo"<script>
                                                        alert('Error al conectarse al servidor');
                                                    </script>";
                                                }  
                                                if (!mysql_select_db("eshos_18995039_ActividadeUPCSAM",$link))  {
                                                    echo"<script>
                                                        alert('Error al conectarse a la base de datos');
                                                    </script>";
                                                }  
                                                return $link;  
                                            } 
                                            $link = Conectarse();
                                            $result = mysql_query("SELECT * FROM detinscripcion WHERE Cedula='$cedula'", $link);
                                            echo "<table>  
                                                  <tr>  
                                                  <th>Actividad</th>  
                                                  </tr>";
                                            while ($row = mysql_fetch_row($result)){   
                                                echo "<tr>";   
                                                echo "<td>$row[2]</td>";  
                                                echo "</tr>";  
                                            }  
                                            echo "</table>"; 
                                            echo "<table>
                                                <form id='CRUDdetinscripcion' method='post' action='CRUDdetinscripcion.php'>
                                                    <tr>
                                                        <th colspan='3'>Actividad</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='3'>
                                                            <SELECT NAME='actividad'>
                                                                <option>Seleccione una Opcion</option>";
    	                                                            $link = Conectarse();
                                                                    $result1 = mysql_query("SELECT * FROM actividades", $link);
		                                                            while ($row1 = mysql_fetch_array($result1)){
		                                                                echo'<OPTION VALUE="'.$row1['Nombre'].'">'.$row1['Nombre'].'</OPTION>';
		                                                            }
	                                                        echo "</SELECT>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <input class='button' type='submit' value='Agregar' name='Boton1' cursor:hand />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input class='button'' type='submit'' value='Eliminar'' name='Boton3' cursor:hand />
                                                        </th> 
                                                        <th>
                                                            &nbsp;
                                                        </th> 
                                                        <th>
                                                            <input class='button' type='button' value='Limpiar' onclick='formReset()' name='Boton6' cursor:hand />
                                                        </th> 
                                                    </tr>    
                                                
                                            </table>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
            </div>
        </div>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
            </div>
        </footer>
        <div>
            <!-- Javascript Libs -->
            <script type="text/javascript" src="../../lib/js/jquery.min.js"></script>
            <script type="text/javascript" src="../../lib/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../lib/js/Chart.min.js"></script>
            <script type="text/javascript" src="../../lib/js/bootstrap-switch.min.js"></script>

            <script type="text/javascript" src="../../lib/js/jquery.matchHeight-min.js"></script>
            <script type="text/javascript" src="../../lib/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="../../lib/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="../../lib/js/select2.full.min.js"></script>
            <script type="text/javascript" src="../../lib/js/ace/ace.js"></script>
            <script type="text/javascript" src="../../lib/js/ace/mode-html.js"></script>
            <script type="text/javascript" src="../../lib/js/ace/theme-github.js"></script>
            <!-- Javascript -->
            <script type="text/javascript" src="../../js/app.js"></script>
</body>
</html>