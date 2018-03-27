

<!DOCTYPE html>
<html lang="es">
<style>


.captcha{
	border-radius: 5px;
	font-size: 20px;
	text-transform: uppercase;
	height: 45px;
	border-color: #000000;
	text-align: center;

}	

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

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Bienestar universitario </title>

<!-- Bootstrap Core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" sizes="144x144" href="../img/logo.ico">

<!-- Custom CSS -->
<link href="./css/round-about.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript">
function habi(){
    if(document.getElementById("idTipo").value !="3" ){
        document.getElementById("idPrograma").disabled=false;
        document.getElementById("idSemestre").disabled=false;
        document.getElementById("Codigo").disabled=false;
		document.getElementById("Imagen").disabled=false;
    }
    else{
        document.getElementById("idPrograma").disabled=true;
        document.getElementById("idSemestre").disabled=true;
        document.getElementById("Codigo").disabled=true;
		document.getElementById("Imagen").disabled=true
    }
}



function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
        patron =/[A-Za-z\s]/; // 4
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
}
function validarNum(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
        patron =/[0-9]/; // 4
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
}
fields = 2;
function addInput() {
    /*if (fields < 31) {
        var nombre = "nombre" + fields;
        var link = "link" + fields;
        document.getElementById('text').innerHTML +=
        "<table><tr><td>Nombre #"+fields+"</td><td><input type='text' name='"+nombre+"' /></td></tr><tr><td>Link #"+fields+"</td><td><input type='text' name='"+link+"' /></td></tr></table>";
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+fields+"'/>";
        fields += 1;
    }
    else {
        document.getElementById('warning').innerHTML =
        "Máximo 3 familiares.";
        document.form.add.disabled = true;
    } */

	var fila = '<fieldset id="field">';
	fila += '<div class="form-group col-md-4"><input class="form-control" type="text" name="nom_familiares[]" placeholder="Nombre" style="color: black"></div>';
    fila += '<div class="form-group col-md-3"><input class="form-control" type="text" name="tel_familiares[]" placeholder="Telefono" style="color: black"></div>';
    fila += '<div class="form-group col-md-3"><input class="form-control" type="text" name="par_familiares[]" placeholder="Parentesco" style="color: black"></div>';
    fila += '<input type="button" name="X_0" value="X" class="btn btn-default" onclick="removeInput(this);">';
    fila += '</fieldset>';
	$('#insertar').append(fila);
}

function removeInput( el ) {
    /*if (fields > 2) {
        document.getElementById('warning').innerHTML = "";
        var parent = document.getElementById('text');
        parent.removeChild(el);
        fields -= 1;
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+(fields-1)+"'/>";
    }*/
    $(el).parent().remove();
}

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript">


/*function addI() {
    /*if (fields < 31) {
        var nombre = "nombre" + fields;
        var link = "link" + fields;
        document.getElementById('text').innerHTML +=
        "<table><tr><td>Nombre #"+fields+"</td><td><input type='text' name='"+nombre+"' /></td></tr><tr><td>Link #"+fields+"</td><td><input type='text' name='"+link+"' /></td></tr></table>";
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+fields+"'/>";
        fields += 1;
    }
    else {
        document.getElementById('warning').innerHTML =
        "Máximo 3 familiares.";
        document.form.add.disabled = true;
    } */

    /*var fila = '<fieldset id="field1">';

    fila += '<div class="form-group col-md-4"><select class="form-control" id="sel1" name="serial2_id[]" ></select></div>'
    fila += '<input type="button" name="X_0" value="X" class="btn btn-default" onclick="removeInput(this);">';
    fila += '</fieldset>';
    $('#insert').append(fila);



    
}

function removeInput( el ) {
    /*if (fields > 2) {
        document.getElementById('warning').innerHTML = "";
        var parent = document.getElementById('text');
        parent.removeChild(el);
        fields -= 1;
        document.getElementById('cantidad').innerHTML = "<input type='text' name='cantidad' value='"+(fields-1)+"'/>";
    }*/
    /*$(el).parent().remove();
}

</script>

<script type="text/javascript">

/*function validar(){

var copia = document.getElementById("txtcopia").value;
var captcha = document.getElementById("captcha").value;
		
if(copia == captcha){
	window.open("http://www.google.com.pe");
}else{
	alert("El codigo Ingresado no coincide");
}
}*/

</script>
</head>

