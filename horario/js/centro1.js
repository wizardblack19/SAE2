$(document).ready(function() {
  $('.agregarcentro').click(function(){

        //Obtenemos el valor del campo nombre
        var cod = $(".Codigo").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (cod == "") {
            alertify.error('Debe Ingresar un codigo');
            $(".Codigo").focus();
            return false;
        }

      
      var depto = $(".Departamentos").val();
    
      if (depto == "") {
          alertify.error('Debe seleccionar un departamento');
          $(".Departamentos").focus();
          return false;
      }

      var director = $(".Director").val();
     
      if (director == "") {
          alertify.error('Debe Introducir el director de la regional');
          $(".Director").focus();
          return false;
      }
      var nombre = $(".Nombre").val();
    
      if (nombre == "") {
          alertify.error('Debe Introducir un nombre para la regional');
          $(".Nombre").focus();
          return false;
      }
      var direccion = $('.Direccion').val();

      if (direccion =="") {
   		alertify.error('Debe Introducir una direccion para el centro');
   		$(".Direccion").focus();
      	return false;
      }
          var tel = $('.Telefono').val();

      if (tel =="") {
   		alertify.error('Debe Introducir un telefono para el centro');
   		$(".Telefono").focus();
      	return false;
      }
    var email = $('.Email').val();

      if (email =="") {
   		alertify.error('Debe Introducir un Email para el centro');
   		$(".Email").focus();
      	return false;
      }

        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $('#form_centro').serialize();
		alert(email);
        $.ajax({
            type: "POST",
            url: "funciones/RegistrarCentro.php",
            data: obtener,
            success: function() {
                alertify.success('Regional Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('.tabla_centro').load("funciones/mostrarTablaCentro.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .Director, .Telefono, .Email, .Regional, .Municipio, .Codigo, .Direccion").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready