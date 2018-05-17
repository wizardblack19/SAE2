$(document).ready(function() {


$('#Regional').change(function(){
	
	val= $('#Regional').val();
    $('#Centro').html('<option value="">Cargando...aguarde</option>');

 $.ajax({
        url: 'Funciones/mostrarCentroPorRegional.php',
        data: 'id='+val,
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
		$('#Ambiente').html('<option value="">Cargando...aguarde</option>');

		$.ajax({
			url: 'funciones/mostrarAmbienteHorarios.php',
			data:'id='+val,
			type: 'POST',
			
			
			success: function(resp)
			{
					$('#Ambiente').html(resp);
			}
		});

});


$('#Ambiente').change(function(){

	var val = $('#Ambiente').val();
	
    $('#tabla_horario').html('<h1>Cargando...aguarde</h1>');
  
 $.ajax({

 		type: "POST",
        url: 'funciones/mostrarTablaHorarios.php',
        data:{'Ambiente':val} ,
     
        success: function(data){
 
       $('#tabla_horario').html(data);
 
         }
    });

	   		
});


	
}); //Terminamos la Funcion Ready