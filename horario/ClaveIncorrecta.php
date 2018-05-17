<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SIGHOR</title>
      <link rel="stylesheet" href="css/S-Instructor.css">
     <style>
     .nav-bar{
     	background:#238276;
     }
     .nav-bar li:hover{
     	background:#238276;
     }
     .form {
     	top:50px;
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 50%;
  margin: 0 auto 100px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 50px 0 rgba(0, 0, 0, 0.5), 0 5px 5px 0 rgba(0, 0, 0, 0.35);

}
.form input, select {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 1px solid white;
  margin: 0 0 12px;
  padding: 10px;
  box-sizing: border-box;
  font-size: 10px;

}
     .imagenFondo {
	position:absolute;
	top:20%;
	left:10%;
	width:90%;
	height:80%;
}  .tdImagen{
	
    left:1%;
     	width:10%;
     }
     .tdLetras{
width:50%;

     }
     .iD{

	width:30%;
}
.iD div{
text-align:right;
	left:400px;

}.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #238276;
  width: 100%;
  border: 1px solid white;
  padding: 10px;
  color: #CACACA;
  font-size: 10px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
        border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */
}
.form button:hover,.form button:active,.form button:focus,.form input:hover,.form input:active,.form input:focus,.form select:hover,.form select:active,.form select:focus {
  border:1px solid #CCCCCC;
  background: #39B992;
  color:#fff;
}

     </style>
</head>

 
<body>

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
 				
   

 </header>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <center>
 <nav class="nav-bar">
 
  <div class="nav-hold">
    <div class="nav-logo">
      <a href="index.html">SIGHOR</a>
    </div>
    <div class="nav-menu" id="nav"></div>
		<ul class="nav-items">
      <li><a href="index.html">INICIO</a>
      <li><a href="Aprendiz.html">SOY APRENDIZ</a>
      <li><a href="Instructor.html">SOY INSTRUCTOR</a>
      <li><a href="Admin.html">ADMIN</a>
    </ul>
  </div> 


</nav>

<main id="ContenedorCuerpo">

<form class="form" action="soyadmin.php">
<img src="http://campus.masterd.pt/campusvirtual/assets/images/personalizacion/comunes/lock.png">
<img src="http://www.geolar.com.ar/Images/stop.png">
<h1>¡CLAVE INCORRECTA!</h1>
<button type="submit">
<b><h1><- VOLVER A INTENTARLO</h1></b>
</button>

</form>


</main>
</center>


  
    <script src="js/index.js"></script>
    <div class="footer"><center>Laboratorio ADSI - 1193938, Malambo © 2017</center></div>
</body>
</html>
