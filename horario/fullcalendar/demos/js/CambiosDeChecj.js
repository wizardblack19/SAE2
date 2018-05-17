

		   	$('#CheckSinConfirmar').click(function(){

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
							    data: 'checked='+amb,
							    success: function(events)
							      {      
							      
							  			  var color = (events[0].color);
							    		 
									      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
									      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
							            
							              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
							              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
							              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
							               
							       }
		    		 });

		 			}
		 			else
		 			{
						$("#CheckSinConfirmar").prop('checked', true);

		 			}
		 	
			});

		 	$('#CheckConfirmados').click(function(){

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
							    data: 'checked='+amb,
							    success: function(events)
							      {      
					      
					  			  var color = (events[0].color);
					    		 
							      $(".fc-event").css("background", color); //asigna el color al evento segun el instructor
							      $(".fc-event-container").css("font-size", "14px"); //cambia el tamaño de la letra dentro del evento
					            
					              $('#calendar').fullCalendar('removeEvents'); // remueve los eventos de la consulta anterior
					              $('#calendar').fullCalendar('addEventSource', events); //agrega los nuevos eventos al calendario
					              $('#calendar').fullCalendar('rerenderEvents' ); // ni puta idea de que hace esto XD
					               
							       }

		    				 });

		 		}
		 		else{
		 		
				 $("#CheckConfirmados").prop('checked', true);

		 			}
		  
		  

			});
			 		$('#CheckPorInstructor').click(function(){

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
		  

			});

	 	$('#CheckPorFichas').click(function(){
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
		       					
		 				 }
		 				 else
		 				 {
		 				 		 $("#CheckPorFichas").prop('checked', true);
		 				 }
		 	
		 					  

			});




