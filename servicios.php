<?php
	include("includes/header.php");
?>
        <main>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-inline-flex">
                    <form method="get" action="">
                        <p class="filter-title">Tipo de servicio</p>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="1">
                            <label class="filter-opt" for="servicio" >Catering</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="2">
                            <label class="filter-opt" for="servicio">Animacion</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="3">
                            <label class="filter-opt" for="servicio">Disc Jockey</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="4">
                            <label class="filter-opt" for="servicio">Fotografia-filmacion</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="5">
                            <label class="filter-opt" for="servicio">Souvenirs</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="6">
                            <label class="filter-opt" for="servicio">Ambientacion</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="7">
                            <label class="filter-opt" for="servicio">Invitaciones</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="servicio" value="8">
                            <label class="filter-opt" for="servicio">Otros</label>
                        </div>
                        <p class="filter-title">Rango de precio</p> 
                        <div class="d-block">
                            <input type="checkbox" name="valor" value="1">
                            <label class="filter-opt" for="valor">Mas de $10.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor" value="2">
                            <label class="filter-opt" for="valor">Entre $5.000-$10.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor" value="3">
                            <label class="filter-opt" for="valor">Entre $1.000-$5.000</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="valor" value="4">
                            <label class="filter-opt" for="valor">Menos de $1.000</label>
                        </div>
                        <p class="filter-title">Calificacion</p>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion" value="1">
                            <label class="filter-opt" for="calificacion">De 8 a 10</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion" value="2">
                            <label class="filter-opt" for="calificacion">De 5 a 8</label>
                        </div>
                        <div class="d-block">
                            <input type="checkbox" name="calificacion" value="3">
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
                        <input type="reset" class="mt-3 float-right w-50" value="Borrar">
                        <input type="submit" class="mt-3 float-left w-50" value="Buscar">                        
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
                                <option value="2">calificacion</option>
                                <option value="3">Nombre</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col result-col justify-content-center">
                            <a href="#"><img src="img/serv-ochoa.png" class="result-img w-100"></a>
                        </div>
                        <div class="col result-col">
                            <a href="#"><h3 class="result-heading">Ochoa Catering</h3></a>
                            <p class="result-p">Independencia y Formosa</p>
                            <p class="result-p">tel: (0223) 474-8469 - 472-0656</p>
                            <p class="result-p">1° fecha disponible</p>
                        </div>
                        <div class="result-col result-data">
                            <p class="mt-5">$1000</p>
                            <div class="rating d-inline-flex w-100">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a href="#"><p class="result-info">mas info>>></p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col result-col justify-content-center">
                            <a href="#"><img src="img/serv-animaniak.jpg" class="result-img w-100"></a>
                        </div>
                        <div class="col result-col">
                            <a href="#"><h3 class="result-heading">Animaniak</h3></a>
                            <p class="result-p">Juan B. Justo 2166</p>
                            <p class="result-p">tel: 0223 591-4107</p>
                            <p class="result-p">1° fecha disponible</p>
                        </div>
                        <div class="result-col result-data">
                            <p class="mt-5">$2500</p>
                            <div class="rating d-inline-flex w-100">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a href="#"><p class="result-info">mas info>>></p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col result-col justify-content-center">
                            <a href="#"><img src="img/serv-DJ.jpg" class="result-img w-100"></a>
                        </div>
                        <div class="col result-col">
                            <a href="#"><h3 class="result-heading">Facundo Derosa DJ</h3></a>
                            <p class="result-p">NAPOLES 6614</p>
                            <p class="result-p">tel: 223-5217084</p>
                            <p class="result-p">1° fecha disponible</p>
                        </div>
                        <div class="result-col result-data">
                            <p class="mt-5">$2500</p>
                            <div class="rating d-inline-flex w-100">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a href="#"><p class="result-info">mas info>>></p></a>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col result-col justify-content-center">
                            <a href="#"><img src="img/serv-lacompetidora.jpg" class="result-img w-100"></a>
                        </div>
                        <div class="col result-col">
                            <a href="#"><h3 class="result-heading">La competidora</h3></a>
                            <p class="result-p">Rivadavia 3576</p>
                            <p class="result-p">tel: (0223) 492-5151</p>
                            <p class="result-p">1° fecha disponible</p>
                        </div>
                        <div class="result-col result-data">
                            <p class="mt-5">$500</p>
                            <div class="rating d-inline-flex w-100">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a href="#"><p class="result-info">mas info>>></p></a>
                        </div>
                    </div>
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