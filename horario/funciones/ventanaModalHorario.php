<form method="POST" class="formIns1">
      <div style=" width:100%; position:relative; left:12%">
      <center>
      <a href=""><label style="">Agregar Actividad</b></a></label><br>

      <br>
     <table>
	     <tr>
	
	     <tr>
		     <td style="width:50%">
		    	 <label  style="text-align:right; color:#555; font-size:12px">ACTIVIDAD</label>
		     </td>
		     <td style="width:50%">
		    	
      			<textarea></textarea>
		     </td>
	     </tr>
	     <tr>
		     <td style="width:50%">
		    	 <label  style="text-align:right; color:#555; font-size:12px">INSTRUCTOR</label>
		     </td>
		     <td style="width:50%">
		     	<select>
		     	<option> .::SELECCIONAR INSTRUCTOR::. </option>
		     	<?php
		     	$con = new mysqli("localhost", "root", "", "sishorario");
		     	$sql ="SELECT * FROM tblinstructores";
		     	$proceso = mysqli_query($con, $sql);

		     	while ($ins = mysqli_fetch_object($proceso)) {
		     	?>
		     	<option value="<?php echo $ins->ins_nrodocumento ?>"> <?php echo $ins->ins_nombre ." ". $ins->ins_apellido ?></option>
		     	<?php
		     	}
		     	?>
		     	 </select>
		     </td>
	     </tr>
	     <tr>
		     <td style="width:50%">
		    	 <label  style="text-align:right; color:#555; font-size:12px">NRO DE HORAS</label>
		     </td>
		     <td style="width:50%">
		     	<input type="number" max="24">
		     </td>
	     </tr>
	     </center>
     </table>

     <br>
   <div id="no" class="modal" style="cursor:pointer">ACEPTAR </div>
   </div>

   </form>
	<br> <br>