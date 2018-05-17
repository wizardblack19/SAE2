
<?php
include 'views/logic/sidebar.php';
?>
<?php
include 'views/logic/navbar.php';
?>
	<?php 		
		if(!isset($_SESSION['admin']) && !isset($_SESSION['instructor']))
		{
			header("location: login.php");
		}
	?>

<style> 
.nover{
	display:none;
}
</style>
<div class="card ver">

	<?php  if(isset($_SESSION['admin'])): ?>

	<div class="card-header" data-background-color="green-dark">
		 <h3 class="title">HORARIO</h3>
	    <p class="category">Servicio Nacional de Aprendizaje - SENA </p>
	</div>
	<div class="card-content" style="display:block">

		<div class="iframe-container">
			<iframe src="fullcalendar/demos/index.php" style="width:100%; height:1000px">lol </iframe>			
		</div>
	</div>
</div>
	<?php  endif; ?>



	
	<?php

	if (isset($_GET['horaInicial']) && isset($_GET['ambiente'])) {
		$hora= $_GET['horaInicial'];
		$amb=$_GET['ambiente'];
	?>
	<input type="hidden" value="<?php echo $amb ?>" id="PruebaID">
<div class="card">
			<div class="card-header" data-background-color="green-dark">
		 <h3 class="title">HORARIO</h3>
	    <p class="category">Servicio Nacional de Aprendizaje - SENA </p>
	</div>
	<div class="card-content">

		<div class="iframe-container">
			<iframe src="fullcalendar/demos/index.php?horaInicial=<?php echo $hora ?>&ambiente=<?php echo $amb ?>" style="width:100%; height:1000px">lol </iframe>			
		</div>
	</div>
</div>
<?php
 }
?>


<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">

 <h3 class="title">HORARIO</h3>
                      <p class="category">Servicio Nacional de Aprendizaje - SENA </p>
                        </div>
                        <div class="card-content">
							<div class="iframe-container">
									<iframe src='fullcalendar/demos/index.php' style="width:100%; height:1000px">lol </iframe>
								
							</div>
                    	</div>
                	</div>
<?php  endif; ?>
	                          
<?php
include 'views/logic/footer.php';
?>
	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	$("#calendar").addClass("active");

var PruebaID = $('#PruebaID').val();

if (PruebaID>0) {


	$('.ver').addClass('nover');

}

    	});
	</script>


	