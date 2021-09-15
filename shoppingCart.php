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
    
    <?php 
                $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
                $basededatos = mysqli_select_db($conn,BASEDATOS);
                $sql = "Select * from lineapedido ;";
                $res = mysqli_query($conn,$sql);
                if ($res == true)
                {
                    ?>
                    <section class="menu-comidas">
                    <div class="contenedor">
                        <h2 class="texto-centro" id="result">Resultado de Busqueda</h2>
                    <?php
                    $numFilas = mysqli_num_rows($res);
                        if($numFilas > 0)
                        {
                            while($fila = mysqli_fetch_assoc($res))
                            {
                                $id = $fila['id_pedido'];
                                $idP = $fila['id_producto'];
                                $cantidad = $fila['cantidad'];
                                $precio1 = $fila['precio_linea'];
                                $total=$fila['precio_linea'];
                                $sqp = "Select * from Producto where id_pro='$idP' ;";
                                $rep = mysqli_query($conn,$sqp);
                                if ($rep == true)
                                {
                                    $numFilas = mysqli_num_rows($rep);
                                    if($numFilas > 0)
                                    {
                                        while($fila1 = mysqli_fetch_assoc($rep))
                                        {
                                            $nombre = $fila1['nombre_pro'];
                                            $precio = $fila1['precio_pro'];
                                            $imagen = $fila1['imagen_pro'];
                                            ?>
                                                <div class="menu-comidas-item">
                                                <div class="img-plato">
                                                    <img src="<?php echo $imagen?>" alt="<?php echo $nombre?>" class="img-responsive">
                                                </div>
                                                <div class="desc-plato-menu">
                                                    <h4><?php echo $idP." ".$nombre?> </h4>
                                                    <p class="precio-plato">$ <?php echo $precio?></p>
                                                    <p class="desc-plato"> Cantidad: <?php echo $cantidad?></p>
                                                    <p class="desc-plato"> Subtotal: <?php echo $precio1 ?></p>
                                                    <br>
                                                </div>                          
                                            <div class="limpiar"></div>
                                            </div>             
                                            <?php                                           
                                              
                                         }                              
                         
                         } else{
                            ?>
                                <h2 class="texto-centro">No ha realizado pedidos aun</h2>
                            <?php
                         } 
                }
        }
    }}

            
    ?>


    </div>
    </section>
    <div class="limpiar"></div>
    <div class="limpiar"></div>
    <?php
    $conn = mysqli_connect(SERVIDOR,USERNAME,PASSWORD,'') or die(mysqli_error());
    $basededatos = mysqli_select_db($conn,BASEDATOS);
    $sql = "Select sum(precio_linea)  from lineapedido ;";
    $res = mysqli_query($conn,$sql);
    if ($res == true)
    {
        
        $numFilas = mysqli_num_rows($res);
            if($numFilas > 0)
            {
                while($fila = mysqli_fetch_assoc($res))
                {
                    $total=$fila['sum(precio_linea)'];
                    ?>
                    <div class="row gx-4 gx-lg-5 justify-content-center mb-5 d-grid">  
                    <p class="desc-plato"> Total a Pagar:  $ <?php echo $total ?></p>
                    </div> 
                    <?php
                }
            }
        }
    ?>
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5 d-grid">                     
        <a href="direccion.php"> <input class="btn btn-primary btn-xl" type="submit" name="submit" value="Pagar"></a>
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