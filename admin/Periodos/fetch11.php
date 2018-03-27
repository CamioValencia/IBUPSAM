<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "mydb");
$columns = array('idPersona', 'Cedula', 'Nombres', 'NombreCurso', 'Fecha');

$query = "SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' AND ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'Fecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (idPersonas LIKE "%'.$_POST["search"]["value"].'%" 
  OR Cedula LIKE "%'.$_POST["search"]["value"].'%" 
  OR Nombres LIKE "%'.$_POST["search"]["value"].'%" 
  OR NombreCurso LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY idPersonas DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["idPersonas"];
 $sub_array[] = $row["Cedula"];
 $sub_array[] = $row["Nombres"];
 $sub_array[] = $row["NombreCurso"];
 $sub_array[] = $row["Fecha"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM Personas";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
