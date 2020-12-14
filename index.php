<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <!--Conexion Css -->
    <link rel="stylesheet" href="/TrabajoIntegral/css/index.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    
    <link rel="icon" href="img/Grafos.png">
    <title>Trabajo Integral</title>
    
</head>
<body>
    <?php
    
    session_start();

    $_SESSION['arreglo']=array();
    $_SESSION['mataaux']=array();
    $_SESSION['cant_pv']=0;
    
    
    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top p-3 aria-label">
        <div class="container">
            <a class="navbar-brand" href="/TrabajoIntegral" style="color: #CDA434;">Grafos y Lenguajes Formales</a>
            <button class="navbar-toggler border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/TrabajoIntegral" style="text-align: center;">Inicio </a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/TrabajoIntegral" style="text-align: center;">Nosotros </a>
                    </li>
                    <a href="/TrabajoIntegral/templates/cargarArchivo.php" class="btn btn-outline-light px-2 ml-1" style="text-align: center; max-width: 850px;">Comenzar ahora !</a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Primera seccion inicio -->

    <section id="inicio">
        <div class="container">
            <div class="text pt-5 pb-1">
                <h1>
                    <span class="">T</span>
                    <span class="">r</span>
                    <span class="">a</span>
                    <span class="">b</span>
                    <span class="">a</span>
                    <span class="">j</span>
                    <span class="">o</span>
                    <span class="ml-3">I</span>
                    <span class="">n</span>
                    <span class="">t</span>
                    <span class="">e</span>
                    <span class="">g</span>
                    <span class="">r</span>
                    <span class="">a</span>
                    <span class="">l</span>
                </h1>
                <h1 class="divider"></h1>

                <div class="row">
                    <div class="col-6">
                        <h5 class="text-justify mt-4 pb-5 mr-4">A continuaci&oacuten se puede encontrar el desarrollo del trabajo Integral de la asignatura Grafos y lenguajes formales; en este se nos pide ingresar dos
                             <br> </h5>
                        <div class="mb-2">
                            <a class="mb-5"href="/TrabajoIntegral/templates/cargarArchivo.php">Comenzar Ahora !</a>
                        </div>
                        <br>

                    </div>
                    <div class="col-6 text-center bg-dark mt-4">
                        <img class="" src="img/Grafos.png" alt="" height="250px">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Seccion de tecnologias utizadas-->
    <section id="tecnologias">
        <div class="container">
            <div class="contenedor mx-5">
                <h1 class="pt-5 content-center">
                    <span class="">T</span>
                    <span class="">e</span>
                    <span class="">c</span>
                    <span class="">n</span>
                    <span class="">o</span>
                    <span class="">l</span>
                    <span class="">o</span>
                    <span class="">g</span>
                    <span class="">&iacute</span>
                    <span class="">a</span>
                    <span class="">s</span>
                    <span class="ml-3">U</span>
                    <span class="">s</span>
                    <span class="">a</span>
                    <span class="">d</span>
                    <span class="">a</span>
                    <span class="">s</span>
                </h1>
                <h1 class="divider content-center px-5"></h1>
                <div class="carousel pt-1">
                    <div class="carousel__contenedor">
                        <button aria-label="Anterior" class="carousel__anterior">
                            <em class="fas fa-chevron-left"></em>
                        </button>

                        <div class="carousel__lista">
                            <div class="carousel__elemento">
                                <img src="img/js.png" alt="JavaScript">
                                <p>JavaScript</p>
                            </div>
                            <div class="carousel__elemento">
                                <img src="img/html.png" alt="Html">
                                <p>Html</p>
                            </div>
                            <div class="carousel__elemento">
                                <img src="img/css.png" alt="Css">
                                <p>Css</p>
                            </div>
                            <div class="carousel__elemento">
                                <img src="img/boostrap.png" alt="Boostrap">
                                <p>Bootstrap</p>
                            </div>
                            <div class="carousel__elemento">
                                <img src="img/php.png" alt="Php">
                                <p>Php</p>
                            </div>

                            <div class="carousel__elemento">
                                <img src="img/github.png" alt="Github">
                                <p>Github</p>
                            </div>

                        </div>

                        <button aria-label="Siguiente" class="carousel__siguiente">
                            <em class="fas fa-chevron-right"></em>
                        </button>
                    </div>

                    <div role="tablist" class="carousel__indicadores pb-5"></div>
                </div>

            </div>
        </div>

    </section>



    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c8152ea011.js" crossorigin="anonymous"></script>
        <!-- Script para carrusel -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
</body>
</html>