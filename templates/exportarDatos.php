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

    <title>Grafos</title>

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
      <div class="card card-body pl-5">
        <?php

              include "conexion.php";
  
              $sql9 = "CREATE TABLE datoslocales(
        
              TipoLocal VARCHAR(1), 
              NumeroIdentificador INT NULL,   
              Coordenadas VARCHAR(1000),
              X INT,
              Y INT,
              PRIMARY KEY (NumeroIdentificador)
        
             )";

              if($conexion->query($sql9) === true){
                echo "<h1>Tabla creada de manera exitosa!</h1><br>";
              }
              else{
                echo "<h1>La tabla ha sido creada anteriormente</h1><br>";
              }
              $nombrearchivo=$_POST['nombrearchivo'];


              $sql="LOAD DATA INFILE 'C:/xampp/htdocs/TrabajoIntegral/templates/$nombrearchivo'
                  INTO TABLE datoslocales
                  FIELDS TERMINATED BY ';'
                  LINES TERMINATED BY '\n';
                  ";
      
              if($conexion->query($sql)===true ){
                  echo "<h2>Ademas los datos han sido exportados correctamente</h2><br>";
              }
        
              $sql2="UPDATE datoslocales
                  SET 
                   X = SUBSTRING(Coordenadas,1,LOCATE(',',Coordenadas) - 1)
                  ";
              $sql3="UPDATE datoslocales
                  SET
                  Y = SUBSTRING(Coordenadas,LOCATE(',',Coordenadas) + 1)
                  ";       

              if($conexion->query($sql2)===true && $conexion->query($sql3)===true){
                  echo "<h4>y hemos separado las coordenadas correctamente :D</h4><br>";
              }else{

                die ("Error en la separación: ".$conexion->error);
              }

        ?>
        <form action="futurapag.php">
          <input class="btn btn-outline-light centrar-btn" type="submit" Value="Comienza el recorrido !">
        </form>
      </div>

  </div>
              

</body>