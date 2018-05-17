

		   	$('#CheckSinConfirmar').click(function(){
		   		var amb= $('#Ambiente').val();


		   		$('#confirmarTodos').removeClass("nover");
		   		$('#confirmarTodos').addClass("btn btn-warning");
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}


		   				$('.BusquedaPorFicha').addClass("nover");
		 					$('.BusquedaPorInstructor').addClass("nover");
		 			$(".CheckSinConfirmar").addClass("sinconfirmar");//agregar color de fondo
 			
		 		var checked="true";

		 	 		if (this.checked) { //si esta seleccionado el checkbox quitara el color y el chulo de otros checkbox si los hay

		 	 		//=============CheckboxCONFIRMADOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS===========
		 	 				 $("#CheckConfirmados").prop('checked', false);
		 					  $(".CheckConfirmados").removeClass('confirmados');

		 			//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorInstructor").prop('checked', false);
		 					  $(".CheckPorInstructor").removeClass('porinstructor');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorFichas").prop('checked', false);
		 					  $(".CheckPorFichas").removeClass('porfichas');

		 					  //====

		 					   var checked="false";
		  					var amb = $('#Ambiente').val();
		     
		      				  $.ajax({
					 			type: "POST",
							    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
							    data: {checked:amb}
							    }).done(function (events) {

								  var color = (events[0].color);
						    		 
								      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
								      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
						            
						              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
						              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
						              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD


						         var date = new Date(2017,0,06); 
						          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

    							

								}).fail(function() {
								    alertify.error("No se encontraron horarios Sin Confirmar en este ambiente/instructor/ficha");
								    $('#calendar').fullCalendar('removeEvents');
								});

		 			}
		 			else
		 			{
						$("#CheckSinConfirmar").prop('checked', true);

		 			}
		 	
			});

		 	$('#CheckConfirmados').click(function(){
		 		var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}
				$('.BusquedaPorFicha').addClass("nover");
		 		$('.BusquedaPorInstructor').addClass("nover");
				var checked="false";

		 		$(".CheckConfirmados").addClass("confirmados");


		 			if(this.checked){

			//=============CheckBoxSINCONFIRMARRRRRRRRRRRRRRRRRRRRRRRRR===========
		 	 				 $("#CheckSinConfirmar").prop('checked', false); //quita la seleccion
		 					  $(".CheckSinConfirmar").removeClass('sinconfirmar'); //quita el color de fondo

		 			//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorInstructor").prop('checked', false);
		 					  $(".CheckPorInstructor").removeClass('porinstructor');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorFichas").prop('checked', false);
		 					  $(".CheckPorFichas").removeClass('porfichas');

		 			//========================================

								var checked="true";

									var amb = $('#Ambiente').val();
		     
		       				 $.ajax({
					 		   type: "POST",
							    url: 'php/acciones.php?checked='+checked+'&ambiente='+amb,
							    data: {checked:amb},
							   }).done(function (events) {

								  var color = (events[0].color);
						    		 
								      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
								      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
						            
						              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
						              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
						              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD


						         var date = new Date(2017,0,06); 
						          $('#calendar').fullCalendar('gotoDate', date); //nos manda a la fecha por defecto declarada en la linea anterior

    								

								}).fail(function() {
								    alertify.error("NO se encontraron horarios confirmados");
								    $('#calendar').fullCalendar('removeEvents');
								});

		 		}
		 		else{
		 		
				 $("#CheckConfirmados").prop('checked', true);

		 			}
		  
		  

				});

			 $('#CheckPorInstructor').click(function(){
			 	var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}


					 		$(".CheckPorInstructor").addClass("porinstructor");


					 		  $("#CheckSinConfirmar").prop('checked', false); //quita la seleccion
		 					  $(".CheckSinConfirmar").removeClass('sinconfirmar'); //quita el color de fondo

		 			//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorFichas").prop('checked', false);
		 					  $(".CheckPorFichas").removeClass('porfichas');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckConfirmados").prop('checked', false);
		 					  $(".CheckConfirmados").removeClass('confirmados');

		 			//========================================
		 					$('.BusquedaPorFicha').addClass("nover");
		 					$('.BusquedaPorInstructor').removeClass("nover");
		 				
		  					$.ajax({

	  							type:"GET",	  				
	  							url: "mostrarInstructores.php",
	  							 }).done(function (resp) {

								 $('#SelectInstructor').html(resp);
		                    	$('#calendar').fullCalendar('removeEvents');
		                    	return false;

								}).fail(function() {
								    alertify.error("No se Encontraron instructores");
								   
								});

	  							


			});

	 	$('#CheckPorFichas').click(function(){
	 				var amb= $('#Ambiente').val();
		   	
		   		if(amb==".::SELECCIONAR AMBIENTE::.")
		   		{
		   			alertify.error("SELECCIONE UN AMBIENTE PARA VER HORARIOS");
		   			return false;
		   		}
	 			var checked="true";
		 		$(".CheckPorFichas").addClass("porfichas");
						
						if(this.checked){
		 
		 					//=============CheckBoxSINCONFIRMARRRRRRRRRRRRRRRRRRRRRRRRR===========
		 	 				 $("#CheckSinConfirmar").prop('checked', false); //quita la seleccion
		 					  $(".CheckSinConfirmar").removeClass('sinconfirmar'); //quita el color de fondo

		 			//=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckPorInstructor").prop('checked', false);
		 					  $(".CheckPorInstructor").removeClass('porinstructor');

		 			 //=============CheckboxINSTRUCTORRRRRRRRRRRRR===========
		 	 				 $("#CheckConfirmados").prop('checked', false);
		 					  $(".CheckConfirmados").removeClass('confirmados');

		 			//========================================
		 					$('.BusquedaPorFicha').removeClass("nover");
		 					$('.BusquedaPorInstructor').addClass("nover");
		 					$('#calendar').fullCalendar('removeEvents');
		 					var sede=$('#Sede').val();		
				 			$.ajax({

				  							type:"GET",
				  				
				  							url: "mostrarFichas.php?sede="+sede,

		  						}).done(function(resp){

		              		   	$('#SelectFichas').html(resp);
				                    
				                   
				             		  }).fail(function(){
				             		  	alertify.error("NO SE ENCONTRARON FICHAS");
				             		  });



				  					

		       					
		 				 }
		 				 else
		 				 {
		 				 		 $("#CheckPorFichas").prop('checked', true);
		 				 }
		 	
		 					  

			});



	 	$('#GenerarHorarioInstructor').click(function(){


				var amb = $('#Ambiente').val();
				var ins = $('#SelectInstructor').val();
				alert(ins);
				alert(amb);
  					var confirmado="true";
  					$.ajax({
					    type: "GET",
					    url: 'php/MostrarHorarioPorInstructor.php?instructor='+ins+'&ambiente='+amb+'&confirmado='+confirmado,
					
		    		 }).done(function(events){
	    		 	  var color = (events[0].color);
					    	
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
					               

	    		 }).fail(function(){

	    		 	              $('#calendar').fullCalendar('removeEvents');
	    		 	              alertify.error("No hay horario asociado a este instructor");
	    		 	              return false;

	    		 });

	 	});


	 	$('#GenerarHorarioFicha').click(function(){

				var amb = $('#Ambiente').val();
				var ficha = $('#SelectFichas').val();
  					var confirmado="true";
  					alert("Ambiente:"+amb+" Ficha: "+ficha);
  					$.ajax({
					    type: "POST",
					    url: 'php/MostrarHorarioPorFicha.php?ambiente='+amb+'&confirmado='+confirmado+'&ficha='+ficha,
	    		 }).done(function(events){
	    		 	  var color = (events[0].color);
					    	
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
					               

	    		 }).fail(function(){

	    		 	              $('#calendar').fullCalendar('removeEvents');
	    		 	              alertify.error("No hay horario asociado a ese Nro. de FICHA & Ambiente");
	    		 	              return false;

	    		 });

	 	});
