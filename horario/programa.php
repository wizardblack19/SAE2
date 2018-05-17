<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
	<script type="text/javascript" src="js/programa.js"></script>	
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  PROGRAMAS</h3>
</div>
<div class="card-content table-responsive">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroPrograma">Agregar Programa</a>
<div id="tabla_programa">
	<?php
	include 'funciones/php/TablaPrograma.php';
	?>
</div>
</div>
<div class="card-content table-responsive">
	<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdfProgramas.php">EXPORTAR PDF
	</a>
	<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelProgramas.php">EXPORTAR EXCEL
	</a>
	<a class="btn btn btn-info btn-sm" href="funciones/php/exportarWordProgramas.php">EXPORTAR WORD
	</a>
</div>
</div>
<?php
include 'views/logic/footer.php';
?>
<div>

<div class="modal fade" id="ModalRegistroPrograma" role="dialog">
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
					<label for="TipoFormacion">Tipo Formacion:</label>
					<select name="TipoFormacion" class="form-control" id="TipoFormacion"><option value="Presencial"> Presencial </option></select>
					
				</div>
				<div class="form-group ">
					<label for="Codigo">Codigo de Programa</label>
					<input type="text" class="form-control" id="Codigo">
				</div>
				<div class="form-group ">
					<label for="Nombre">Nombre Programa</label>
					<input type="text" class="form-control" id="Nombre">
				</div>
				<div class="form-group ">
					<label for="Cantidad">Cantidad Aprendicez</label>
					<input type="text" class="form-control" id="Cantidad">
				</div>
				<div class="form-group">
					<button class="btn btn-success" id="AgregarPrograma" data-dismiss="modal">REGISTRAR</button>
					<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
				</div>

		 </div>
		</div>
	</div>
  </div>
  
</div>
</div>