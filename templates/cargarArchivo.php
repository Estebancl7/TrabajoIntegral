<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Conexion Css -->
    <link rel="stylesheet" href="/TrabajoIntegral/css/index.css">
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

    <div class="container">
      <div class="card card-body pl-2 my-5 pb-5">
          <h1 class="display-5 text-center">Añade archivo de coordenadas</h1>
          <h1 class="divider mx-5 mb-5"></h1>
          <div class="text-center">
              <form action="contenido.php" method="POST" enctype="multipart/form-data" >
                  <div class="form-group has-feedback">
                     <label for="archivo" role="button">Selecciona el archivo con Coordenadas GPS de los Centros y Puntos de venta:</label>
                      <input id="archivo" type="file" name="archivo" class="form-control" onchange="return validarExt()"/>
                  </div>  
                  <div id="visorArchivo"></div>             
                  <input type="hidden" name="MAX_FILE_SIZE" value="10000">
                  <button id="btn_enviar" type="submit"  class="btn btn-outline-light">Enviar archivo</button>
              </form>
          </div>

        </div>

    </div>
      
</body>
</html>

<!--script-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"    crossorigin="anonymous"></script>

    <script type="text/javascript">
      function validarExt(){
        var archivoInput = document.getElementById('archivo');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.txt)$/i;

        if(!extPermitidas.exec(archivoRuta)){
          alert('Asegurate de seleccionar un archivo de texto .txt');
          archivoInput.value='';
          return false;
        }
        else{
          if(archivoInput.files && archivoInput.files[0]){
            var visor = new FileReader();
            visor.onload = function(e){
              document.getElementById('visorArchivo'); 
            };
            visor.readAsDataURL(archivoInput.files[0]);
          }
        }
      }
    </script>