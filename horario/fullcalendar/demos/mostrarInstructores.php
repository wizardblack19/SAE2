  <?php 
              $con=new mysqli("localhost", "root","","sishorario");
              $sql = "SELECT ins_nrodocumento, ins_nombre, ins_apellido FROM tblinstructores";

              $proceso=mysqli_query($con, $sql);
              echo "<option value='0'> ..SELECCIONAR INSTRUCTOR::.</option> ";
              while ($instructor=mysqli_fetch_object($proceso)) {
           ?> 
           <option value='<?php echo $instructor->ins_nrodocumento ?>'><?php echo $instructor->ins_nombre." ".$instructor->ins_apellido ?></option>

             <?php
                 }
             ?>



             