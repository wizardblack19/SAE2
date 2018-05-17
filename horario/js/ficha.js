	$(document).ready(function(){
        $("#tacks").addClass("active");
 $('#Regional').change(function(){
            
          var  val= $('#Regional').val(); //recibe el id del departamento para filtrar los municipios
            $('#Municipio').html('<option value="">Cargando...aguarde</option>'); // mensaje que se muestra mientras carga la operacion
        
         $.ajax({
                url: 'funciones/php/ListarMunicipios.php?id='+val, // funcion php con el id del departamento como parametro "id"
                data: 'id='+val,
                type: 'POST',
                success: function(resp){
                    //si todo es exitoso:
                 $('#Municipio').html(resp); // rellenamos la lista de municipios segun el id del departamento
                 }
            });
        });

 $('#Municipio').change(function () {

   var  val = $('#Municipio').val();
     $('#Centro').html('<option value="">Cargando...aguarde</option>');

     $.ajax({
         url: 'funciones/php/ListarCentros.php?id='+val,
         data: 'id=' + val,
         type: 'POST',


         success: function (resp) {
             $('#Centro').html(resp);
         }
     });

 });

 $('#Centro').change(function () {

     var val = $('#Centro').val();
     $('#Sede').html('<option value="">Cargando...aguarde</option>');

     $.ajax({
         url: 'funciones/php/ListarSedes.php?id='+val,
         data: 'id=' + val,
         type: 'POST',

         success: function (resp) {
             $('#Sede').html(resp);
         }
     });

 });

 $('#Sede').change(function () {

     var val = $('#Sede').val();
     $('#Programa').html('<option value="">Cargando...aguarde</option>');

     $.ajax({
         url: 'funciones/php/ListarProgramas.php?id=' + val,
         data: 'id=' + val,
         type: 'POST',

         success: function (resp) {
             $('#Programa').html(resp);
         }
     });

 });

$('#AgregarFicha').click(function(){

        var regional = $("#Regional").val();
        
            if (regional == "") {
                alertify.error('Debe seleccionar una regional disponible  ');
                $("#Regional").focus();
                return false;
            }

        //Obtenemos el valor del campo nombre
        var mun = $("#Municipio").val();
        //Validamos el campo Nombre, simplemente miramos que no esté vacío
        if (mun == "") {
            alertify.error('Debe Ingresar un codigo');
            $("#Municipio").focus();
            return false;
        }
    
        var centro = $("#Centro").val();
    
        if (centro == "") {
          alertify.error('Debe seleccionar un centro');
          $("#Centro").focus();
          return false;
      }

      var sede = $("#Sede").val();
     
      if (sede == "") {
          alertify.error('Debe Introducir la sede del programa');
          $("#Sede").focus();
          return false;
      }
      var programa = $("#Programa").val();

      if (programa == "") {
          alertify.error('Debe Seleccionar un  programa para la ficha');
          $("#Programa").focus();
          return false;
      }
      var jornada = $("#Jornada").val();

      if (jornada == "") {
          alertify.error('Debe Seleccionar una  jornada para la ficha');
          $("#Jornada").focus();
          return false;
      }
      var tipo = $("#TipoFormacion").val();
    
      if (tipo == "") {
          alertify.error('Debe Seleccionar un tipo de formacion para el programa');
          $("#TipoFormacion").focus();
          return false;
      }
      var instructor = $('#Instructor').val();

      if (instructor =="") {
   		alertify.error('Debe Introducir una Instructor');
   		$("#Instructor").focus();
      	return false;
      }
      var numero = $('#Numero').val();

      if (numero =="") {
   		alertify.error('Debe Introducir un Nombre para el centro');
   		$("#Numero").focus();
      	return false;
      }
    var cantidad = $('#Cantidad').val();

      if (cantidad =="") {
   		alertify.error('Debe Introducir un Cantidad de Aprendices para el programa');
   		$("#Cantidad").focus();
      	return false;
      }
      
      var inicio = $('#FechaInicial').val();

      if (inicio == "") {
          alertify.error('Debe Introducir un Cantidad de Aprendices para el programa');
          $("#FechaInicial").focus();
          return false;
      }
      var fin = $('#FechaFinal').val();

      if (fin == "") {
          alertify.error('Debe Introducir un Cantidad de Aprendices para el programa');
          $("#FechaFinal").focus();
          return false;
      }
      
        	
        $.ajax({
            type: "GET",
            url: 'funciones/php/RegistrarFicha.php?regional='+regional+'&municipio='+mun+'&centro='+centro+'&sede='+sede+'&programa='+programa+'&jornada='+jornada+'&tipo='+tipo+'&instructor='+instructor+'&numero='+numero+'&cantidad='+cantidad+'&fechainicio='+inicio+'&fechafin='+fin,
            data:'regional='+regional,
            success: function() {
            	$('#ModalRegistroFicha').modal('hide');
                alertify.success('Ficha Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('#tabla_ficha').load("funciones/php/TablaFicha.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                 //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
			// Javascript method's body can be found in assets/js/demos.js

            

		});
		