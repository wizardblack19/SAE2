<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
<script type="text/javascript" src="js/instructor.js"></script>
<div class="card">
<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
	<h3 class="title"><i class="material-icons" aria-hidden="true">contact_mail</i> INSTRUCTORES </h3>

</div>
			
<div class="card-content table-responsive">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalRegistroInstructor">Agregar Instructor</a>

	<div id="tabla_instructor">
	<?php
	include 'funciones/php/TablaInstructor.php';
	?>
	</div>
</div>
<div class="card-content table-responsive">
	<a class="btn btn-danger btn-sm" href="funciones/php/exportarpdf.php">EXPORTAR PDF
	</a>
	<a class="btn btn-success btn-sm" href="funciones/php/exportarExcelinstructor.php">EXPORTAR EXCEL
	</a>
	<a class="btn btn btn-info btn-sm" href="funciones/php/exportarwordinstructor.php">EXPORTAR WORD
	</a>
</div>
</div>
<?php
include 'views/logic/footer.php';
?>


<div class="modal fade" id="ModalRegistroInstructor" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">X</button>
		<h4 class="modal-title">SIGHO</h4><hr />
		  <div class="card-content">

		
				<div class="form-group ">
					<label for="Nombre">Nombre:</label>
					<input name="Nombre" class="form-control" id="Nombre"></select>
				</div>
				<div class="form-group ">
					<label for="Nombre2">SegundoNombre:</label>
					<input name="Nombre2" class="form-control" id="Nombre2"></select>
				</div>
				<div class="form-group ">
					<label for="Apellido">Apellido</label>
					<input name="Apellido" class="form-control" id="Apellido"></select>
				</div>
					<div class="form-group ">
					<label for="Apellido2">Segundo Apellido</label>
					<input name="Apellido2" class="form-control" id="Apellido2"></select>
				</div>
				<div class="form-group ">
					<label for="TipoDoc">Tipo Documento:</label>
					<select name="TipoDoc" class="form-control" id="TipoDoc">
						<option value="CC">CC</option>
						<option value="TI">TI</option>
					</select>
				</div>
				<div class="form-group ">
					<label for="Documento">Numero Documento</label>
					<input type="text" class="form-control" id="Documento">
				</div>
					<div class="form-group ">
				<SELECT type="select" name="TipoInstructor" id="TipoIns" class="form-control">
				 		   <OPTION value="">.::TIPO INSTRUCTOR::.</OPTION>
				 		   <OPTION value="Fuera de sede">FUERA DE SEDE</OPTION>
				 		   <OPTION value="Desplazado">DESPLAZADO</OPTION>
				 		   <OPTION value="Articulacion">ARTICULACION</OPTION>
				 		</SELECT>
				</div>
				<div class="form-group ">
					<label for="Genero">Genero</label>
					<input type="text" class="form-control" id="Genero">
				</div>
				<div class="form-group ">
					<label for="Direccion">Direccion</label>
					<input type="text" class="form-control" id="Direccion">
				</div>
				<div class="form-group ">
					<label for="Telefono">Telefono</label>
					<input type="text" class="form-control" id="Telefono">
				</div>
				<div class="form-group ">
					<label for="Profesion">Profesion</label>
					<input type="text" class="form-control" id="Profesion">
				</div>
				<div class="form-group ">
					<label for="Email">Email</label>
					<input type="text" class="form-control" id="Email">
				</div>
				
				
				<div class="form-group">
					<button class="btn btn-success" id="AgregarInstructor" data-dismiss="modal">REGISTRAR</button>
					<button class="btn btn-warning"  data-dismiss="modal">CANCELAR</button>
				</div>

		 </div>
		</div>
	</div>
  </div>
  
</div>
</div>