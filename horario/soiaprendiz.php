<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHO</title>
      <link rel="stylesheet" href="css/styleaprendiz.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script src="codigojquery.js" > </script>
       <script>
   		 $(function(){
    	    alturamaxima = $('.descripcion').height() + '%';
			
			/*! altura cambio */
    	    alturaMinima = '44px';
    	    
			$('.descripcion').height(alturaMinima);	
    	    $('.contenedor .titulo').toggle( function (){
    	        $(this).prev().animate({height: alturamaxima},1100);
    	    }, function (){
    	        $(this).prev().animate({height: alturaMinima},1100);
			
    	    });
    	});
    </script>

<style type="text/css">
  
.RowTabla td
{
  width: 40%;
border: #ddd     0.8px solid;
}


</style>
</head>


<body >

 <header>
  <table>
		<tr>
	 	 <td class="tdImagen">
	 	 <div>
 				<img src="iconosImagenes/logoSena.png" width="70%" height="70%">
 				</div>
		 </td>
	    <td class="tdLetras">
 				<h3><b>SISTEMA DE GESTION DE HORARIOS</b></h3>
 				   <h4><b>SIGHO</b></h4>
		 </td>
	<td class="iD"> 
		<div>
 		<img src="iconosImagenes/iconoSigho.png" width="28%" height="20%">
 		</div>	

 	</td>
		</tr>

  </table>
 				
   
<hr>
 </header>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<nav class="navMenu" style="font-size:95%;">
 <a href="index.php"><button> <b> HOME</b> </button> </a>
  <a href="soiaprendiz.php"><button> <b> SOY APRENDIZ</b> </button> </a>
   <a href="soiinstructor.php"><button> <b> SOY INSTRUCTOR</b> </button> </a>
    <a href="soiadmin.php"><button> <b> ADMIN</b> </button> </a>
</nav>

<main id="ContenedorCuerpo">

	<img src="iconosimagenes/fondo1.png"  style=" width:60%; height:50%; left:22%; position:fixed ">

	<section>
	
		
	</section>



</main>



  
    <script src="js/index.js"></script>
    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center></div>
</body>

<?php
 
?>

</html>
