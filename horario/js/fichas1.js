$(document).ready(function() {
  $('.agregarficha').click(function(){

        //Obtenemos el valor del campo nombre
        var reg = $("#Regional").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (reg == "") {
            alertify.error('Debe Seleccionar una regional'); //alerta personalizada 
            $("#Regional").focus();
            return false;
        }

      
      var muni = $("#Municipio").val();
    
      if (muni == "") {
          alertify.error('Debe seleccionar un Municipio');
          $("#Municipio").focus();
          return false;
      }

      var centro = $(".Centro").val();
     
      if (centro == "") {
          alertify.error('Debe Seleccionar un Centro');
          $(".Centro").focus();
          return false;
      }
      var sede =$(".Sede").val();
      if (sede=="") {
      	alertify.error('Debe seleccionar una sede');
      	$(".Sede").focus();
      	return false;
      }

      var tipoFor = $(".TipoFormacion").val();
    
      if (tipoFor == "") {
          alertify.error('Debe Seleccionar un tipo de formacion para registrar la ficha');
          $(".TipoFormacion").focus();
          return false;
      }
      var jornada = $('.Jornada').val();

      if (jornada =="") {
   		alertify.error('Debe Seleccionar una Jornada para registrar la ficha');
   		$(".Jornada").focus();
      	return false;
      }
          var Cantidad = $('.Cantidad').val();

      if (Cantidad =="") {
   		alertify.error('Debe Introducir un nombre para el Programa de formacion');
   		$(".Cantidad").focus();
      	return false;
      }
    var fechai = $('.FechaInicio').val();

      if (fechai =="") {
   		alertify.error('Seleccione una fecha de inicio para la Ficha');
   		$(".FechaInicio").focus();
      	return false;
      }
          var fechaf = $('.FechaFin').val();

      if (fechaf =="") {
   		alertify.error('Seleccione una fecha de finalizacion para la Ficha');
   		$(".FechaFin").focus();
      	return false;
      }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $('.form_fichas').serialize();
		alert(obtener);
        $.ajax({
            type: "POST",
            url: "funciones/RegistrarFicha.php",
            data: obtener,
            success: function() {
                alertify.success('Ficha Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('.tabla_fichas').load("funciones/mostrarTablaFichas.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .Director, .Telefono, .Email, .Regional, .Municipio, .Codigo, .Direccion").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click

$('#Regional').change(function(){
	
	val= $('#Regional').val();
    $('#Municipio').html('<option value="">Cargando...aguarde</option>');

 $.ajax({
        url: 'mostrarMunicipios.php',
        data: 'id='+val,
        type: 'POST',
        success: function(resp){
        	
         $('#Municipio').html(resp);
         }
    });
});

$('#Municipio').change(function(){

	val =$('#Municipio').val();
		$('.Centro').html('<option value="">Cargando...aguarde</option>');

		$.ajax({
			url: 'funciones/mostrarCentro.php',
			data:'id='+val,
			type: 'POST',
			
			
			success: function(resp){
					$('#Centro').html(resp);
			}
		});

});
$('#Centro').change(function(){

	val =$('#Centro').val();
		$('.Sede').html('<option value="">Cargando...aguarde</option>');

		$.ajax({
			url: 'funciones/mostrarSede.php',
			data:'id='+val,
			type: 'POST',
			
			
			success: function(resp){
					$('#Sede').html(resp);
			}
		});

});
$('#Sede').change(function(){

	val =$('#Sede').val();
		$('#Programa').html('<option value="">Cargando...aguarde</option>');

		$.ajax({
			url: 'funciones/mostrarPrograma.php',
			data:'id='+val,
			type: 'POST',
			
			
			success: function(resp){
					$('#Programa').html(resp);
			}
		});

});

}); //Terminamos la Funcion Ready