<?php
include("funciones.php");
//Multi-proceso
//Variable de control Global
	if(isset($_GET['l'])){
		$proceso = $_GET['l'];
	}else{
		$proceso = "";
	}
    $data = array();
	//Procesos
	if($proceso == "upload_file"){
		if (!empty($_FILES)) {
			if(!is_dir("files/"))
		    mkdir("files/", 0777);	
		  	$tempFile = $_FILES['file']['tmp_name']; 
		  	$targetFile = uniqid().$_FILES['file']['name'];
		  	$targetFile = 'files/'.basename(urlencode($targetFile));
		  	move_uploaded_file($tempFile, $targetFile);
		echo $_POST['country'];
		}
		exit;
	}elseif ($proceso == "SaveIndividualCrono") {
	  
    $colMap = array(
	    0 => 'actividad',
	    1 => 'descripcion',
	    2 => 'rubrica',
	    3 => 'pag',
	    4 => 'fecha',
	    5 => 'pts',
	    6 => 'file',
	  );

  if (isset($_POST['changes']) && $_POST['changes']) {

    foreach ($_POST['changes'] as $change) {
      $rowId  = $change[0] + 1;
      $colId  = $change[1];
      $newVal = $change[3];

      if (!isset($colMap[$colId])) {
        echo "\n spadam";
        continue;
      }

      print($rowId.' '.$colId.' '.$newVal.' '.$colMap[$colId]);
      //$select = $db->prepare('SELECT id FROM cars WHERE id=? LIMIT 1');
      //$select->execute();
      



/*
      if ($row = $select->fetch()) {
        $query = $db->prepare('UPDATE cars SET `' . $colMap[$colId] . '` = :newVal WHERE id = :id');
      } else {
        $query = $db->prepare('INSERT INTO cars (id, `' . $colMap[$colId] . '`) VALUES(:id, :newVal)');
      }
      $query->bindValue(':id', $rowId, PDO::PARAM_INT);
      $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
      $query->execute();
  */

    }


  } elseif (isset($_POST['data']) && $_POST['data']) {
    $select = $db->prepare('DELETE FROM cars');
    $select->execute();

    for ($r = 0, $rlen = count($_POST['data']); $r < $rlen; $r++) {
      $rowId = $r + 1;
      for ($c = 0, $clen = count($_POST['data'][$r]); $c < $clen; $c++) {
        if (!isset($colMap[$c])) {
          continue;
        }

        $newVal = $_POST['data'][$r][$c];

        $select = $db->prepare('SELECT id FROM cars WHERE id=? LIMIT 1');
        $select->execute(array(
          $rowId
        ));

        if ($row = $select->fetch()) {
          $query = $db->prepare('UPDATE cars SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
        } else {
          $query = $db->prepare('INSERT INTO cars (id, `' . $colMap[$c] . '`) VALUES(:id, :newVal)');
        }
        $query->bindValue(':id', $rowId, PDO::PARAM_INT);
        $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
        $query->execute();
      }
    }
  }

  $out = array(
    'result' => 'ok'
  );
  echo json_encode($out);







exit;


















	}elseif ($proceso == "login") {

		if(isset($_POST['codigo']) && isset($_POST['pass'])){
			conectar();
        if($datos = db("select codigo,pass,tipo FROM user WHERE codigo = '".$_POST['codigo']."' and pass = '".$_POST['pass']."' LIMIT 0, 1",$mysqli)){
            session_start();
            $_SESSION['codigo']   =   $_POST['codigo'];
            $_SESSION['tipo']     =   $datos[0]['tipo'];
            $data['id']     =   1;
            $data['codigo'] =   $_SESSION['codigo'];
            $data['tipo']   =   $_SESSION['tipo'];
            $data['error']  = "Sin error, acceso correcto.";
            datosG($_SESSION['codigo'], $_SESSION['tipo']);
    			}else{
            $data['id']     =   0;
            $data['error']  =   "Error en codigo o contraseña.";
          }
      cerrar_conex();
      print json_encode($data);
		}else{
			$msg = "Ups, estas intentando hacer trampa, por favor inicia sesión.";
		}
		exit;

	}elseif ($proceso == "logout") {
    salir();
  }

elseif ($proceso == "verarchivos") {
  $codigo = $_POST['codigo'];
  $tabla = "";
  conectar();
  $archivos = db("select * FROM archivos where codocente = '".$codigo."' ",$mysqli);
  $n = 0;
  foreach ($archivos as $archivo) {
    $n++;
    $tabla .= '<tr>
                    <td>{$n}</td>
                    <td>Eugene</td>
                    <td>Kopyov</td>
                    <td>@Kopyov</td>
                  </tr>';
  }

  if($n == 0){
    $tabla = '<tr><td colspan="4">No se encontro ningun archivo.</td></tr>';
  }

  $data['html'] = $tabla;
  $data['no'] = $n;


      print json_encode($data);
  cerrar_conex();
exit;
}

elseif ($proceso == "borrar_archivo") {

    conectar();
      $archivo = db("select archivo FROM archivos where idfile = '".$_POST['id']."' WHERE LIMIT 0,1" ,$mysqli);
  if (unlink($archivo['archivo'])){

     $sql = 'DELETE FROM archivos WHERE idfile = '.$_POST['id'];
     if (mysqli_query($mysqli, $sql)) {
        echo "Record deleted successfully";
     } else {
        echo "Error deleting record: " . mysqli_error($conn);
     }
    cerrar_conex();
  }





      
  print json_encode($data);


 

}
