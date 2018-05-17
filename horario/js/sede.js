	$(document).ready(function(){

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


$('#AgregarSede').click(function(){

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
          alertify.error('Debe seleccionar un departamento');
          $("#Centro").focus();
          return false;
      }

      var director = $("#Director").val();
     
      if (director == "") {
          alertify.error('Debe Introducir el director de la regional');
          $("#Director").focus();
          return false;
      }
      var nombre = $("#Nombre").val();
    
      if (nombre == "") {
          alertify.error('Debe Introducir un nombre para la regional');
          $("#Nombre").focus();
          return false;
      }
      var direccion = $('#Direccion').val();

      if (direccion =="") {
   		alertify.error('Debe Introducir una direccion para el centro');
   		$("#Direccion").focus();
      	return false;
      }
          var tel = $('#Telefono').val();

      if (tel =="") {
   		alertify.error('Debe Introducir un telefono para el centro');
   		$("#Telefono").focus();
      	return false;
      }
    var email = $('#Email').val();

      if (email =="") {
   		alertify.error('Debe Introducir un Email para el centro');
   		$("#Email").focus();
      	return false;
      }
      
      
        	
        $.ajax({
            type: "GET",
            url: 'funciones/php/RegistrarSede.php?regional='+regional+'&municipio='+mun+'&centro='+centro+'&director='+director+'&nombre='+nombre+'&direccion='+direccion+'&telefono='+tel+'&email='+email,
            data:'regional='+regional,
            success: function() {
            	$('#ModalRegistroSede').modal('hide');
                alertify.success('Sede Registrada Exitosamente!'); //Mensaje de Datos Correctamente Insertados
                $('#tabla_sede').load("funciones/php/TablaSede.php"); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
                 //Limpiamos los Input
            }
        }); //Terminamos la Funcion Ajax
        return false; //Agregamos el Return para que no Recargue la Pagina al Enviar el Formulario  
    }); //Terminamos la Funcion Click
			// Javascript method's body can be found in assets/js/demos.js
            $("#sede").addClass("active");
            

		});
		