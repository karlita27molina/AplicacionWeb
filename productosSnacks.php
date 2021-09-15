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
    <title>Menu de Productos</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="assets/css/boostrap.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>    
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
    <!-- Inicio de la seccion Busqueda -->
    <section class="busqueda">
        
    <h2 class="texto-centro">Snacks</h2>
        <div class="contenedor2">
            <form action="" method="POST">
                <br><br>
                <div class="form-floating mb-3">
                    <input name="productoBusqueda" class="form-control" id="product" type="text" placeholder="Buscar Productos..." data-sb-validations="required" />
                    
                    <div class="invalid-feedback" data-sb-feedback="product:required"></div>
                </div>
                <div class="d-none text-white" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al enviar datos</div></div>
                <div class="d-grid"><input class="btn btn-dark btn-xl" type="submit"  name="submits" value="Buscar"   alt="" class="img-pequeño"> 
                </div>
            </form>
        </div>
    </section>
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">                
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
                    <img class="img-fluid" src="assets/imagenes/logo.png" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Categoria</div>
                             </div>
                    <br><br><br>
                    <div class="project-name"> <h2 class="texto-centro">Siga disfrutando de nuestros productos</h2></div>
                
                </div>
                       
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="productosComida.php" title="Comida">
                        <img class="img-fluid" src="assets/imagenes/churrascoCarne.jpeg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Categoria</div>
                            <div class="project-name">Comida</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        if(isset($_POST['submits'])){   
            $prod = $_POST['productoBusqueda'];
                $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                $basededatos = mysqli_select_db($conn,BASEDATOS);
                $sql = "Select * from producto where tipo_pro='Snacks' and nombre_pro like '%$prod%';";
                $res = mysqli_query($conn,$sql);
                if ($res == true)
                {
                    ?>
                    <section class="menu-comidas">
                    <div class="contenedor" >
                        <h2 class="texto-centro">Resultado de Busqueda</h2>
                    <?php
                     $numFilas = mysqli_num_rows($res);
                        if($numFilas > 0)
                        {
                            while($fila1 = mysqli_fetch_assoc($res))
                            {
                                $id = $fila1['id_pro'];
                                $nombre1 = $fila1['nombre_pro'];
                                $descripcion1 = $fila1['descripcion_pro'];
                                $precio1 = $fila1['precio_pro'];
                                $imagen1 = $fila1['imagen_pro'];
                                ?>
                                    <div class="menu-comidas-item">
                                    <div class="img-plato">
                                        <img src="<?php echo $imagen1?>" alt="<?php echo  $nombre1?>" class="img-responsive">
                                    </div>
                                    <div class="desc-plato-menu">
                                        <h4><?php echo $id." ".$nombre1?></h4>
                                        <p class="precio-plato">$ <?php echo $precio1?></p>
                                        <p class="desc-plato"><?php echo $descripcion1?></p>
                                        <br>                                        
                                        <a class="nav-link" href="productosSnacks.php#limpiar"><input class="btn btn-primary btn-xl" type="image"  name="submit" value="Buscar"   src="assets/imagenes/CartAdd.png" alt="" class="img-pequeño" alt="" class="img-pequeño"> </a>
                                    </div>                          
                                <div class="limpiar"></div>
                                </div> 
                                <?php
                            }   
                         }  else{
                            ?>
                                <h2 class="texto-centro">No se encontro el Producto</h2>
                            <?php
                         } 
                }
            }
    ?>
    </div>
    </section>
    <div class="limpiar"></div>
    <div class="limpiar"></div>
    <!-- Fin de la seccion Busqueda -->
    <!-- Inicio de la seccion comidas -->
    <section class="menu-comidas">
        <div class="contenedor">
            <h2 class="texto-centro">Nuestro Menú</h2>
            <?php
                $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                $basededatos = mysqli_select_db($conn,BASEDATOS);
                $sql = "Select * from producto where tipo_pro='Snacks'";
                $res = mysqli_query($conn,$sql);
                if ($res == true)
                {
                $numFilas = mysqli_num_rows($res);
                        if($numFilas > 0)
                        {
                            while($fila = mysqli_fetch_assoc($res))
                            {
                                $id = $fila['id_pro'];
                                $nombre = $fila['nombre_pro'];
                                $descripcion = $fila['descripcion_pro'];
                                $precio = $fila['precio_pro'];
                                $imagen = $fila['imagen_pro'];
                                ?>
                                    <div class="menu-comidas-item">
                                    <div class="img-plato">
                                        <img src="<?php echo $imagen?>" alt="<?php echo $nombre?>" class="img-responsive">
                                    </div>
                                    <div class="desc-plato-menu">
                                        <h4><?php echo $id." ".$nombre?></h4>
                                        <p class="precio-plato">$ <?php echo $precio?></p>
                                        <p class="desc-plato"><?php echo $descripcion?></p>
                                        <br>
                                       <a class="nav-link" href="productosSnacks.php#limpiar"><input class="btn btn-primary btn-xl" type="image"  name="submits"  src="assets/imagenes/CartAdd.png" alt="" class="img-pequeño" > </a> 
                                        </div>                          
                                <div class="limpiar"></div>
                                </div>                               
                                <?php
                            }   
                        }
                    }
                ?>
            </div>
    </section>
    <div class="limpiar"></div>
    <!-- Fin de la seccion comidas -->   
        
    <div class="limpiar" id="limpiar"></div>    
    <?php
        $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
        $basededatos = mysqli_select_db($conn,BASEDATOS);
        $sql = "Select * from tmpUsuario ";
        $res = mysqli_query($conn,$sql);        
        if ($res == true )
        {
            $numFilas = mysqli_num_rows($res);
            if($numFilas > 0 )
            {
                while($fila = mysqli_fetch_assoc($res))
                {
                
                ?>
                <div class="masthead">    
                    <section class="page-section" id="contact">
                        <div class="container px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6 text-center">
                                    <h2 class="text-white mt-0">Registra tu pedido</h2>
                                    <hr class="divider" />
                                </div>
                            </div>
                            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                                <div class="col-lg-6">
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN"  method="POST" action="">
                                    <div class="form-floating mb-3">
                                            <input class="form-control" name = "descripcion" id="descripcion" type="text" placeholder="Ingresar Nombre..." data-sb-validations="required" />
                                            <label for="descripcion">Descripción </label>
                                            <div class="invalid-feedback" data-sb-feedback="descripcion:required"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                            <input class="form-control" name = "id_pro" id="id_pro" type="text" placeholder="Ingresar Id" data-sb-validations="required" />
                                            <label for="id_pro">Codigo </label>
                                            <div class="invalid-feedback" data-sb-feedback="id_pro:required"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name = "cantidad" class="form-control" id="cantidad" type="number"  min="0" max="100" step="1" placeholder="Ingresar Cantidad..." data-sb-validations="required" />
                                        <label for="cantidad">Cantidad</label>
                                        <div class="invalid-feedback" data-sb-feedback="cantidad:required"></div>
                                    </div>
                                    <div class=" d-grid">                     
                                        <input class="btn btn-primary btn-xl" type="submit" name="submit" value="Añadir">
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
        <?php
        $name = $fila['nombre_us'];  
        $id=$fila['id_us']; 
        //Verificar si el formulario a sido enviado
        if(isset($_POST['submit'])){
            $pro= $_POST['id_pro'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $connN = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
            $basededatosN = mysqli_select_db($connN,BASEDATOS);
            $sqP = "INSERT INTO pedido (fecha_pedido, descripcion_pedido, estado_pedido,total_pedido, id_cliente) VALUES ('2020/02/10', '$descripcion', 'false', 50, '$id');";
            $reP = mysqli_query($connN,$sqP);
            $sqlp = "Select * from producto where tipo_pro='Snacks' and id_pro='$pro'";                
            $relp = mysqli_query($connN,$sqlp);
            if ($relp == true)
            {
            $numFilas = mysqli_num_rows($relp);
                    if($numFilas > 0)
                    {
                        while($fila = mysqli_fetch_assoc($relp))
                        {
                            $id = $fila['id_pro'];
                            $nombre = $fila['nombre_pro'];
                            $descripcion = $fila['descripcion_pro'];
                            $precio = $fila['precio_pro'];                            
                            $conp = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                            $basededatosp = mysqli_select_db($conp,BASEDATOS);  
                            
                            $id_p="SELECT MAX(id_pedido) AS id_pedido FROM pedido;";
                            $relpe = mysqli_query($conp,$id_p); 
                            if ($relpe == true)
                            {
                            $numFilas = mysqli_num_rows($relpe);
                            if($numFilas > 0)
                            {
                                while($fila = mysqli_fetch_assoc($relpe))
                                {
                                $id_pe = $fila['id_pedido'];
                                $subtotal=($precio*$cantidad);
                                $sqtp = "INSERT INTO lineapedido (precio_linea, cantidad, id_producto, id_pedido) VALUES ('$subtotal', '$cantidad', '$id', '$id_pe');";
                                $retp = mysqli_query($connN,$sqtp);
                                }
                            }
                        }
                    }
            }               
       }
                }
            }
        }
    }
?>
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