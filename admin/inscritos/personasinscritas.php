
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
 $query ="SELECT tipo.Nombretipo, semestre.Nombresemestre, personas.Cedula, personas.Nombres, programa.Nombre, cursos.NombreCurso, personas.seguro_id  FROM personas_has_cursos LEFT JOIN cursos ON personas_has_cursos.idCursos = cursos.idCursos LEFT JOIN personas ON personas.idPersonas=personas_has_cursos.idPersonas LEFT JOIN programa ON personas.idPrograma=programa.idPrograma LEFT JOIN semestre ON semestre.idsemestre= personas.idsemestre LEFT JOIN tipo ON personas.idTipo=tipo.idTipo ORDER BY personas.Nombres ASC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>IBUPSAM</title>  
           <script src="../../js/jquery.min.js"></script>  
           <link rel="stylesheet" href="../../css/bootstrap.min.css" />  
           <script src="../../js/jquery.dataTables.min.js"></script>  
           <script src="../../js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="../../css/dataTables.bootstrap.min.css" />  
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
                  <hr><td><strong>Exportar tabla a Excel</strong></td>
<td align="center"><a href="../Excel/reporte_ok.php" value='1' name="boton1"><img src="../../img/excel.jpg" width="30" height="25"/></a></td><hr>
                     <table id="employee_data" class="table " ">  
                          <thead>  
                               <tr>  
                                    <td>Cedula</td>  
                                    <td>Nombre</td>  
                                    <td>Curso Libre</td>  
                                    <td>Programa</td>  
                                    <td>Semestre</td>  
                                     <td>Estamento</td>  
                                      
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                <form method="POST" action="../CRUDpersonas.php"> 
                                    <td nowrap>'.$row["Cedula"].'</td>  
                                    <td nowrap>'.$row["Nombres"].'</td>  
                                    <td>'.$row["NombreCurso"].'</td>  
                                    <td>'.$row["Nombre"].'</td>  
                                    <td>'.$row["Nombresemestre"].'</td>  
                                    <td>'.$row["Nombretipo"].'</td> 
                                    
                                    
                                    

                                               

    
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