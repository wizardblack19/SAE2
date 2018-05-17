	$(document).ready(function(){
		 $(".fc-event-container").css("font-size", "20px");
	$("#printpdf").click(function(){
		//ACA OCULTO LAS OPCIONES ARRIBA DEL HORARIO
	
	 $(".fc-event-container").css("font-size", "14px");
		Imprimir($('<div/>').prepend($('#calendar').clone()).html());
		
			function Imprimir(data) 
			{
			
				var Var = $('#NroFicha').val();			

				var mywindow = window.open('', 'my div', 'height=700,width=700');
			    mywindow.document.write('<html><head>');
			    mywindow.document.write('<link rel="stylesheet" href="css/fullcalendar.min.css" type="text/css" />');
			    mywindow.document.write('<link rel="stylesheet" href="css/fullcalendar.css" type="text/css" />');
			    mywindow.document.write('</head><body>');
			    mywindow.document.write(data);
			    mywindow.document.write('</body></html>');

			  		
			  		return true;
			}
  		//ACA VUELVO A MOSTRAR LAS OPCIONES LUEGO DE EXPORTAR A PDF

		
	});

			
				$('#GenerarHorarioAprendiz').click(function(){

					var ficha = $('#NroFicha').val();
					if(ficha =="")
					{	alertify.confirm("NO HAY HORARIOS RELACIONADOS A ESE Nro. DE FICHA: " + ficha);
						return false;
					}else
					{

						$.ajax({
								type: "get",
								url: 'php/MostrarHorarioPorFichaAprendiz.php?ficha='+ficha,
								data: 'ficha='+ficha,
								success: function(datos)
								{
									var result = (datos[0].mensajeError);

									if(result == 1)
									{
										alertify.confirm("No hay horarios asociados a ese Nro de ficha: "+ficha);
									   $('#calendar').fullCalendar('removeEvents');
										return false;
									}
									else
									{
										alertify.confirm("SE HA GENERADO EL HORARIO CON Nro de FICHA: "+ ficha);
										cargarHorarioInicial(ficha); //CARGAR HORARIO POR DEFECTO CON TODAS LAS HORAS.
										
									}

								}
						});


					}

					

				});
			


					function cargarHorarioInicial(ficha)
					{	
						var	calendar = $('#calendar').fullCalendar({  // Rellenar calendario por defecto
				            header:{
				                left: 'prev,next today',
				                center: '',
				                right: ''
				            },

				            defaultView: 'agendaWeek',
				            editable: false,
				            selectable: false,
				            allDaySlot: false,
				            minTime: '06:00',
				            maxTime:'20:00',
				       		firstDay:1,
				       		eventTextColor:'#fff',			       		
				       		
				     
				            events: 'php/MostrarHorarioPorFichaAprendiz.php?ficha='+ficha,
				            // Recibir eventos por defecto de la DB para rellenar
				             
				            eventClick:  function(event, jsEvent, view) {  // when some one click on any event
				            	
						            						
				            }, //FIN eventClick
				            
				            select: function(start, end, jsEvent) {  // click on empty time slot
				              
				              
				         	 }, //FIN eventSelect
				           eventDrop: function(event, delta){ // Evento de eliminar
				           
				           },
				           eventResize: function(event) {  // Arrastrar hacia arriba o hacia abajo el evento
				        
				        	   }
			      	  });//FIN CALENDARIO POR DEFECTO
						 var date = new Date(2017,0,06); 
					    $('#calendar').fullCalendar('gotoDate', date);

					
					}
					
				
		
		 					 		 

		 });
