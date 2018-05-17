<?php
session_start();

if (isset($_SESSION['admin']) || isset($_SESSION['instructor'])) {


?>

		<!DOCTYPE html>
		<html>
		<head>

			<style>
				.nover{

					display: none;
				}
				  input[type="text"]
				  {
				  font-family: "Roboto", sans-serif;
				  outline: 0;
				  background: #f2f2f2;
				  width: 100%;

				  margin: 0 0 10px;
				  height: 38px;
				  padding: 10px;
				  box-sizing: border-box;
				  font-size: 12px;
				    border:1px solid #ddd;
				    border-radius:3px;
				    float:left;
				  }
		

				 input[type="checkbox"]
				 {

				  background: #f2f2f2;
				  width:10%;
				  height:20px;
				    padding: 10px;
				  box-sizing: border-box;
				  font-size: 12px;
				  border:1px solid #ddd;
				  border-radius:3px;
				  float:left;
				  }

				 select
				 {
				  font-family: "Roboto", sans-serif;
				  outline: 0;
				  background: #f2f2f2;
				  width: 50%;
				  margin: 0 0 10px;
				  height: 38px;
				  padding: 10px;
				  box-sizing: border-box;
				  font-size: 12px;
				  border:1px solid #ddd;
				  border-radius:3px;
				  float:left;
				  }

				  .opciones
				  {
				  	float:left; 
				  	margin-left:0%;
				  	border-radius:6px;	
				  	padding-left:10px;
				  }
				  .sinconfirmar
				  {
				  	background:#dd1100;
				  color:#fff;
				   transition:1s;
				  }
				  .confirmados
				  {
				  background:#32C43D;
				  color:#fff;
				   transition:1s;
				  }
				  .porinstructor
				  {
				  	background:#FC5C39;
				  color:#fff;
				   transition:1s;
				  	
				  }
				  .porfichas
				  {

				  	background:#299184;
				  color:#fff;
				   transition:1s;

				  }
				

			</style>

			<script src="js/jquery.min.js"></script>
			<!-- custom scripts --> 
			<!-- bootstrap -->
			<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
			<link  href="css/bootstrap.min.css" rel="stylesheet" >
			<!-- fullcalendar -->
			<link href="css/fullcalendar.css" rel="stylesheet" />
			<link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
			<script src="js/moment.min.js"></script>
			<script src="js/fullcalendar.js"></script>
			<link rel="stylesheet" href="css/alertify.core.css"/>
			<link rel="stylesheet" href="css/alertify.default.css"/>
			<script src="js/alertify.js"></script>
	

	
		</head>
		<body>

		<div class="container">

		 <div class="row FILA">
		<br>
		   <select type="select" class="Regional" id="Regional" name="Regional" required>
		 <OPTION value="" >.::Regional::.</OPTION>
		 							  	<?php
		 										$con = new Mysqli("localhost", "root", "", "sishorario");
		 										$sql="SELECT * FROM tblRegional ORDER BY idRegional";
		 											$proceso = mysqli_query($con, $sql);

		 										while ($regional =mysqli_fetch_object($proceso)) {
		 											?>
		 											<option value="<?php echo $regional->reg_departamento ?>">Regional <?php echo $regional->reg_nombre ?> </option>
													<?php
		 										}
		 									?>
		 							</SELECT>
		 							<SELECT type="select" id="Centro" class="Centro" name="Centro" required>
						 				   <OPTION value="">.::CENTRO::.</OPTION>

						 			</SELECT>
		 							<SELECT type="select" class="Sede" id="Sede" name="Sede" required>
						 				   <OPTION value="">.::SEDE::.</OPTION>

						 				</SELECT>
		   		 <select id="Ambiente" class="Ambiente" name="">
					<option>.::SELECCIONAR AMBIENTE::.</option>

		   		 </select>
	 	</div>
	 	<?php
	 	if(isset($_SESSION['instructor']))
		{
			?>
	 	<div class="row">
			<center><h3><b>HORARIO DEL INSTRUCTOR </b></h3></center>
		</div>
		<?php
		 }
		if(isset($_SESSION['admin']))
		{
			?>
			 	<div class="row">
					  	 <center>
						<h3>
							HORARIO DEL AMBIENTE <p id="TIPOHORARIO"></p></h3>
					</center>		

					<div class="row">

							<div class="opciones col-sm-3 CheckSinConfirmar">
							<label><input type="checkbox" id="CheckSinConfirmar" class="input"> HORARIOS SIN CONFIRMAR</label>
							</div>

							<div class="opciones col-sm-3 CheckConfirmados">
							<label><input type="checkbox" id="CheckConfirmados" class="input"> HORARIOS CONFIRMADOS</label>
							</div>

							<div class="opciones col-sm-3 CheckPorInstructor">
							<label><input type="checkbox" id="CheckPorInstructor" class="input">  HORARIOS POR INSTRUCTOR</label>
							</div>

							<div class="opciones col-sm-3 CheckPorFichas">
							<label><input type="checkbox" id="CheckPorFichas" class="input"> HORARIOS POR FICHAS</label>
							</div>

					</div>
		<hr>
		<?php

	 	}
	 	?>
				
		<div class="row BusquedaPorFicha nover">
			<label class="label-control">SELECCIONAR FICHA</label>
			<select class="form-control" id="SelectFichas"></select><br><br>
			<button class="btn btn-success" id="GenerarHorarioFicha" style="width:100%;margin-top:8px; margin-bottom: 8px">GENERAR HORARIO POR Nro. FICHA </button>
			<hr>
		</div>
		<div class="row BusquedaPorInstructor nover">
			<label class="label-control">SELECCIONAR INSTRUCTOR</label>
			<select class="form-control" id="SelectInstructor"></select>
			<br><br>
			<button class="btn btn-warning" id="GenerarHorarioInstructor" style="width:100%;margin-top:8px; margin-bottom: 8px">GENERAR HORARIO POR INSTRUCTOR </button>
	<hr>
		</div>
		</center>
			
		<div class="row">
			<?php
		if (isset($_SESSION['admin'])) {

			?>
			<input type="hidden" id="hidden" value='<?php echo $_GET['horaInicial']; ?>'>
			<input type="hidden" id="hiddenAmb" value='<?php echo $_GET['ambiente']; ?>'>

			<button type="button" id="btnModal" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalConfiguracion">Trimestres </button>


				<?php
		}	
		?>
					<?php if(isset($_SESSION['instructor']))
		{

		?>
	<button id="ConfigHoras" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalConfiguracionHoras"><b>========> Configurar y Generar Horario <========</b></button>	
	<input type='hidden' id="sesionInstructor" value="<?php echo $_SESSION['instructor']?>">

			<?php
			}
			?>
	<button id="printpdf" class="btn btn-default btn-sm">Imprimir Horarios</button>
	<hr>
		</div>
		
		<div id="calendar">	
		</div>
</div>
		
		<!-- Ventana modal para agregar y eliminar eventos/Horarios -->
		<?php
		include 'modalHorario.php';
		?>
		<script	type="text/javascript" src="js/selects.js"></script>

		<?php


		if (isset($_SESSION['admin'])) {

			?>
				<script type="text/javascript" src="js/horarioAdmin.js">
					
				</script> 
				<script type="text/javascript" src="js/CambiosDeCheck.js"></script>


								<?php
		} // ABRIR Y CERRAR PHP PARA CERRAR EL isset($_SESSION['admin']);
		else
		if (isset($_SESSION['instructor']))
		{
			echo "<input type='hidden' value='".$_SESSION['instructor'] ."' id='sesion'> ";

			?>
			<script type="text/javascript" src="js/horarioInstructor.js"></script> 
			<script src="js/alertify.js"></script>

			<?php
			
		}
		
	      ?>
		
		
		<!--Modal-->
		</body>
		</html>


<?php		

}
else
{
	header("location:login.php");
}





