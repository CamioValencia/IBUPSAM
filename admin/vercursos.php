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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienestar Universitario </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../imagenes/logo.ico">

    <!-- Custom CSS -->
    <link href="../css/round-about.css" rel="stylesheet">  



   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function(){
      });

      function mostrar(dato){
        $.ajax({
            type: "SET",
            url: "./editarcur.php?dato="+dato,
            
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
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
       <div class="navbar-header">
            <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
              <img style="max-width:150px; margin-top: -12px;" src="../img/logo1.png">
            </a>		            
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-form navbar-right" >
                    <li ><a href="./usuarios.php" >Inicio</a></li>
                    <li ><a href="./inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="./Pre-inscripciones/table_personal.php">En espera</a></li>
          <li ><a href="./Pre-inscripciones/aceptados.php">Aceptados</a></li>
          <li ><a href="./Pre-inscripciones/todos.php">Todos</a></li>
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
    </div>
  </div>
      <!-- Page Content -->
    <div class="container">
        <!-- Introduction Row --><br>
        <h3>REGISTRO DE AGENDA TECNICOS</h3>
    <table class="table" id="myTable">
    <thead>
      <tr>
		<th>Nombre del curso libre</th>
        <th>Docente</th>
     </tr>
    </thead>
    	
	<tbody>


<?php
    include './conexion.php';
    $consul=mysql_query("SELECT * FROM personas,cursos,horario where personas.idPersonas= cursos.idPersonas and cursos.idCursos= horario.idCursos GROUP BY cursos.idCursos")or die(mysql_error());
    while ($resul=mysql_fetch_array($consul)) {
?>


      <tr>
        <td><?php echo $resul["NombreCurso"]; ?></td>
        <td><?php echo $resul["Nombres"]; ?></td>
        <td> 
          <form action="./horarios.php" method="post">
            <input type="hidden" name="cedula" value="<?php echo $row["idCursos"]; ?>" />
            <input type="hidden" name="nombres" value="<?php echo $row["NombreCurso"]; ?>" />
          <button class="btn btn-primary" value="Editar"><i class="fa fa-edit glyphicon glyphicon-edit "></i> Ver horarios</button>
          </td></form>
			</form></br>
      </td>
       
               
        </tr>      

    </tbody>

	
    <?php
        }
    ?>        
                        
  </table>
 

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
	
	
	
	
	
	<form id="formulario" method="post" action="modificarcurso.php" enctype="multipart/form-data">
<div class="modal fade"  id="mostrarmodal" tabindex="-1"  role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content" style="background-image: url(../img/fondo.png)">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Modificación de cursos libres</h3>
           </div>
           <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Nombre del curso:</b></label>
            <input type="text" class="form-control" id="NombreCurso" name="NombreCurso" readonly>
           </div>         
           <div class="modal-body">
            <label for="exampleInputEmail1"><b>Docente:</b></label>
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
            <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Dia:</b></label>
           <select name="Dia" id="Dia" class="form-control">
                                                <option>Seleccione una Opci&oacuten...</option>
                                                <option>Lunes</option>
                                                <option>Martes</option>
                                                <option>Miercoles</option>
                                                <option>Jueves</option>
                                                <option>Viernes</option>
                                                <option>Sabado</option>
                                            </select>
           </div>    
           
           <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Hora de inicio:</b></label>
            <input type="time" class="form-control" id="Horaini"   name="Horaini" >
           </div>
           <div class="modal-body" >         
           <label for="exampleInputEmail1"><b>Hora de finalización:</b></label>
            <input type="time" class="form-control" id="Horafin"   name="Horafin" >
           </div> 
                       <div class="modal-footer">
                                    
                            <button type="submit" class="btn btn-danger" name="Guardar" cursor:hand >Guardar</button>
                    </div>
           </form>
    <!-- /.container -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
	
	
	
	
	<?php
}
?>

<?php
}else{

    echo '<script type="text/javascript">
    alert("Privilegio no admitido");
  
    </script>';

}


}else{
    echo '<script type="text/javascript">
    </script>';

}
?>
	
   