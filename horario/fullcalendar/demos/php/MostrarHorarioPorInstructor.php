<?php
    
    $connection=new mysqli("localhost", "root", "", "sishorario");

            $ins=$_GET['instructor'];
                 
            $amb=  mysqli_real_escape_string($connection,$_GET["ambiente"]);
            $confirmado="true";
            $result = mysqli_query($connection,"SELECT `events`.`id`, `start`, `end`, `title`,`color`  FROM  `events`, `tblambientes`, `tblinstructores` where (`events`.`amb` = $amb AND  `tblambientes`.`idAmbiente` = $amb AND  `tblinstructores`.`ins_nrodocumento` = $ins AND  `events`.`instructor` = $ins AND `events`.`confirmado` ='$confirmado')");

            while($row = mysqli_fetch_assoc($result))
            {   

                $events[] = $row; 
            
            }
             header('Content-Type: application/json');
            echo json_encode($events);
            exit;
   

?>

