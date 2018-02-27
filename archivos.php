<?php
ob_start();
?>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Table components -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Manejar Archivos</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<h6 class="content-group text-semibold">Sube archivos a sistema.
							<small class="display-block">Todos los archivos subidos guardan el nombre que contiene el mismo, puede cambiar estos nombres despues de haberlos subidos.</small></h6>

						<div class="panel-group accordion-sortable content-group-lg" id="accordion-controls">
		
							<div class="panel panel-white">
								<div class="panel-heading">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-controls" href="#accordion-controls-group3">Cargar Archivos</a>
									</h6>

									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
								<div id="accordion-controls-group3" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="hot-container " >
											
											<form action="core.php?l=upload_file" class="dropzone" id="files_multiple">
												<input type="hidden" name="country" value="Norway" />
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /table components -->


				<!-- Bordered panel body table -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Archivos en Sistema</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a codigo="<?php echo $perfil['codigo'];?>" source="list_archivos" data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<p class="content-group">Edite, actualice o elimine sus archivos.</p>

						<div class="table-responsive">
							<table class="table table-bordered table-framed">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th>Título de Archivo</th>
										<th>Last Name</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Eugene</td>
										<td>Kopyov</td>
										<td>@Kopyov</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /bordered panel body table -->


			</div>
			<!-- /main content -->

<?php 
$page = ob_get_contents();  // stores buffer contents to the variable
ob_end_clean();
include("index.php");