<?php
    include('config/constantes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Parador El Viajero</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="assets/css/boostrap.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
        <!-- Barra busqueda | navbar-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="home.php">INICIO</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php#about">Acerca de nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php#portfolio">Ofrecemos</a></li>
                        <li class="nav-item"><a class="nav-link" href="home.php#services">Servicios</a></li>
                        <?php
                            $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                            $basededatos = mysqli_select_db($conn,BASEDATOS);
                            $sql = "Select * from tmpUsuario ";
                            $res = mysqli_query($conn,$sql);
                            if ($res == true)
                            {
                            $numFilas = mysqli_num_rows($res);
                                    if($numFilas > 0)
                                    {
                                        while($fila = mysqli_fetch_assoc($res))
                                        {
                                            $name = $fila['nombre_us'];  
                                            $id=$fila['id_us'];
                                            ?>
                                            <li class="nav-item"><a class="nav-link" href="" id="usuario"><?php echo $name?></a></li>                                            
                                            <li class="nav-item"><a class="nav-link" href="iniciarSesion.php" id="usuario">Cerrar Sesion</a></li>
                                            <?php 
                                        }                                        
                                    }else{
                                        ?>
                                            <li class="nav-item"><a class="nav-link" href="iniciarSesion.php" id="usuario">Iniciar Sesión</a></li>
                                        <?php 
                                    }
                                }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="shoppingCart.php"><img src="assets/imagenes/ShoppingCart.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Fin de la seccion Navbar -->
        <!-- portada | masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">PARADOR EL VIAJERO</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">DALE UN GUSTO<br>A TU PALADAR!</p>
                        <a class="btn btn-primary btn-xl" href="#about">Explorar</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- fin de la portada | masthead-->
        <!-- Nosotros | primary-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <img class="img-fluid" src="assets/imagenes/logo.png" alt="">
                    <div class="col-lg-8 text-center">
                        <br><br>
                        <h2 class="text-white mt-0">ACERCA DE NOSOTROS</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Nuestro restaurante lleva abierto más de 10 años, siempre brindando la mejor experencia culinaria para nuestros clientes. 
                        <br>Restaurante familiar, donde cada semana se ofrecen desayuno, almuerzos, platos a la carta, bebidas, snaks.
                        <br> 
                        <br>
                        <a class="btn btn-light btn-xl" href="#services">MIRA AQUI!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin de Nosotros | primary-->
        <!-- Ofrecemos | section-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Servicios</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Comida</h3>
                            <p class="text-muted mb-0">Ofrecemos desayunos, almuerzos y platos a la</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Compra online</h3>
                            <p class="text-muted mb-0">Compra nuestros productos desde la red</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Visitanos</h3>
                            <p class="text-muted mb-0">Horario de 7:00 Am - 16:00 pm</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Viveres</h3>
                            <p class="text-muted mb-0">snaks, bebidas, dulces, helados, etc...</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Fin de Ofrecemos | section-->

       <!-- Inicio de la seccion Categorias -->
       <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="productosComida.php" title="Platos">
                        <img class="img-fluid" src="assets/imagenes/churrascoCarne.jpeg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Categoria</div>
                            <div class="project-name">Platos a la carta</div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="productosViveres.php" title="Viveres">
                        <img class="img-fluid" src="assets/imagenes/viveres.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Categoria</div>
                            <div class="Piano Roland clásico">Viveres</div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="productosSnacks.php" title="Snacks">
                        <img class="img-fluid" src="assets/imagenes/helado.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Categoria</div>
                            <div class="project-name">Helados de Salcedo, snaks, dulces, bebidas, etc.</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de la seccion Categorias -->
    <!-- Inicio de la seccion redes sociales -->
    <br>
    <br>
    <section class="page-section bg-primary redes">
         <div class="contenedor text-centro float-contenedor">
            <br><br>
            <h2 class="text-white mt-0">Siguenos en...</h2>
            <hr class="divider divider-light" />
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/material-outlined/42/ffffff/whatsapp--v1.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluency-systems-filled/48/ffffff/facebook.png"/></a>
                </li>
                <li>
                     <a href="#"><img src="https://img.icons8.com/windows/52/ffffff/instagram-new.png"/></a>
                </li>
            </ul>
        </div>
        <div class="contenedor text-centro float-contenedor">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6570888390465!2d-78.57270596773678!3d-0.5150951793079559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x50b867f3f8db5c12!2sSTEAK%20HOUSE%20(RICON%20DEL%20VALLE)!5e0!3m2!1ses!2sec!4v1630377587675!5m2!1ses!2sec" class="img-fluid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div> 
        <div class="contenedor text-centro float-contenedor">
            <p class="text-white-75 mb-4">Ven visitanos cualquier dia de la semana, estamos antes del peaje de panzaleo(panamericana norte), junto a las rieles del tren.</p>
        </div>
    </section>
    <!-- Fin de la seccion redes sociales -->
    <!-- Inicio de la seccion Footer -->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - ESPE Software</div></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

    <script src="hbs/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    </html>
