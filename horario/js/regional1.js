$(document).ready(function() {
  $('.agregarregional').click(function(){

        //Obtenemos el valor del campo nombre
        var pais = $(".Pais").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (pais == "") {
            alertify.error('Debe seleccionar un pais');
            $(".Pais").focus();
            return false;
        }

      
        var depto = $(".Departamento").val();
      
        if (depto == "") {
            alertify.error('Debe seleccionar un departamento');
            $(".Departamento").focus();
            return false;
        }
        var director = $(".DirectorRegional").val();
       
        if (director == "") {
            alertify.error('Debe Introducir el director de la regional');
            $(".DirectorRegional").focus();
            return false;
        }
        var nombre = $(".Nombre").val();
      
        if (nombre == "") {
            alertify.error('Debe Introducir un nombre para la regional');
            $(".Nombre").focus();
            return false;
        }




        //Creamos la Variable que recibira el "Value" de todos los Input que esten dentro del Form
        var obtener = $("#form_regional").serialize();
        	
        $.ajax({
            type: "POST",
            url: "funciones/RegistrarRegional.php",
            data: obtener,
            success: function() {
            	
                alertify.success('Regional Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('.tabla_regional').load("funciones/MostrarTablaRegional.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .DirectorRegional").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click

$('#editarRegional').click(function(){

 var  id =$('#idRegional').html();
 alert(id);
var  depar =$('#DepartamentoRegional').html();

var  director =$('#DirectorRegional').html();
var  nombre =$('#NombreRegional').html();

var obtener=$(".form_regionalOpciones").serialize();

   
   $.ajax({
            type: "POST",
            url: "funciones/llenarCamposRegional.php",
            data:{'idRegional':id} ,
            success: function() {
                
                alertify.success('Regional Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('#section').load("funciones/llenarCamposRegional.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                $(".Nombre, .DirectorRegional").val(""); //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
       return false;
});

}); //Terminamos la Funcion Ready