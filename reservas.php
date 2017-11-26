<?php
    include("includes/conexion.php");
    $dia = $_REQUEST['dia_res'];
    $horario = $_REQUEST['horario_res'];
    $comentario = $_REQUEST['comentario_res'] . " Mi email es " . $_REQUEST['user_email'];
    $estado = $_REQUEST['estado'];
    $idsalon = $_REQUEST['id_salon'];
    $iduser = $_REQUEST['id_user'];
    
    if ($iduser == ''){
        header ('Location: salon.php?id=' . $idsalon . '&log=false');
    }
    
    else{
        
        $sql= "INSERT INTO turnos(dia, turno, comentario, estado, idusuarios, idsalones) VALUES ('" . $dia . "', '" . $horario . "', '" . $comentario . "', '" . $estado . "', '" . $iduser . "', '" . $idsalon ."' );";
        $rs = mysqli_query($db, $sql);
        if ($rs){
            header ('Location: salon.php?id=' . $idsalon );
        }
    }
    // tirar un turno reservado...
?>