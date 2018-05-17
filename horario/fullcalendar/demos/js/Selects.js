	$(document).ready(function(){
 		
$('#Regional').change(function(){




	val= $('#Regional').val();
    $('#Centro').html('<option value="">Cargando...aguarde</option>');

 $.ajax({
        url: '../../Funciones/php/ListarCentroPorRegional.php?id='+val,
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
			url: '../../funciones/php/ListarSedes.php?id='+val,
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
			url: '../../funciones/php/ListarAmbientes.php?id='+val,
			data:'id='+val,
			type: 'POST',
			
			
			success: function(resp)
			{
					$('#Ambiente').html(resp);
			}
		});

});



	});

	