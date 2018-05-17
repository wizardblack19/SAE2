

 <select type="select" class="Regional" id="Regional" name="Regional" required>
 <OPTION value="" >.::Regional::.</OPTION>
 							  	<?php
 										$con = new Mysqli("localhost", "root", "", "sishorario");
 										$sql="SELECT * FROM tblRegional ORDER BY idRegional";
 										$proceso = mysqli_query($con, $sql);

 										while ($regional =mysqli_fetch_object($proceso)) {
 											?>
 											<option value="<?php echo $regional->reg_departamento ?> ">Regional <?php echo $regional->reg_nombre ?> </option>
											<?php
 										}
 									?>
 							</SELECT>
 							<SELECT type="select" id="Centro" class="Centro" name="Centro" required>
				 				   <OPTION value="">.::CENTRO::.</OPTION>

				 			</SELECT>
 							<SELECT type="select" class="Sede" id="Sede" name="Sede" required>
				 				   <OPTION value="">.::SEDE::.</OPTION>

				 				</SELECT>
   		 <select id="Ambiente" class="Ambiente" name="">
			<option>.::SELECCIONAR AMBIENTE::.</option>

   		 </select>


  