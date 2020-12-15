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
            <a class="navbar-brand" href="/TrabrajoIntegral" style="color: #CDA434;">Grafos y Lenguajes Formales</a>
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

    <div class="container text-align-center text-center">
    <div class="card card-body pl-2 my-5 mx-5">
        <?php
          $ruta="archivos".$_FILES['archivo']['name'];
          if(move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta))
          {
              echo '<h1 class="pb-1">Contenido en el archivo de texto</h1>
              <h1 class="divider mx-5"></h1>';
              echo "<br>";

          $archivo = fopen("$ruta", "r");
          while(!feof($archivo)){
              $traer = fgets($archivo);
              echo nl2br($traer);
          }
          fclose($archivo);
          }else{
              echo "<h1>Ups ha ocurrido un error, el archivo no se pudo cargar correctamente</h1>";
          }
        ?>
        <form action="bd.php" method="POST">
          <input type="hidden" name="nombrearchivo" value="<?php echo $ruta ?>">
          <button id="btn_enviar" type="submit"  class="btn btn-outline-light centrar-btn mt-3">Exportar a Base de Datos</button>
        </form>
    </div>
    </div>
      
</body>