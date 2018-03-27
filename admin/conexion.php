 <?php
$conexion=@mysql_connect("localhost","root","");
mysql_select_db("mydb",$conexion);
mysql_query("SET NAMES 'utf8'");
/*if($conexion)
       echo "Ok DB";
else
       echo "Error DB";
*/
?>