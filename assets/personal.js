$(function() {
	cargarcookie();
        $('#ver').click(function(){
            var pathname = window.location.pathname;
            alert(window.location);
        });

        $('.cosa').click(function(){
            $('.cosa').removeClass( "active" );
           $(this).addClass( "active" );

        });        
		
        $('.unidad').click(function( event ){
        	event.preventDefault();
        	var unidad = $(this).attr('unidad');
            Cookies.set('UNIDAD', unidad);
            bimestre();
        });
		
        function bimestre(){
        	if(Cookies.get('UNIDAD')){
        		var unidad = Cookies.get('UNIDAD');
        	}else{
        		var unidad = 0;
        	}
        	if(unidad == 1){
        		$('#verUNIDAD').html(unidad+"ra. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 2){
        		$('#verUNIDAD').html(unidad+"da. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 3){
        		$('#verUNIDAD').html(unidad+"ra. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 4){
        		$('#verUNIDAD').html(unidad+"ta. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}
        	desbloquea(unidad);
        	swal("Usted seleccionó la unidad numero: "+unidad);
        }

        function cargarcookie(){
        	if(Cookies.get('UNIDAD')){
        		var unidad = Cookies.get('UNIDAD');
        	}else{
        		var unidad = 0;
        	}
        	if(unidad == 1){
        		$('#verUNIDAD').html(unidad+"ra. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 2){
        		$('#verUNIDAD').html(unidad+"da. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 3){
        		$('#verUNIDAD').html(unidad+"ra. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}else if(unidad == 4){
        		$('#verUNIDAD').html(unidad+"ta. Unidad");
                $('#verUNIDAD1').html(unidad);
        	}
            desbloquea(unidad);
            return unidad;
        }
        
        function desbloquea(unidad){
            if(unidad>0){
                $(".bloqueo").show();
                $(".msg").html("");

            }else{
                $(".bloqueo").hide();
                $(".msg").html('<b>Debe seleccionar unidad a trabajar</b>');
            }
        }
});
