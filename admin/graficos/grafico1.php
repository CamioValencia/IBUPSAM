<?php

				require_once("../conexion.php");

?>
<!DOCTYPE HTML>
<html>
	<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienestar universitario </title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="144x144" href="../../imagenes/logo.ico">

    <!-- Custom CSS -->
    <link href="../../css/round-about.css" rel="stylesheet"> 
	
	<br> <br> <br>
   
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Grafico de pastel'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Masculino',
            data: [


            <?php

            $search = $_POST["search"];

            if( $search == 'Sexo') {
      
      ?>
			
			<?php

			$sql=mysql_query("SELECT personas.Sexo,COUNT(*) AS total FROM personas WHERE (personas.Sexo= 'M' OR personas.Sexo='F') AND personas.aceptado='S' GROUP BY Sexo");
			while($res=mysql_fetch_array($sql)){
			?>
			
                ['<?php echo $res['Sexo']; ?>', <?php echo $res['total']; ?>],
			
			<?php
			}
			?>

      <?php
      $search = $_POST["search"];
      }elseif ($search == 'Programa') {
        # code..
      ?>

      <?php

      $sql=mysql_query("SELECT programa.Nombre,COUNT(*) AS total FROM personas,programa WHERE programa.idPrograma=personas.idPrograma AND (personas.idPrograma= '1' OR personas.idPrograma= '2' OR personas.idPrograma= '3' OR personas.idPrograma= '4' OR personas.idPrograma= '5' OR personas.idPrograma= '6' OR personas.idPrograma= '7') AND personas.aceptado='S' GROUP BY Nombre");
      while($res=mysql_fetch_array($sql)){
      ?>
      
                ['<?php echo $res['Nombre']; ?>', <?php echo $res['total']; ?>],
      
      <?php
      }
      ?>

      <?php
      }
      ?>  	

            ]
        }]
    });
});


		</script>
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
	
	<!-- Navigation -->
  <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
                    <img style="max-width:150px; margin-top: -12px;" src="../../img/logo1.png">
                </a>
                
            </div>
            <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav navbar-form navbar-right" >
                    <li><a href="../usuarios.php">Inicio</a></li>
                    <li ><a href="../inscritos.php">Inscritos</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pre-inscritos <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Pre-inscripciones/table_personal.php">En espera</a></li>
          <li><a href="../Pre-inscripciones/aceptados.php">Aceptados</a></li>
          <li><a href="../Pre-inscripciones/todos.php">Todos</a></li>
        </ul>
          <li class="active"><a href="../estadisticas.php">Estadisticas</a></li>
          
        
        
        <li><a href="../../logout.php">Cerrar sesión </a></li>
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
<script src="../../Estadisticas/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../../Estadisticas/Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<br><br>


	</body>
</html>