<?php
	include("includes/header.php");
	$salon_id = $_REQUEST['id'];
	$sql = "SELECT * FROM salones WHERE idsalones= '" . $salon_id . "';";
	$rs = mysqli_query ($db, $sql);
	$r = mysqli_fetch_array($rs);
	$nombre= $r['nombre'];
	$capacidad = $r['capacidad'];
	$descripcion = $r['descripcion'];
	$domicilio = $r['domicilio'];
	$telefono = $r['telefono'];
	$valor = $r['valor'];
	$first_img = $r['first_img'];
	$imagen1 = $r['imagen1'];
	$imagen2 = $r['imagen2'];
	$imagen3 = $r['imagen3'];
	$imagen4 = $r['imagen4'];
	$imagen5 = $r['imagen5'];
	$servicios = $r['servicios'];
	$servicios_plus = $r['servicios_plus'];
	
?>
        <main>
            <div class="row">
                <?php   
                if ($_REQUEST['comment'] == "false"){
                    echo "<p class='log-msg'> Debe ingresar a su cuenta para poder comentar.</p>";
                }
                if ($_REQUEST['comment'] == "true"){
                    echo "<p class='log-msg'>Muchas gracias por darnos tu opinion de este salon.</p>";
                }
                if ($_REQUEST['rate'] == "true"){
                    echo "<p class='log-msg'>Muchas gracias calificar este salon.</p>";
                }
                if ($_REQUEST['log'] == "false"){
                    echo "<p class='log-msg'> Debe ingresar a su cuenta para poder reservar un turno.</p>";
                }
                ?>
                <div class="col-12 d-flex d-inline-flex">
                    <a href="#"><p class="return text-center z-depth-1-half" onclick="history.go(-1);">Volver a mi busqueda</p></a>
                    <h4 class="w-75 ml-lg-5 text-center salon-header"><?php echo $nombre; ?></h4>
                </div>
                <div class="col-12 col-lg-4">
                    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-interval="false" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                            <?php
                            if($imagen1){
                                echo "<li data-target='#carousel-example-1z' data-slide-to='1'></li>";
                            }
                            if($imagen2){
                                echo "<li data-target='#carousel-example-1z' data-slide-to='2'></li>";
                            }
                            if($imagen3){
                                echo "<li data-target='#carousel-example-1z' data-slide-to='3'></li>";
                            }
                            if($imagen4){
                                echo "<li data-target='#carousel-example-1z' data-slide-to='4'></li>";
                            }
                            if($imagen5){
                                echo "<li data-target='#carousel-example-1z' data-slide-to='5'></li>";
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo $first_img; ?>">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $imagen1; ?>">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $imagen2; ?>">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $imagen3; ?>">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $imagen4; ?>">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo $imagen5; ?>">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="salon-description">
                        <p><?php echo $descripcion; ?></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="salon-data w-100 mt-3 d-inline-flex justify-content-around flex-wrap">
                        <p>Valor: <?php
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
                        <div class="d-inline-flex">
                            <p>Capacidad:</p>
                            <p class="ml-1"><?php
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
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="d-inline-flex">
                            <p>Calificación: </p>
                            <div id="rateYo1">
                                <!-- star rating -->
                            </div>
                        </div>
                        <div class="d-inline-flex">
                            <p class="mr-5"><?php echo $domicilio; ?></p>
                            <p>telefono: <?php echo $telefono; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="salon-header text-center">Servicios</h4>
                    <div class="d-flex flex-column flex-wrap salon-services">
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '1!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico pelotero"></div><p>Pelotero estructural</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!2!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?> ">
                            <div class="salon-ico inflable "></div><p>Inflables</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!3!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico futbol "></div><p>Cancha de Futbol</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!4!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico basquet"></div><p>Chancha de basquet</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!5!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico juegos"></div><p>Video juegos</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!6!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico escalada"></div><p>Pared escaladora</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!7!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico plaza"></div><p>Plaza blanda</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!8!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico metegol"></div><p>metegol</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!9!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico bungee"></div><p>Bungee Jump</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!10!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico tirolesa"></div><p>Tirolesa</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!11!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico elastica"></div><p>Cama elastica</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!12!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico tobogan"></div><p>Tobogan</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!13!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico tejo"></div><p>Mesa de tejo</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!14!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico spa"></div><p>Spa de nenas</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!15!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico invitacion"></div><p>Invitaciones</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!16!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico karaoke"></div><p>Karaoke</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!17!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico baile"></div><p>Pista de Baile</p>
                        </div>                        
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!18!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico led"></div><p>Luces LED</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!19!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico proyector"></div><p>Proyector</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!20!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico cotillon"></div><p>Cotillon</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!21!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico animador"></div><p>Animador</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!22!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico camareros"></div><p>Camareros</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!23!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico dj"></div><p>Disc Jockey</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!24!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico foto"></div><p>Fotografo</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!25!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico cocina"></div><p>Cocina</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!26!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico vajilla"></div><p>Vajilla</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!27!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico catering"></div><p>Catering</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!28!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico aire"></div><p>Aire Acondicionado</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!29!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico wifi"></div><p>Wifi</p>
                        </div>
                        <div class="d-inline-flex <?php
                        $pos = strpos($servicios, '!30!');
                        if ($pos==false){ echo "opacity-5"; }
                        ?>">
                            <div class="salon-ico medico"></div><p>Servicio Medico</p>
                        </div>
                    </div>
                    <div class="salon-extra">
                        <p>Otros servicios: </p>
                        <p><?php echo $servicios_plus; ?></p>
                    </div>
                </div>
            </div>
            <?php
            $reservas1=mysqli_query ($db, "SELECT dia, turno FROM turnos WHERE idsalones = '" . $_REQUEST['id'] . "' ;");
            $data1 = array(); 
            while($row = mysqli_fetch_array($reservas1)){
                $data1[] = $row;
            }
            $fecha= ["2017-11-04", "2017-11-05", "2017-11-06", "2017-11-07", "2017-11-08", "2017-11-09"];
            $dia = ["Lunes 1", "martes 2", "Miercoles 3", "Jueves 4", "Viernes 5", "Sabado 6"];
            ?>
            <div class="row">
                <div class="col-12">
                    <h4 class="salon-header text-center">Reserve su turno </h4>
                    <div class="d-inline-flex justify-content-center w-100 ">
                        <i class="fa fa-chevron-left calendar"></i>
                        <i class="fa fa-calendar calendar"></i>
                        <i class="fa fa-chevron-right calendar"></i>
                    </div>
                    <div class="row justify-content-between">
                        <?php
                        for ($i = 0; $i < 6; $i++) {
                            echo '<div class=" col-6 col-sm-3 col-md-2">
                                <p class="text-center font-weight-bold">' . $dia[$i] .'</p>
                            <ul class="salon-reservation">
                                <li class="list ';
                                
                                $dt = ' data-toggle="modal" ';
                                foreach ($data1 as $k => $v){
                                    if ($fecha[$i]==$data1[$k][0] && 1==$data1[$k][1] ) {
                                        echo "taken";
                                        $dt = "";
                                    }
                                    
                                }
                            
                            echo '" ' . $dt .  ' data-target="#myModal" data-day="' . $fecha[$i] . '" data-turn="1" >8:00 a 11:00</li>
                                <li class="list ';
                                
                                $dt = ' data-toggle="modal" ';
                                foreach ($data1 as $k => $v){
                                    if ($fecha[$i]==$data1[$k][0] && 2==$data1[$k][1] ){
                                        echo "taken";
                                        $dt = "";
                                    } 
                                    
                                }
                            
                            
                            echo '" ' . $dt .  ' data-target="#myModal" data-day="' . $fecha[$i] . '" data-turn= "2" >11:00 a 14:00</li>
                                <li class="list ';
                                
                            $dt = ' data-toggle="modal" ';
                                foreach ($data1 as $k => $v){
                                    if ($fecha[$i]==$data1[$k][0] && 3==$data1[$k][1] ){
                                        echo "taken";
                                        $dt = "";
                                    } 
                                }
                            
                            
                            echo '" ' . $dt .  'data-target="#myModal" data-day="' . $fecha[$i] . '" data-turn= "3" >14:00 a 17:00</li>
                                <li class="list ';
                                
                            $dt = ' data-toggle="modal" ';
                                foreach ($data1 as $k => $v){
                                    if ($fecha[$i]==$data1[$k][0] && 4==$data1[$k][1] ){
                                        echo "taken";
                                        $dt = "";
                                    } 
                                }
                            
                            
                            echo '" ' . $dt .  ' data-target="#myModal" data-day="' . $fecha[$i] . '" data-turn= "4" >17:00 a 20:00</li>
                                <li class="list ';
                                
                            $dt = ' data-toggle="modal" ';
                                foreach ($data1 as $k => $v){
                                    if ($fecha[$i]==$data1[$k][0] && 5==$data1[$k][1] ){
                                        echo "taken";
                                        $dt = "";
                                    } 
                                }
                            
                            
                            echo '" ' . $dt .  ' data-target="#myModal" data-day="' . $fecha[$i] . '" data-turn= 5 >20:00 a 23:00</li>
                            </ul>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-notify modal-info" role="document">
                    <form action="reservas.php" method="get">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title w-100"></h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type='text' name='dia_res' class='d-none' id='modal-dia' />
                            <input type='number' name='horario_res' class='d-none' id='modal-turno'/>
                            <input type='number' name='estado' class='d-none' value='2' />
                            <input type="number" name="id_user" class='d-none' value='<?php echo $_SESSION["user_id"] ; ?>' />
                            <input type="text" name="user_email" class="d-none" value='<?php echo $_SESSION["email"]; ?>' />
                            <input type="number" name="id_salon" class='d-none' value='<?php echo $salon_id; ?>' />
                            <p> El salon se contactara con usted dentro de las 24hs para confirmar su reserva.</p>
                            <textarea name='comentario_res' placeholder='Dejar un comentario (opcional)'></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-elegant" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-elegant" value="Aceptar"/>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php
               
                $sel_feedback = "SELECT comentarios, nombre, apellido FROM feedback INNER JOIN usuarios WHERE  feedback.idsalones= '$salon_id' AND feedback.idusuarios = usuarios.idusuarios ORDER BY comentarios ;";
                $rs_feedback = mysqli_query($db, $sel_feedback);
                $data = array(); 
                while($row = mysqli_fetch_array($rs_feedback)){
                    $data[] = $row;
                }
                $comentarios = array_column ($data, 0);
                $nombre = array_column($data, 1);
                $apellido = array_column ($data, 2);
                $com_length = count($comentarios);
                if(!$comentarios){
                    echo '<div class="comment-box mx-auto mt-5">
                            <div class="comment-display">
                                <p class="comment-user"></p>
                                <p class="comment">Se el primero en comentar acerca de este salon.</p>
                            </div>
                        </div>';
                }
                else {
                    echo ' <div class="comment-box mx-auto mt-5">';
                
                    for ($i = 0; $i < $com_length; $i++) {
                         echo ' <div class="comment-display">
                         <p class="comment-user">' . $nombre[$i] . ' ' . $apellido[$i] . '</p>
                                    <p class="comment">' . $comentarios[$i] .  '</p>
                                </div>';
                    }
                
                    echo '</div>';
                }
                
                $sql_rate = mysqli_query($db, "SELECT calificacion FROM feedback WHERE idsalones = '$salon_id' AND calificacion IS NOT NULL ;");
                $rs_rate = mysqli_fetch_array($sql_rate);
                $r_rate = $rs_rate['calificacion'];
                ?>
           
            <div id="rateYo">
                <!-- star rating -->
            </div>
            <p data-rate='<?php echo $r_rate; ?>' id='rating' class='d-none'></p>
            <form class="comment-feedback mx-auto" action="comentarios.php" method="get">
                <input type="number" name="rating" class='comment-rating d-none' value=''/>
                <input type="number" name="id_user" class='d-none' value='<?php echo $_SESSION["user_id"] ; ?>' />
                <input type="number" name="id_salon" class='d-none' value='<?php echo $salon_id ; ?>' />
                <textarea class="md-textarea" name='comment' placeholder="Deja tu comentario"></textarea>
                <input type="submit" name="Enviar">
            </form>
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