<body>
<!-- Navigation -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
       <div class="navbar-header">
            <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
              <img style="max-width:150px; margin-top: -12px;" src="./img/logo1.png">
            </a>
            
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-form navbar-right" >
                <li class="active"><a href="index.html">Inicio</a></li>
                <li><a href="login.html">Ingresar</a></li>    
            </ul>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="container">
    <div class="row">
     <form class="form-horizontal" id="Inscripciones" method="post" action="Inscripciones.php" enctype="multipart/form-data">
        <br><h2>FORMULARIO DE PRE-INSCRIPCIÓN A CURSOS LIBRES</h2><hr>
        <fieldset>
        <input type="hidden"  name="curso" value="1" class="form-control input-md">
        <input type="hidden"  name="aceptado" value="N" class="form-control input-md">

        <div class="form-group">
            <label class="control-label col-sm-4" for="Nom22">Documento de Identificaci&oacuten(*):</label>                  
            <div class="col-sm-4">
                <input type="text" class="form-control" id="Cedula"  onkeypress="return validarNum(event)" name="Cedula" placeholder="Documento Identificacion">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Nombre Completo(*):</label>                     
            <div class="col-sm-4">
                <input type="text" class="form-control" id="Nombres"  onkeypress="return validar(event)" name="Nombres" placeholder="Nombre Completo">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="selectbasic">Estamento(*):</label>
            <div class="col-sm-4">
                <select name="idTipo" id="idTipo"  class="form-control" onchange="habi()" >
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
                        $result2 = mysql_query("SELECT * FROM tipo", $link); 
                        while($row2 = mysql_fetch_array($result2)){
                            echo'<OPTION VALUE="'.$row2['idTipo'].'">'.$row2['Nombretipo'].'</OPTION>';
                        }
                    ?>                 
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="selectbasic">Codigo(*):</label>
            <div class="col-sm-4">
             <input type="text" class="form-control"  id="Codigo" onkeypress="return validarNum(event)" name="Codigo" placeholder="Codigo Estudiantil" disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="selectbasic">Fecha de nacimiento(*):</label>
            <div class="col-sm-4">
             <input type="date" class="form-control" name="FechaNac" id="FechaNac" placeholder="Fecha de Nacimiento">
            </div>
        </div>
        <div class="form-group">
        <label class="control-label      col-sm-4" for="Prénom">G&eacutenero(*):</label>                     
            <div class="col-sm-4">
                <select name="Genero" id="Genero" class="form-control">
                    <option>Seleccione una Opci&oacuten...</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Grupo sanguinero(*):</label>                     
            <div class="col-sm-4">
                <select name="Rh" id="Rh" class="form-control">
                    <option>Seleccione una Opci&oacuten...</option>
                    <option>A</option>
                    <option>B</option>
                    <option>O</option>
                    <option>AB</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Rh(*):</label>                     
            <div class="col-sm-4">
                <select name="Rh" id="Rh" class="form-control">
                    <option>Seleccione una Opci&oacuten...</option>
                    <option>+</option>
                    <option>-</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label      col-sm-4" for="Prénom">Direcci&oacuten de Residencia(*):</label>                     
            <div class="col-sm-4">
                <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">N&uacutemero de Celular(*):</label>                     
            <div class="col-sm-4">
                <input type="text" class="form-control" name="Telefono" onkeypress="return validarNum(event)"  id="Telefono" placeholder="Telefono">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Correo Electr&oacutenico(*):</label>                     
            <div class="col-sm-4">
                <input type="e-mail" class="form-control" name="Correo"   id="Correo" placeholder="Correo">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Programa Acad&eacutemico:</label>                     
            <div class="col-sm-4">
                <select name="idPrograma" id="idPrograma" class="form-control" disabled="disabled">
                    <option>Seleccione una Opci&oacuten...</option>
                    <?php 
                        $result3 = mysql_query("SELECT * FROM programa", $link);
                        while($row3 = mysql_fetch_array($result3)){
                            echo'<OPTION VALUE="'.$row3['idPrograma'].'">'.$row3['Nombre'].'</OPTION>';
                        }
                    ?>
                </select> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label      col-sm-4" for="Prénom">Semestre:</label>                     
            <div class="col-sm-4">
                <select name="idSemestre" id="idSemestre" class="form-control" disabled="disabled">
                    <option>Seleccione una Opci&oacuten...</option>
                    <?php 
                        $result4 = mysql_query("SELECT * FROM Semestre", $link);
                        while($row4 = mysql_fetch_array($result4)){
                            echo'<OPTION VALUE="'.$row4['idSemestre'].'">'.$row4['Nombresemestre'].'</OPTION>';
                        }
                    ?>
                </select>
            </div>
        </div>        
        <div class="form-group">
            <label class="control-label col-sm-4" for="Prénom"> Adjunte la imagen de su carnet refrendado:</label>                     
            <div class="col-sm-4">
                <input type="file" class="form-control" name="Imagen"   id="Imagen" disabled="disabled">
            </div>
        </div>

        
        
       <div class="container">
    <label class="control-label col-sm-4" for="Prénom"> Agregue los cursos libres:</label> 
    <div class="col-sm-6" id="insert"> 


    <?php 
        $result4 = mysql_query("SELECT * FROM cursos", $link);
        while($row4 = mysql_fetch_array($result4)){
            echo'<label class="checkbox-inline"><input type="checkbox" name="idCursos[]" value="'.$row4['idCursos'].'">'.$row4['NombreCurso'].'</label>';
        }
    ?>
     
    
</div>
</div>

        <div class="form-group">
            <hr>
            <B>FORMULARIO PARA AGREGAR REFERENCIAS FAMILIARES</B><br><br>

            <label class="control-label col-sm-3" for="send"></label>
            <div class="col-sm-8">
                <div id="insertar">
                    <fieldset id="field">                        
                    <div class="form-group col-md-4">
                       <input type="text"  name="nom_familiares[]" placeholder="Nombre" class="form-control">
                    </div> 
                    <div class="form-group col-md-3">                       
                        <input type="text" class="form-control" name="tel_familiares[]" placeholder="Telefono" style="color: black">
                    </div>
                        <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="par_familiares[]" placeholder="Parentesco" style="color: black">
                    </div>
                    
                        <input type='button' name = "X_0" value='X' class='btn btn-default'>
                        <input type="button" value="Agregar un familiar" class="btn btn-default" onclick="addInput();">
                    </fieldset>
                </div> <br><br>                     
            </div>
           
            <div class="form-group">
                <label class="control-label      col-sm-5" for="send">Confirma el registro!</label>
                <div class="col-sm-7">
                    <button id="send" name="Boton" class="btn btn-default" onclick="validar()">Enviar</button>
                    <input type="button" class="btn btn-danger" action="./index.html" value="Cancelar" onclick = "location='./index.html'"> 
                </div>
            </div>  
        </div>
        </fieldset>
     </form>
        <hr>

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
</div>

 <script src="./js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>

</body>

</html>