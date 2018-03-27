<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "testing");  
      $output = '';  
      $query = "SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha 
      FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos 
      WHERE Fecha BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Customer Name</th>  
                     <th width="43%">Item</th>  
                     <th width="10%">Value</th>  
                     <th width="12%">Order Date</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["idPersonas"] .'</td>  
                          <td>'. $row["Cedula"] .'</td>  
                          <td>'. $row["Nombres"] .'</td>  
                          <td>$ '. $row["NombreCurso"] .'</td>  
                          <td>'. $row["Fecha"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
