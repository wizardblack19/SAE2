<div class="col-md-12">
    <div class="card">
	<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
            <h4 class="title">Datos Importantes!</h4>
            <p class="category">Informate de los eventos pendientes y realizados ultimamente!</p>
        </div>
        <div class="card-content table-responsive">
        <div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">date_range</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios sin recibir</p>
									<h3 class="title">20</h3>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
                                <i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios pendientes</p>
									<h3 class="title"> 
										<?php
											$confirmado="false";

											$con = new mysqli("localhost","root", "" , "sishorario");
											$sql = "SELECT count(*) FROM events WHERE confirmado='$confirmado'";
											$cantidad= mysqli_query($con, $sql);

												while ($resultado=mysqli_fetch_array($cantidad)) 
												{
														echo "<p> <b> $resultado[0] </b> </p>";
												}
									
									    ?>
									</h3>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">done</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios aprobados</p>
									<h3 class="title">
											<?php
											$confirmado="true";

											$con = new mysqli("localhost","root", "" , "sishorario");
											$sql = "SELECT count(*) FROM events WHERE confirmado='$confirmado'";
											$cantidad= mysqli_query($con, $sql);

												while ($resultado=mysqli_fetch_array($cantidad)) 
												{
													echo "<p> <b> $resultado[0] </b> </p>";
												}
									
									    ?>			
									</h3>
								</div>
							</div>
						</div>

						
					</div>
        </div>
    </div>
</div>