<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Conexion Css -->
    <link rel="stylesheet" href="/TrabInteg/css/index.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">

    <link rel="icon" href="img/Grafos.png">

    <title>Grafos Nosotros</title>

</head>
<body>
    
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
                        <a class="nav-link" href="/TrabajoIntegral/templates/nosotros.php" style="text-align: center;">Nosotros </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5 text-center">
    <div class="card card-body">
        <?php
          $conexion = mysqli_connect('localhost', 'root', '');

          $sql ="CREATE DATABASE TrabajoIntegralgrafos";

          if($conexion->query($sql) === true){
          
            echo '<h1 class="mb-5">Base de datos creada de manera exitosa!</h1>';

            echo'<form action="exportarDatos.php" method="POST">
                    <input type="hidden" name="nombrearchivo" value="'.$_POST['nombrearchivo'].'">                        
                    <button id="btn_enviar" type="submit"  class="btn btn-outline-light mb-5">Exportar a la Base de Datos</button>
                  </form>';
          }
          else{
            if($conexion->error=="Can't create database 'trabajointegralgrafos'; database exists"){
              echo'<form action="exportarDatos.php" method="POST">
                      <input class="text-center" type="hidden" name="nombrearchivo" value="'.$_POST['nombrearchivo'].'">
                      <h1>La base de datos ya está creada!</h1>
                      <h1 class="divider mx-5 mb-5"></h1> 
                      <h3 class="mb-5">No te preocupes, solo debes apretar continuar, el resto lo hacemos nosotros!</h3>                       
                      <button id="btn_enviar" type="submit"  class="btn btn-outline-light centrar-btn">Continuar</button>
                    </form>';
            }
          }        
        ?>
      </div>

    </div>
      
</body>