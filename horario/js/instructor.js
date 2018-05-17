$(document).ready(function() {
 
  $('#AgregarInstructor').click(function(){

        //Obtenemos el valor del campo nombre
        var nombre = $("#Nombre").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (nombre == "") {
            alertify.error('Debe Introducir su primer Nombre');
            $("#Nombre").focus();
            return false;
        }

      
        var nombre2 = $("#Nombre2").val();
      
        if (nombre2 == "") {
            alertify.error('Debe Introducir su segundo nombre');
            $("#Nombre2").focus();
            return false;
        }
        var apellido = $("#Apellido").val();
       
        if (apellido == "") {
            alertify.error('Debe Introducir su primer Apellido');
            $("#Apellido").focus();
            return false;
        }
        var apellido2 = $("#Apellido2").val();
      
        if (apellido2 == "") {
            alertify.error('Debe Introducir su segundo Apellido');
            $("#Apellido2").focus();
            return false;
        }

        var tipodoc = $("#TipoDoc").val();
        if (tipodoc == "") {
            alertify.error('Debe Seleccionar un tipo documento');
            $("#TipoDoc").focus();
            return false;
        }

           var numero = $("#Documento").val();
        if (numero == "") {
            alertify.error('Debe ingresar su numero de documento');
            $("#Documento").focus();
            return false;
        }

           var tipoins = $("#TipoIns").val();
        if (tipoins == "") {
            alertify.error('Debe Seleccionar tipo instructor');
            $("#TipoIns").focus();
            return false;
        }

   var genero = $("#Genero").val();
        if (genero == "") {
            alertify.error('Debe ingresar su sexo');
            $("#Genero").focus();
            return false;
        }
           var dir = $("#Direccion").val();
        if (dir == "") {
            alertify.error('Debe ingresar su direccion');
            $("#Direccion").focus();
            return false;
        }
           var telefono = $("#Telefono").val();
        if (telefono == "") {
            alertify.error('Debe ingresar su numero de telefono');
            $("#Telefono").focus();
            return false;
        }
   var profesion = $("#Profesion").val();
        if (profesion == "") {
            alertify.error('Debe ingresar su profesion');
            $("#Profesion").focus();
            return false;
        }
           var email = $("#Email").val();
        if (email == "") {
            alertify.error('Debe ingresar su email');
            $("#Email").focus();
            return false;
        }



        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
       

        $.ajax({
            type: "POST",
            url: 'funciones/php/RegistrarInstructor.php?nombre='+nombre+'&nombre2='+nombre2+'&apellido='+apellido+'&apellido2='+apellido2+'&tipodocumento='+tipodoc+'&nrodocumento='+numero+'&tipoinstructor='+tipoins+'&genero='+genero+'&direccion='+dir+'&telefono='+telefono+'&profesion='+profesion+'&email='+email,
            data: 'data='+profesion,
          
        }).done(function(){
               $('#ModalRegistroInstructor').modal('hide');
                alertify.success('Tus datos han sido insertados correctamente!'); //Mensaje de Datos Correctamente Insertados
                $('#tabla_instructor').load("funciones/php/TablaInstructor.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
        
        }).fail(function(){
            alertify.confirm("algun beta extraño ocurrio");
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
  $("#teacher").addClass("active");
}); //Terminamos la Funcion Ready