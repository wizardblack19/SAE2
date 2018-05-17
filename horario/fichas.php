<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
<script type="text/javascript" src="js/ficha.js"></script>	
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="fa fa-tags" aria-hidden="true"></i> FICHAS</h3>

</div>
			
<div class="card-content table-responsive">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroFicha">Agregar Ficha</a>
	<div id="tabla_ficha">
		<?php
	include 'funciones/php/TablaFicha.php';
		?>
	</div>
</div>
<div class="card-content table-responsive">
	<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdfFichas.php">EXPORTAR PDF
	</a>
	<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelFichas.php">EXPORTAR EXCEL
	</a>
	<a class="btn btn-info btn-sm" href="funciones/php/exportarWordFichas.php">EXPORTAR WORD
	</a>
</div>
</div>
<?php
include 'views/logic/footer.php';
?>

<div class="modal fade" id="ModalRegistroFicha" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">X</button>
		<h4 class="modal-title">SIGHO</h4><hr />
		  <div class="card-content">
			
				<div class="form-group ">
					<label for="Regional">Regional:</label>
					<select type="select" name="Regional" class="form-control" id="Regional" required>
								<option value="">.::Regional:.</option>

								 <?php
									 $con = new mysqli("localhost", "root", "", "sishorario");
									 $sql="SELECT * FROM tblRegional ORDER BY idRegional";
									 $proceso = mysqli_query($con, $sql);

									 while ($regional =mysqli_fetch_object($proceso)) {
										 ?>
										 <option value="<?php echo $regional->reg_departamento ?> "> <?php echo $regional->reg_nombre ?> </option>
										<?php
									 }
								 ?>

					 </select>							 
				</div>
				<div class="form-group ">
					<label for="Municipio">Municipio:</label>
					<select name="Municipio" class="form-control" id="Municipio"></select>
				</div>
				<div class="form-group ">
					<label for="Centro">Centro:</label>
					<select name="Centro" class="form-control" id="Centro"></select>
				</div>
				<div class="form-group ">
					<label for="Sede">Sede</label>
					<select name="Sede" class="form-control" id="Sede"></select>
				</div>
					<div class="form-group ">
					<label for="Programa">Programas</label>
					<select name="Programa" class="form-control" id="Programa"></select>
				</div>
					</div>
					<div class="form-group ">
					<label for="Jornada">Jornada</label>
					<select name="Jornada" class="form-control" id="Jornada">
						<option value="Mañana">Mañana</option>
						<option value="Tarde">Tarde</option>
						<option value="Noche">Noche</option>
					</select>
				</div>
				<div class="form-group ">
					<label for="TipoFormacion">Tipo Formacion:</label>
					<select name="TipoFormacion" class="form-control" id="TipoFormacion"><option value="Presencial"> Presencial </option></select>
				</div>
				<div class="form-group ">
					<label for="Instructor">Instructor:</label>
					<select name="Instructor" class="form-control" id="Instructor">
						<?php
						$con = new mysqli("localhost", "root", "", "sishorario");
						$sql= "SELECT*FROM tblInstructores order by ins_nombre";
						$proceso=mysqli_query($con,$sql);

						while($instructor=mysqli_fetch_object($proceso)){
							?>
						<option value='<?php echo $instructor->ins_nrodocumento ?>'> <?php echo $instructor->ins_nombre." ".$instructor->ins_apellido ?></option>

					<?php
						}


						
						?>

					</select>
				</div>
				<div class="form-group ">
					<label for="Numero">Numero de Ficha</label>
					<input type="text" class="form-control" id="Numero">
				</div>
				<div class="form-group ">
					<label for="Cantidad">Cantidad Aprendicez</label>
					<input type="text" class="form-control" id="Cantidad">
				</div>
				<div class="form-group ">
					<label for="FechaInicial">FechaInicial </label>
					<input type="date" class="form-control" id="FechaInicial">
				</div>
					<div class="form-group ">
					<label for="FechaFinal">FechaFinal</label>
					<input type="date" class="form-control" id="FechaFinal">
				</div>

				<div class="form-group">
					<button class="btn btn-success" id="AgregarFicha" data-dismiss="modal">REGISTRAR</button>
					<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
				</div>

		 </div>
		</div>
	</div>
  </div>
  
</div>
</div>