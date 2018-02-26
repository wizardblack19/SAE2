<?php
ob_start();
?>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Table components -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Lista de Cursos</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">Mis Cursos</div>

					<div class="table">

						<p>No tiene cursos asignados.</p>

						<!--
						<table class="table table-bordered table-lg">
							<tbody>
		
								<tr>
									<td width="10%">Label</td>
									<td>Basic Bootstrap <code>label</code>. </td>
									<td width="10%"><span class="label label-danger">In progress</span></td>

								</tr>
							</tbody>
						</table>
					-->

					</div>
				</div>
				<!-- /table components -->

			</div>
			<!-- /main content -->

<?php 
$page = ob_get_contents();  // stores buffer contents to the variable
ob_end_clean();
include("index.php");