<?php
ob_start();
?>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Dropdown type -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Nuevo Cronograma de Tareas</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<p class="content-group msg"></p>
						<p id="example1console"></p>

						<div class="hot-container bloqueo" >
							<div id="cronograma"></div>



						</div>


							

					</div>

					<div class="panel-footer bloqueo">
						<div class="heading-elements">
							<ul class="heading-thumbnails pull-right">
								<li><label><input type="checkbox" name="autosave" checked="checked" autocomplete="off"> Guardado Automatico</label></li>
								<li><button name="load" type="button" class="btn btn-default btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Cancelar</span></button></li>
								<li><button name="save" type="button" class="btn btn-primary btn-ladda btn-ladda-progress" data-style="zoom-in"><span class="ladda-label">Guardar</span></button></li>
							</ul>
						</div>

							</div>

				</div>
				<!-- /dropdown type -->				

				<div class="panel panel-flat bloqueo">
					<div class="panel-heading">
						<h5 class="panel-title">Adjuntar Archivos</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<p class="content-group">
							Puede adjuntar archivos que se agregarán a su biblioteca personal, tenga en cuenta que debe actualizar la pagina para observar los ultimos cambios.
						</p>
						<p>
							Puede arrastrar y colocar sus archivos, tamaño maximo de archivo 5M.
						</p>

						<div class="hot-container " >
							
							<form action="core.php?l=upload_file" class="dropzone" id="files_multiple">
								<input type="hidden" name="country" value="Norway" />
							</form>


						</div>
					</div>
				</div>


			</div>
			<!-- /main content -->
<?php 
$page = ob_get_contents();  // stores buffer contents to the variable
ob_end_clean();
include("index.php");