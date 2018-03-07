<?php
	session_start();
    include("includes/conexion.php");
    if ($_FILES) {
	$carpeta = "uploads/";
	$destino = $carpeta . $_SESSION['user_id'] . $_FILES['firstimg']['name'];	
	move_uploaded_file($_FILES['firstimg']['tmp_name'], $destino);
	$destino2 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen1']['name'];
	move_uploaded_file($_FILES['imagen1']['tmp_name'], $destino2);
	$destino3 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen2']['name'];
	move_uploaded_file($_FILES['imagen2']['tmp_name'], $destino3);
	$destino4 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen3']['name'];
	move_uploaded_file($_FILES['imagen3']['tmp_name'], $destino4);
	$destino5 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen4']['name'];
	move_uploaded_file($_FILES['imagen4']['tmp_name'], $destino5);
	$destino6 = $carpeta . $_SESSION['user_id'] . $_FILES['imagen5']['name'];
	move_uploaded_file($_FILES['imagen5']['tmp_name'], $destino6);
    }
    $checkbox = $_REQUEST['services'];
    $checked= '';
    foreach ($checkbox as $check){
    	$cheked .= $check . "!";
    }
    $sql = "INSERT INTO salones (nombre, first_img, imagen1, imagen2, imagen3, imagen4, imagen5, descripcion, domicilio, telefono, capacidad, valor, servicios, servicios_plus, idusuarios, tipo_salon) VALUES ('" . $_REQUEST['title'] . "', '" . $destino . "', '" . $destino2 ."', '" . $destino3 ."', '" . $destino4 ."', '" . $destino5 ."', '" . $destino6 ."', '" . $_REQUEST['description'] . "', '" . $_REQUEST['direction'] . "', '" . $_REQUEST['telephone'] . "', '" . $_REQUEST['capacidad'] . "', '" . $_REQUEST['price'] . "', '" . $cheked . "', '" . $_REQUEST['other_services'] . "', '" . $_SESSION['user_id'] . "', '" . $_REQUEST['salon_tipo'] . "');";
    $rs = mysqli_query($db, $sql);
      header('location: gestor.php');
    
    
    

?>