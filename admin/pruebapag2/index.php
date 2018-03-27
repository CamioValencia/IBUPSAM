
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
<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb"); 
 mysqli_set_charset($connect, 'utf8'); 
 $query ="SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo, personas.Imagen, personas.aceptado FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='S'";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>IBUPSAM</title>  
           <script src="./jquery.min.js"></script>  
           <link rel="stylesheet" href="./bootstrap.min.css" />  
           <script src="./jquery.dataTables.min.js"></script>  
           <script src="./dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="./dataTables.bootstrap.min.css" />  
           <link href="../../css/bootstrap.min.css" rel="stylesheet">
           <link rel="shortcut icon" sizes="144x144" href="../../img/logo2.ico">

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
           <br /><br />  
           <div class="container">  
                 
                <br/>  <br><br><br><br>
                <div class="table-responsive">  
                     <table id="employee_data" class="table " ">  
                          <thead>  
                               <tr>  
                                    <td>Nombre</td>  
                                    <td>Address</td>  
                                    <td>Gender</td>  
                                    <td>Designation</td>  
                                    <td>Age</td>  
                                     <td>Age</td>  
                                     <td>Age</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                
                                    <td nowrap>'.$row["Nombres"].'</td>  
                                    <td nowrap>'.$row["Direccion"].'</td>  
                                    <td>'.$row["Telefono"].'</td>  
                                    <td>'.$row["idPersonas"].'</td>  
                                    <td><input type="hidden" id="cedula" name="cedula[]" value='.$row["Cedula"].' '.$row["Cedula"].' </td>
                                    <td nowrap><a href="../../fotos/'.$row["Imagen"].'" target="_blank"><img src="../../fotos/'.$row["Imagen"].'" width="100px" height="100px">
                                    
                                    
                                    

                                    <td><button type="submit" class="btn btn-primary btn-large" name="BotonAceptar" value="Aceptar">Enviar</button></form></td>
                                               
                                    
    
                               </tr>  




                               ';  
                          }  
                          ?>  

                               

                     </table> 


                </div>  <br>
                
                     

           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  

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