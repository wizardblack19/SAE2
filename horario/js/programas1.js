$(document).ready(function() {
  $('.agregarprograma').click(function(){

        //Obtenemos el valor del campo nombre
        var reg = $("#Regional").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (reg == "") {
            alertify.error('Debe Seleccionar una regional');
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
          alertify.error('Debe Introducir un tipo de formacion para el programa de formacion');
          $(".TipoFormacion").focus();
          return false;
      }
      var codigo = $('.Codigo').val();

      if (codigo =="") {
   		alertify.error('Debe Introducir una codigo para el programa de formacion');
   		$(".Codigo").focus();
      	return false;
      }
          var Nombre = $('.Nombre').val();

      if (Nombre =="") {
   		alertify.error('Debe Introducir un nombre para el Programa de formacion');
   		$(".Nombre").focus();
      	return false;
      }
    var cant = $('.Cantidad').val();

      if (cant =="") {
   		alertify.error('Debe Introducir la cantidad de aprendices del programa');
   		$(".Cantidad").focus();
      	return false;
      }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $('.form_programa').serialize();
		alert(obtener);
        $.ajax({
            type: "POST",
            url: "funciones/RegistrarProgramas.php",
            data: obtener,
            success: function() {
                alertify.success('Sede Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('.tabla_programa').load("funciones/mostrarTablaProgramas.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .Director, .Telefono, .Email, .Regional, .Municipio, .Codigo, .Direccion").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready