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
<body>
    <div class="masthead">    
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
                        <li class="nav-item"><a class="nav-link" href="iniciarSesion.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Fin de la seccion Navbar -->
    <!-- Contacto-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="text-white mt-0">Registrar Nuevos Productos</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">

                        <form id="contactForm" data-sb-form-api-token="API_TOKEN"  method="POST" action="">
                          
                            <div class="form-floating mb-3">
                                <input class="form-control" name = "name" id="name" type="text" placeholder="Ingresar Nombre..." data-sb-validations="required" />
                                <label for="name">Nombre del Producto</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required"></div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input name = "precio" class="form-control" id="precio" type="number" min="0" max="50" step="0.1"  placeholder="Ingresar Precio..." data-sb-validations="required" />
                                <label for="precio">Precio </label>
                                <div class="invalid-feedback" data-sb-feedback="precio:required"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input name = "stock" class="form-control" id="stock" type="number"  min="0" max="100" step="1" placeholder="Ingresar Stock..." data-sb-validations="required" />
                                <label for="stock">Stock</label>
                                <div class="invalid-feedback" data-sb-feedback="stock:required"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name = "descripcion" id="descripcion" type="text" placeholder="Ingresar Nombre..." data-sb-validations="required" />
                                <label for="descripcion">Descripción del Producto</label>
                                <div class="invalid-feedback" data-sb-feedback="descripcion:required"></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input name = "imagen" class="form-control" id="imagen" type="text" placeholder="/assets/imagenes/example.png" data-sb-validations="required,imagen" />
                                <label for="imagen">Imagen</label>
                            </div>
                      
                            <div class="form-floating mb-3">
                                <input name = "tipo" class="form-control" id="tipo" type="text" placeholder="" data-sb-validations="required" />
                                <label for="tipo">Tipo (Snacks, Viveres, Comida)</label>
                                <div class="text-white invalid-feedback" data-sb-feedback="tipo:required">Falata el tipo</div>
                            </div>

                            <div class=" d-grid">                     
                            <input class="btn btn-primary btn-xl" type="submit" name="submit" value="Guardar">
                            </div>  
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <img class="img-fluid" src="assets/imagenes/phone.png" alt="">
                        <div class="text-white">Contactanos: 0987654321</div>
                    </div>
                </div>

            </div>
        </section>
<!-- Fin de Contacto-->
    </div>
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


<?php
    //Verificar si el formulario a sido enviado
    if(isset($_POST['submit'])){
        
        $nombre = $_POST['name'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $descripcion = $_POST['descripcion'];
        $imagen = $_POST['imagen'];
        $tipo = $_POST['tipo'];
        $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
        $basededatos = mysqli_select_db($conn,BASEDATOS);
        $sql = "INSERT INTO producto ( nombre_pro, precio_pro, stock_pro, descripcion_pro, imagen_pro, tipo_pro) VALUES ('$nombre','$precio','$stock','$descripcion','$imagen','$tipo');";
        //Ejecutar la sentencia SQL
        $res = mysqli_query($conn,$sql);
        //Verificar si la sentencia se ejecuto
        
            if($res == true){
                header('location:'.URLSITIO.'home.php');
            }   
    }
?>