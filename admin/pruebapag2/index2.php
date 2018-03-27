<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $query ="SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo, personas.Imagen, personas.aceptado FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='S'";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Address</td>  
                                    <td>Gender</td>  
                                    <td>Designation</td>  
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
                                    <td>'.$row["Cedula"].'</td>  
                                    <td>'.$row["Imagen"].'</td> 
                                    <td><select id="aceptado" name="aceptado[]" value='.$row["aceptado"].' style="background-color:#ff0000;">
  
                                                
                                                if($row["aceptado"] == "N")
                                                     <option value="N" selected="selected">NO</option>
                                              
                                                if($row["aceptado"] == "S")
                                                    <option value="S" selected="selected">SI</option>
                                              
                                                
                                                 </select></td>


                                    
                                               

    

                               </tr>  
                              
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  