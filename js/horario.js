$(document).ready(pagination(1));
$(function(){

$('#body').on('ready', function(){
		var desde = 0;
		var hasta = 0;
		var url = '../../admin/horario/php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../../admin/cursoslibres2/php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../../admin/cuentas2/php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../../admin/horario/php/busca_horario.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});



});




function agregaRegistro(){
	var url = '../../admin/horario/php/agrega_horario.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}




function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../../admin/horario/php/edita_horario.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-prod1').val(id);
				$('#Nombres').val(datos[0]);
				$('#Parentesco').val(datos[1]);
				$('#idFamiliar').val(datos[2]);
				$('#Nombres').val(datos[3]);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}


function pagination(partida){
	var url = '../../admin/horario/php/paginarhorario.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}



function addInput() {
    var fila = '<fieldset id="field">';
    fila += '<div class="form-group col-md-4"><select name="Dia[]" id="Dia" class="form-control"> <option>Seleccione una Opci&oacuten...</option><option value="LUNES">Lunes</option><option value="MARTES">Martes</option><option value="MIERCOLES">Miercoles</option><option value="JUEVES">Jueves</option><option value="VIERNES">Viernes</option><option value="SABADO">Sabado</option></select></div>';
    fila += '<div class="form-group col-md-3"><input type="time" class="form-control" id="Horaini"   name="Horaini[]" ></div>';
    fila += '<div class="form-group col-md-3"><input type="time" class="form-control" id="Horafin"   name="Horafin[]" ></div>';
    fila += '<input type="button" name="X_0" value="X" class="btn btn-default" onclick="removeInput(this);">';
    fila += '</fieldset>';
    $('#insertar').append(fila);
}

function removeInput( el ) {
        $(el).parent().remove();
}




