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
                        <li class="nav-item"><a class="nav-link" href="shoppingCart.php"><img src="assets/imagenes/ShoppingCart.png" alt=""></a></li>
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
                        <h2 class="text-white mt-0">Registre los Datos para el pedidor</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">

                        <form id="contactForm" data-sb-form-api-token="API_TOKEN"  method="POST" action="">
                          
                            <div class="form-floating mb-3">
                                <input class="form-control" name = "name" id="name" type="text" placeholder="Ingresar Su Nombre..." data-sb-validations="required" />
                                <label for="name">Nombre completo</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required"></div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input name = "user" class="form-control" id="user" type="text" placeholder="Ingresar Su Usuario..." data-sb-validations="required" />
                                <label for="user">Usuario</label>
                                <div class="invalid-feedback" data-sb-feedback="user:required"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input name = "password" class="form-control" id="password" type="password" placeholder="Ingresar Su Contraseña..." data-sb-validations="required" />
                                <label for="password">Contraseña</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input name = "email" class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Correo eléctronico</label>
                                <div class="text-white invalid-feedback" data-sb-feedback="email:required">Falta el correo</div>
                                <div class="text-white invalid-feedback" data-sb-feedback="email:email">Correo invalido</div>
                            </div>
                      
                            <div class="form-floating mb-3">
                                <input name = "telefono" class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Número de telefono</label>
                                <div class="text-white invalid-feedback" data-sb-feedback="phone:required">Falata el numero de telefono</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input name = "fechaNac" class="form-control" id="age" type="date" placeholder="25/10/2000" data-sb-validations="required" />
                                <label for="age">Fecha de Nacimiento</label>
                                <div class="text-white invalid-feedback" data-sb-feedback="age:required">Falta la Edad</div>
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
        $usuario = $_POST['user'];
        $contraseña = $_POST['password'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['fechaNac'];
        $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
        $basededatos = mysqli_select_db($conn,BASEDATOS);
        $sql = "INSERT INTO usuario ( nombre_usr, usuario_usr, contrasenia_usr, fechaNac_usr, telefono_usr, email_usr, tipo_usr, id_direccion) VALUES ('$nombre','$usuario','$contraseña','$fecha','$telefono','$email','Usuario',1);";
        //Ejecutar la sentencia SQL
        $res = mysqli_query($conn,$sql);
        //Verificar si la sentencia se ejecuto
        
            if($res == true){
                $_SESSION['crear'] = "Usuario creado con Exito!!";
                header('location:'.URLSITIO.'home.php');
            }   
    }
?>