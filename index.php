<?php
	include("includes/header.php");
?>
        <main>
            <?php
	                if ($_REQUEST['e']=="true"){
	               	echo "<p class='text-center font-weight-bold mx-auto'> Ese email ya existe </p>";
	                }
	                elseif ($_REQUEST['r'] == "true"){
	                    echo "<p class='text-center font-weight-bold mx-auto'> Registrado con exito </p>";
	                }
	        ?>
            <article>
                <p class="web-description">Encuentra los mejores salones y servicios para tu evento</p>
                <p class="web-description mb-5">Haz tu reserva online y al instante</p>
            </article>
            <?php
                $r_salon= $_REQUEST['salon'];
                $r_capacidad = $_REQUEST['capacidad'];
                $r_valor= $_REQUEST['valor'];
                $r_calificacion= $_REQUEST['calificacion'];
                $r_turno= $_REQUEST['turno'];
                $r_nombre= $_REQUEST['filter-nombre'];
                
                switch ($r_calificacion[0]) {
                    case '1':
                        $r_calificacion[0] = "4, 4.1, 4.2, 4.3, 4.4, 4.5, 4.6, 4.7, 4.8, 4.9, 5";
                        break;
                    case '2':
                        $r_calificacion[0] = "2.5, 2.6, 2.7, 2.8, 2.9, 3, 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9";
                        break;
                    case '3':
                        $r_calificacion[0] = "0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2, 2.1, 2.2, 2.3, 2.4";
                        break;
                }
                switch ($r_calificacion[1]) {
                    case '1':
                        $r_calificacion[1] = "4, 4.1, 4.2, 4.3, 4.4, 4.5, 4.6, 4.7, 4.8, 4.9, 5";
                        break;
                    case '2':
                        $r_calificacion[1] = "2.5, 2.6, 2.7, 2.8, 2.9, 3, 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9";
                        break;
                    case '3':
                        $r_calificacion[1] = "0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2, 2.1, 2.2, 2.3, 2.4";
                        break;
                }
                switch ($r_calificacion[2]) {
                    case '1':
                        $r_calificacion[2] = "4, 4.1, 4.2, 4.3, 4.4, 4.5, 4.6, 4.7, 4.8, 4.9, 5";
                        break;
                    case '2':
                        $r_calificacion[2] = "2.5, 2.6, 2.7, 2.8, 2.9, 3, 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9";
                        break;
                    case '3':
                        $r_calificacion[2] = "0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2, 2.1, 2.2, 2.3, 2.4";
                        break;
                }
                
                if ($r_salon){
                    $r_salon2= implode ($r_salon, ',');
                }
                if ($r_capacidad){
                    $r_capacidad2= implode ($r_capacidad, ',');
                }
                if ($r_calificacion){
                    $r_calificacion2= implode ($r_calificacion, ', ');
                }
                if ($r_salon !=''){
                     $salon_sql = " AND tipo_salon in($r_salon2) ";
                 }
                if ($r_capacidad!=''){
                     $capacidad_sql = " AND capacidad in($r_capacidad2) ";
                }
                if ($r_calificacion!=''){
                     $calificacion_sql = " AND idsalones IN (SELECT idsalones FROM feedback WHERE 1=1 AND calificacion in($r_calificacion2)) ";
                }
                if ($r_valor!=''){
                     $valor_sql = " AND valor in($r_valor) ";
                }
                if ($r_turno !=''){
                     $turno_sql = " AND valor in($r_turno) ";
                }
                if ($r_nombre !=''){
                     $nombre_sql = " AND valor in($r_nombre) ";
                }
                if ($r_salon || $r_capacidad || $r_valor || $r_calificacion){
                    $sql= "SELECT idsalones, nombre, capacidad, domicilio, telefono, valor, first_img FROM salones WHERE 1=1 $salon_sql $capacidad_sql  $valor_sql $turno_sql $nombre_sql $calificacion_sql;";
                    $rs = mysqli_query ($db, $sql);
                    $data = array(); 
                    while($row = mysqli_fetch_array($rs)){
                        $data[] = $row;
                    }
                }
                else{
                    $sql= "SELECT idsalones, nombre, capacidad, domicilio, telefono, valor, first_img FROM salones WHERE 1=1 ;";
                    $rs = mysqli_query($db, $sql);
                    $data = array(); 
                    while($row = mysqli_fetch_array($rs)){
                        $data[] = $row;
                    }
                    
                }
                $all_id = array_column($data, 0);
                $all_nombre= array_column ($data, 1);
                $all_capacidad= array_column ($data, 2);
                $all_domicilio= array_column ($data, 3);
                $all_telefono= array_column ($data, 4);
                $all_valor= array_column ($data, 5);
                $all_imagen= array_column ($data, 6);
                $results= count($all_id);
            ?>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-inline-flex">
                    <form method="get" action="index.php">
                        <p class="filter-title">Tipo de salones</p>
                        <div class="d-block">
                            <input type="checkbox" name="salon[]" value="1">
                            <label class="filter-opt" for="salon" >Salon de Fiestas</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="salon[]" value="2">
                            <label class="filter-opt" for="salon">Salon infantil</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="salon[]" value="3">
                            <label class="filter-opt" for="salon">Quincho</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="salon[]" value="4">
                            <label class="filter-opt" for="salon">Hotel</label>
                        </div>
                        <p class="filter-title">Capacidad</p>
                        <div class="d-block">
                            <input type="checkbox" name="capacidad[]" value="1">
                            <label class="filter-opt" for="capacidad">Mas de 300</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="capacidad[]" value="2">
                            <label class="filter-opt" for="capacidad">Entre 200 y 300</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="capacidad[]" value="3">
                            <label class="filter-opt" for="capacidad">Entre 100 y 200</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="capacidad[]" value="4">
                            <label class="filter-opt" for="capacidad">Entre 50 y 100</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="capacidad[]" value="5">
                            <label class="filter-opt" for="capacidad">Menos de 50</label>
                        </div>
                        <p class="filter-title">Rango de precio</p> 
                        <div class="d-block">
                            <input type="checkbox" name="valor[]" value="1">
                            <label class="filter-opt" for="valor">Mas de $8.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor[]" value="2">
                            <label class="filter-opt" for="valor">Entre $5.000-$8.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor[]" value="3">
                            <label class="filter-opt" for="valor">Entre $3.000-$5.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor[]" value="4">
                            <label class="filter-opt" for="valor">Menos de $3.000</label>
                        </div>
                        <p class="filter-title">Calificacion</p>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion[]" value="1">
                            <label class="filter-opt" for="calificacion">De 8 a 10</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion[]" value="2">
                            <label class="filter-opt" for="calificacion">De 5 a 8</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion[]" value="3">
                            <label class="filter-opt" for="calificacion">Menor a 5</label> 
                        </div>
                        <p class="filter-title">Turno</p>
                        <div class="d-flex flex-row justify-content-around">
                            <div class="d-block">
                                <input type="checkbox" name="turno" value="1">
                                <label class="filter-opt" for="turno">Mañana</label>
                            </div>
                            <div class="d-block">
                                <input type="checkbox"  name="turno" value="2">
                                <label class="filter-opt" for="turno">Tarde</label>
                            </div>
                            <div class="d-block">
                                <input type="checkbox" name="turno" value="3">
                                <label class="filter-opt" for="turno">Noche</label> 
                            </div>
                        </div>
                        <p class="filter-title">Fecha</p>
                        <div class="d-block">
                            <label class="filter-opt" for="from-date">Desde</label>
                            <input type="date" class="w-75" name="from-date">
                        </div>
                        <div class="d-block">
                            <label class="filter-opt" for="to-date">Hasta</label>
                            <input type="date" class="w-75" name="to-date">
                        </div>
                        <div class="d-block">
                            <input type="text" name="filter-nombre">
                            <label class="filter-opt"for="filter-nombre">Buscar por nombre</label>
                        </div>
                        <input type="reset" class=" float-right w-50" value="Borrar">
                        <input type="submit" class=" float-left w-50" value="Buscar">                        
                    </form>   
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-7">
                            <h2>Resultados</h2>
                        </div>
                        <div class="col-5">
                            <select class="mdb-select float-right">
                                <option value="" disabled selected>Ordenar por:</option>
                                <option value="1">Precio</option>
                                <option value="2">Capacidad</option>
                                <option value="3">calificacion</option>
                                <option value="4">Nombre</option>
                            </select>
                        </div>
                    </div>
                    <?php
                        for ($i = 0; $i < $results; $i++) {
                            $id = $all_id[$i];
                            $nombre = $all_nombre[$i];
                            $capacidad = $all_capacidad[$i];
                            $domicilio = $all_domicilio[$i];
                            $telefono= $all_telefono[$i];
                            $valor= $all_valor[$i];
                            $imagen= $all_imagen[$i];
                            
                            $sql_cal= "SELECT calificacion FROM feedback WHERE idsalones = '" . $all_id[$i] . "' AND calificacion IS NOT NULL ;";
                            $rs_cal = mysqli_query($db, $sql_cal);
                            $row = mysqli_fetch_array($rs_cal);
                            $calificacion = $row['calificacion'];
                    ?>
                    <div class="row">
                        <div class="col result-col justify-content-center">
                            <a href="salon.php?id=<?php echo $id; ?>"><img src="<?php
                            echo $imagen;
                            ?>" class="result-img w-100"></a>
                        </div>
                        <div class="col result-col">
                            <a href="salon.php?id<?php echo $id; ?>"><h3 class="result-heading"><?php echo $nombre; ?></h3></a>
                            <p class="result-p"><?php echo $domicilio; ?></p>
                            <p class="result-p">tel: <?php echo $telefono; ?></p>
                            <p class="result-p">1° fecha disponible</p>
                        </div>
                        <div class="result-col">
                            <p class="mt-5"><?php 
                            switch ($valor) {
                                case '1':
                                    echo "Mas de $8000";
                                    break;
                                case '2':
                                    echo "Entre $5000-$8000";
                                    break;
                                case '3':
                                    echo "Entre $3000-$5000";
                                    break;
                                case '4':
                                    echo "Menos de $3000";
                                    break;
                            }
                             ?></p>
                            <div class="d-inline-flex w-100">
                                <i class="fa fa-group"></i>
                                <p class="ml-2"><?php
                                switch ($capacidad) {
                                case '1':
                                    echo "Mas de 300";
                                    break;
                                case '2':
                                    echo "Entre 200 y 300";
                                    break;
                                case '3':
                                    echo "Entre 100 y 200";
                                    break;
                                case '4':
                                    echo "Entre 50 y 100";
                                    break;
                                case '5':
                                    echo "Menos de 50";
                                    break;
                            } ?></p>
                            </div>
                            <div class='rateYo' data-rate= '<?php
                            if ($calificacion != ''){
                            echo $calificacion;
                            }
                            else{
                                echo 0;
                            }
                            ?>' >
                            </div>
                            <a href="salon.php?id=<?php echo $id; ?>"><p class="result-info">mas info</p></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>        
            </div>
            <div class="my-4 d-none d-lg-flex mx-auto pagination">
                <ul class="pagination pagination-circle pg-dark mb-0">
                    <li class="page-item disabled"><a class="page-link">First</a></li>
                    <li class="page-item disabled">
                        <a class="page-link">
                            <span>&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link">4</a></li>
                    <li class="page-item"><a class="page-link">5</a></li>
                    <li class="page-item">
                        <a class="page-link">
                            <span>&raquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link">Last</a></li>
                </ul>
            </div>
        </main>
    </div>
        <footer class="page-footer center-on-small-only stylish-color-dark">
            <div class="social-section text-center">
                <ul>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-facebook rounded-circle"> </i></a></li>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-twitter rounded-circle"> </i></a></li>
                    <li><a class="btn-floating btn-sm"><i class="fa fa-google-plus rounded-circle"></i></a></li>
                </ul>
            </div>
                <div class="container-fluid text-center">
                    &copy 2017 Salon Manager
                </div>
            </div>        
        </footer>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/myjs.js"></script>
        <script type="text/javascript" src="js/jquery.rateyo.min.js"></script>
</body>
</html>