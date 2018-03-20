$(function() {
	$( "#login" ).submit(function( event ) {
	  event.preventDefault();
		$.post( "core.php?l=login", $( "#login" ).serialize(), function( data ) {
		  if(data.id == 1){
		  	console.log(data.error);
		  	var url = "index.php";
		  	dataG(data.codigo,data.tipo);
			$(location).attr('href',url);
		  }else if(data.id == 0){
		  	$("[name='pass']").val('');
		  	swal("Imposible acceder", "...verifique su codigo o contraseña.", "error");
		  }
		}, "json")
		.fail(function() {
    		swal("Imposible acceder", "...error en su conexión o servidor.", "error");
    		$("[name='pass']").val('');
  		})
	});

	function dataG(codigo,tipo){
		$.post( "core.php?l=data",{codigo:codigo,tipo:tipo}, function( data ) {
		  if(data == 1){console.log('Data Iniciada SAE');}
		});		
	}


});
