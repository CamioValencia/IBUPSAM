<?php

    session_start();
    if(isset($_SESSION['logueado']) and $_SESSION['logueado']){
        if(isset($_SESSION['nombre']))
            $nombre = $_SESSION['nombre'];
        else
            $nombre = "";
        if(isset($_SESSION['Perfil']))
            $privilegio = $_SESSION['Perfil'];
        else
            $privilegio = "";
        if(isset($_SESSION['User']))
            $usuario = $_SESSION['User'];
        else
            $usuario = "";
        if(isset($_SESSION['cedula']))
            $cedula = $_SESSION['cedula'];
        else
            $cedula = "";
        if(isset($_SESSION['idPersonas']))
            $idPersonas = $_SESSION['idPersonas'];
        else
            $idPersonas = "";
    }
    else{
        //Si el usuario no está logueado redireccionamos al login.
        exit;
    }
?>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienestar Universitario </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="img/logo2.ico">

    <!-- Custom CSS -->
    <link href="css/round-about.css" rel="stylesheet">  



   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
<style>
body {
  background-image: url(img/fondo.png);
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
              <img style="max-width:150px; margin-top: -7px;" src="img/logo1.png">
            </a>		            
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-form navbar-right" >
		      <li><a href="#">Bienvenido(a) Camilo Valencia</a></li>               
              
              <li><a href="./logout.php">Cerrar sesión </a></li> 
            </ul>
        </div>
    </div>
  </div>
      <!-- Page Content -->
    <div class="container">
        <!-- Introduction Row --><br>
       <center><h3>REGISTRO DE CURSOS LIBRES</h3></center>
     <hr>
	
   <center> <table class="table" id="myTable" style="width:45%" > </center>
	<thead>
      <tr>
		
		<th>Actividad</th>
		
        
      </tr>
    </thead>
    <tbody>


      <?php
			$link = Conectarse();
          include './admin/conexion.php';
          $consul=mysql_query("SELECT cursos.NombreCurso FROM cursos,personas,personas_has_cursos WHERE personas.idPersonas=personas_has_cursos.idPersonas AND personas_has_cursos.idCursos=cursos.idCursos AND personas.Cedula='$cedula'") or die(mysql_error());
         while ($resul=mysql_fetch_array($consul)) {
      ?>
        
          
	  
	  
	  
	  
	  
	  
		
		<tr>
		<td><?php echo $resul["NombreCurso"]; ?></td>
    <td>
      <form id='CRUDdetinscripcion' method='post' action='CRUDdetinscripcion.php'>
        <input type="hidden" name="idinscripcion" value="<?php echo $resul["idinscripcion"]; ?>">

			 <button  class="btn btn-primary btn-large"  name='Boton3' type='submit' cursor:hand style="background-color:#ff0000;" >Eliminar</button>
    	</form>  
    		  </td>  
                                                
      </tr>       
		
    </tbody>
    <?php
        }
    ?>        
                        
  </table>
  
  


<form id='CRUDdetinscripcion' method='post' action='CRUDdetinscripcion.php'>
                                                    
														
														<div class="modal-body">
														<label for="exampleInputEmail1"><b>CURSO LIBRE:</b></label>
                                                        <th colspan='3'>
                                                            <SELECT NAME='idCursos' style="background-color:#ff0000; width:30%; color:white"class="form-control">
                                                                <option>Seleccione una Opcion</option>";
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
                                                    $result2 = mysql_query("SELECT * FROM cursos", $link); 
                                                    while($row2 = mysql_fetch_array($result2)){
                                                        echo'<OPTION VALUE="'.$row2['idCursos'].'">'.$row2['NombreCurso'].'</OPTION>';
                                                    }
                                                ?> </SELECT><br>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <input  type='submit' class="btn btn-primary btn-large" value='Agregar' name='Boton1' cursor:hand style="background-color:#ff0000;" />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            
                                                        </th> 
                                                        <th>
                                                            &nbsp;
                                                        </th> 
                                                        <th>
														
                                                            <input class="btn btn-primary btn-large" type='button' value='Limpiar' onclick='formReset()' name='Boton6' cursor:hand style="background-color:#ff0000;" />
                                                        </th> 
                                                    </tr>   </form> 
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-5">
                    <p>Copyright &copy; Universidad Piloto de Colombia S.A.M. 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.col-lg-12 -->
            
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
