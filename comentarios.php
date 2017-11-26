<?php
    include('includes/conexion.php');
    
   
    $rating = $_REQUEST['rating'];
    $comentario = $_REQUEST['comment'];
    $id_user = $_REQUEST['id_user'];
    $id_salon = $_REQUEST['id_salon'];
     if ($id_user == ''){
        header('Location: salon.php?id=52&comment=false');
    }
    else{
        $con_rating = "SELECT calificacion FROM feedback WHERE idsalones = '$id_salon' AND calificacion IS NOT NULL ;";
        echo $con_rating;
        $rs_rating = mysqli_query($db, $con_rating);
        $r = mysqli_fetch_array($rs_rating);
        echo $r['calificacion'];
        if($r['calificacion']){
            $calificacion = $r['calificacion'];
            if ($rating !=''){
                $cal_nueva = ($calificacion + $rating) / 2;
                $upd_cal = mysqli_query($db, "UPDATE feedback SET calificacion = '$cal_nueva' WHERE idsalones = '$id_salon' AND calificacion IS NOT NULL ;");
                header('location: salon.php?id=' . $id_salon . '&rate=true');
            }
        }
        if ($r['calificacion'] == ''){
            $add_rating = mysqli_query($db, "INSERT INTO  feedback(calificacion, idsalones) VALUES ('$rating', '$id_salon');");
            header('location: salon.php?id=' . $id_salon . '&rate=true');
        }
        
        if ($comentario != ''){
            $sql="INSERT INTO  feedback(comentarios, idusuarios, idsalones) VALUES ('$comentario', '$id_user', '$id_salon');";
            $rs = mysqli_query($db, $sql);
            header('Location: salon.php?id=' . $id_salon . '&comment=true');
        }
        
    }
?>




