$(document).ready(function() {
 
  $('.agregar').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $(".Nombre").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (nombre == "") {
            alertify.error('Debe Introducir su primer Nombre');
            $(".Nombre").focus();
            return false;
        }

      
        var nombre2 = $(".Nombre2").val();
      
        if (nombre2 == "") {
            alertify.error('Debe Introducir su segundo nombre');
            $(".Nombre2").focus();
            return false;
        }
        var apellido = $(".Apellido").val();
       
        if (apellido == "") {
            alertify.error('Debe Introducir su primer Apellido');
            $(".Apellido").focus();
            return false;
        }
        var apellido2 = $(".Apellido2").val();
      
        if (apellido2 == "") {
            alertify.error('Debe Introducir su segundo Apellido');
            $(".Apellido2").focus();
            return false;
        }

        var tipodoc = $(".TipoDocumento").val();
        if (tipodoc == "") {
            alertify.error('Debe Seleccionar un tipo documento');
            $(".TipoDocumento").focus();
            return false;
        }

           var numero = $(".NroDocumento").val();
        if (numero == "") {
            alertify.error('Debe ingresar su numero de documento');
            $(".NroDocumento").focus();
            return false;
        }

           var tipoins = $(".TipoInstructor").val();
        if (tipoins == "") {
            alertify.error('Debe Seleccionar tipo instructor');
            $(".TipoInstructor").focus();
            return false;
        }

   var genero = $(".Genero").val();
        if (genero == "") {
            alertify.error('Debe ingresar su sexo');
            $(".Genero").focus();
            return false;
        }
           var dir = $(".Direccion").val();
        if (dir == "") {
            alertify.error('Debe ingresar su direccion');
            $(".Direccion").focus();
            return false;
        }
           var telefono = $(".Telefono").val();
        if (telefono == "") {
            alertify.error('Debe ingresar su numero de telefono');
            $(".Telefono").focus();
            return false;
        }
   var profesion = $(".Profesion").val();
        if (profesion == "") {
            alertify.error('Debe ingresar su profesion');
            $(".Profesion").focus();
            return false;
        }
           var email = $(".Email").val();
        if (email == "") {
            alertify.error('Debe ingresar su email');
            $(".Email").focus();
            return false;
        }



        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_conte").serialize();

        $.ajax({
            type: "POST",
            url: "funciones/RegistrarInstructor.php",
            data: obtener,
            success: function() {
                alertify.success('Tus datos han sido insertados correctamente!'); //Mensaje de Datos Correctamente Insertados
                $('.tabla_ajax').load("funciones/MostrarTablaInstructores.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .Apellido").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
}); //Terminamos la Funcion Ready