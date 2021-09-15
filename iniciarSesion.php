<?php
    include('config/constantes.php');
    $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
    $basededatos = mysqli_select_db($conn,BASEDATOS);
     //Ejecutar la sentencia SQL
    $sq= "TRUNCATE  tmpUsuario ";
    $re = mysqli_query($conn,$sq);
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
                        <?php
                        //Verificar si el formulario a sido enviado
                        if(isset($_POST['submit'])){        
                            $usuario = $_POST['user'];
                            $contraseña = $_POST['password'];
                            $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                            $basededatos = mysqli_select_db($conn,BASEDATOS);
                             //Ejecutar la sentencia SQL
                            $sql = "Select id_usr, nombre_usr, usuario_usr from Usuario where (usuario_usr='$usuario') and (contrasenia_usr='$contraseña') and (tipo_usr='Usuario') ;";
                             $res = mysqli_query($conn,$sql);
                            //Verificar si la sentencia se ejecuto
                            if($res == true){ 
                                $numFilas = mysqli_num_rows($res);
                                if($numFilas > 0)
                                {
                                    while($fila = mysqli_fetch_assoc($res))
                                    {                                                                
                                        header('location:'.URLSITIO.'home.php');
                                        $nombre = $fila['nombre_usr'];  
                                        $usu=$fila['usuario_usr']; 
                                        $id=$fila['id_usr'];
                                        $sql1 = "INSERT INTO tmpusuario(id_us, nombre_us, usuario_us) VALUES ('$id', '$nombre', '$usu');";
                                        $res1 = mysqli_query($conn,$sql1);            
                                    }                                                             
                                
                            }else{
                                $sql = "Select nombre_usr from Usuario where (usuario_usr='$usuario') and (contrasenia_usr='$contraseña') and (tipo_usr='Administrador') ;";
                            //Ejecutar la sentencia SQL
                                $res = mysqli_query($conn,$sql); 
                                if($res == true){ 
                                    $numFilas = mysqli_num_rows($res);
                                    if($numFilas > 0)
                                    {
                                     header('location:'.URLSITIO.'registrarProducto.php');
                                    }else{
                                        header('location:'.URLSITIO.'iniciarSesion.php'); 
                                    }                            
                            } 
                        }
                    }
                }
                ?>
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
                        <h2 class="text-white mt-0">Acceder a tu Cuenta</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">

                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action="">
                                                      
                            <div class="form-floating mb-3">
                                <input name="user" class="form-control" id="user" type="text" placeholder="Ingresar Su Usuario..." data-sb-validations="required" />
                                <label for="user">Usuario</label>
                                <div class="invalid-feedback" data-sb-feedback="user:required"></div>
                            </div>

                            <div class="form-floating mb-3">
                                <input name="password" class="form-control" id="password" type="password" placeholder="Ingresar Su Contraseña..." data-sb-validations="required" />
                                <label for="password">Contraseña</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required"></div>
                            </div>                      
                            <div class=" d-grid">                     
                            <input class="btn btn-primary btn-xl" type="submit" name="submit" value="Iniciar Sesión">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <img class="img-fluid" src="assets/imagenes/addCuenta.png"/>
                        <a href="registrar.php"><div class="text-white">Crear una Cuenta</div></a>
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