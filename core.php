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
      $codigo = $_POST['codigo'];
			if(!is_dir("files/"))
		    mkdir("files/", 0777);	
		  	$tempFile = $_FILES['file']['tmp_name']; 
        $namefile = $_FILES['file']['name']; 
		  	$targetFile = basename(urlencode(uniqid().$_FILES['file']['name']));
		  	$saveFile = 'files/'.$targetFile;
		  	if(move_uploaded_file($tempFile, $saveFile)){
          conectar();
            //Guardamos registro en base
            $idfile = uniqid();
            $sql = "INSERT into archivos (idfile, nombre, archivo, codocente) VALUES ('$idfile', '$namefile',  '$targetFile', '$codigo')";
            if(mysqli_query($mysqli, $sql)){
              echo "Se guardo bien";
            }else{
              echo "algo no anda bien ".mysqli_error($mysqli);
            }
          cerrar_conex();
        }else{
          echo "Error al guardar";
        }

		}
		exit;
	}





  elseif ($proceso == "SaveIndividualCrono") {
	  
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
  //Cambios de tabla en funcion archivos
  $codigo = $_POST['codigo'];
    $data['html'] = tabla_archivos($codigo);
    print json_encode($data);
  cerrar_conex();
exit;
}

elseif ($proceso == "borrar_archivo") {

    conectar();
    $archivo = db("select archivo FROM archivos where id = '".$_POST['id']."' LIMIT 0,1" ,$mysqli);
    $nombre_fichero = './files/'.$archivo[0]['archivo'];

  if(file_exists($nombre_fichero)){
    if (unlink($nombre_fichero)){
       $sql = 'DELETE FROM archivos WHERE id = '.$_POST['id'];
       if (mysqli_query($mysqli, $sql)) {
          $data['msg'] = "Record deleted successfully";
       } else {
          $data['msg'] = "Error deleting record: " . mysqli_error($mysqli);
       }
      cerrar_conex();
    }


  }else {
     $data['msg'] = "algo no esta bien el archivo no existe, se borrara registro\n";

       $sql = 'DELETE FROM archivos WHERE id = '.$_POST['id'];
       if (mysqli_query($mysqli, $sql)) {
          $data['msg'] .= "Record deleted successfully";
       } else {
          $data['msg'] .= "Error deleting record: " . mysqli_error($mysqli);
       }

  }








      
  print json_encode($data);


 
exit;
}

elseif($proceso == "ver_DOC"){
  $url = $_POST['url'];
  $data['html'] = verDOC($url);
  print json_encode($data);
exit;
}