<?php
    
    $connection=new mysqli("localhost", "root", "", "sishorario");

            $ficha=$_GET['ficha'];         
      
           $confirmado='true';
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblfichas` where ( `tblfichas`.`fic_nroficha` = '$ficha' AND  `events`.`ficha` = '$ficha' AND `events`.`confirmado` ='$confirmado')");

            if(mysqli_num_rows($result)>0)
            {

                while($row = mysqli_fetch_assoc($result))
                    {   

                        $events[] = $row; 
                    
                    }
                     header('Content-Type: application/json');
                    echo json_encode($events);
                   exit;         

            }
            else
            {
                    $mensaje=1;

                    $datos[] = array('mensajeError' => $mensaje);

                    header('Content-Type: application/json');
                    echo json_encode($datos, JSON_FORCE_OBJECT);

                    return false;

            }

?>

