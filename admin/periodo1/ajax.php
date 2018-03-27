<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "mydb");
$columns = array('idinscripcion', 'idPersonas', 'idCursos', 'estado', 'Fecha');

$query = "SELECT * FROM personas_has_cursos WHERE  ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'Fecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (idinscripcion LIKE "%'.$_POST["search"]["value"].'%" 
  OR idPersonas LIKE "%'.$_POST["search"]["value"].'%" 
  OR idCursos LIKE "%'.$_POST["search"]["value"].'%" 
  OR estado LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY idinscripcion DESC ';
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
 $sub_array[] = $row["idinscripcion"];
 $sub_array[] = $row["idPersonas"];
 $sub_array[] = $row["idCursos"];
 $sub_array[] = $row["estado"];
 $sub_array[] = $row["Fecha"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM personas_has_cursos";
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