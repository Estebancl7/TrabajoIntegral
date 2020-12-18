<?php

  include "conexion.php";

  $centro=$_POST['centro_dib'];

  $sql1="CREATE TABLE PuntosVentas$centro(
      NumeroIdentificador INT, 
      Cant_prod INT,   
      Coordenadas INT,
      PRIMARY KEY(NumeroIdentificador)
      
        )";

  $conexion->query($sql1);
  
?>

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
    <div class="container mt-5">
    
      <div class="card card-body text-center">

            <?php
              session_start();
              
              $mataaux='mataaux';

              if(isset($_POST['boton'])){

                $num_ident=$_POST['Destino'];
                $cant_prod=$_POST['cant_prod'];
                $sen="INSERT INTO PuntosVentas$centro(NumeroIdentificador,Cant_prod) VALUE ('$num_ident','$cant_prod')";
                $conexion->query($sen);
                $pos=array_search($_POST['Destino'],$_SESSION[$mataaux]);
                unset($_SESSION[$mataaux][$pos]);

              }

              if(isset($_POST['boton2']) && $_POST['cant_producto']>1000)
              {
                $_SESSION[$mataaux]=$_SESSION['arreglo'];
              }

            ?>

            <h3 class="mt-2">Hoja de rutas del cami&oacuten N° <?php echo $centro ?></h3>

        <form action="planificacion.php" method="POST" autocomplete="off">

              <input type="hidden" name="centro_dib" value="<?php echo $centro?>">


              <label class="mt-3">Elige el punto de venta: </label>
              <select type="text "id="NumeroIdentificador" name="Destino">
              
                  <?php   
                    for($a=0;$a<$_SESSION['cant_pv'];$a++){

                      if(isset($_SESSION[$mataaux][$a])){

                      echo '<option value=" '.$_SESSION[$mataaux][$a].'">'.$_SESSION[$mataaux][$a].'</option>';
                      
                      }
                    }
                  ?>
                </select>


                <br><label for="cant_prod" >Cantidad de producto: </label>
                    <input type="number" size="40" min="1" max="1000" name="cant_prod" required="" min="1" >
                  
              <div class="col-md-12 mt-4">
              <table class="table table-striped table-bordered bg-white table-sm">
                <caption> </caption>
                  <thead class="thead-dark">
                    <tr>
                        <th id="camion">Cami&oacuten</th>
                        <th id="punto">Punto de Venta</th>
                        <th id="cantidad">Cantidad de producto</th>
                    </tr>
                  </thead>
                    <?php

                  $sql3 ="SELECT * from PuntosVentas$centro";
                  $result=mysqli_query($conexion,$sql3);
                  $cant_prod=0;
                  $contador=0;
                  while($mostrar=mysqli_fetch_array($result))
                  {
                      $contador++;
                      $cant_prod = $cant_prod + $mostrar['Cant_prod'];
                      
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $centro?></td>
                      <td><?php echo $mostrar['NumeroIdentificador']?></td>
                      <td><?php echo $mostrar['Cant_prod']?></td>
                    </tr>
                  </tbody>
                  <?php
                  }

                  if($cant_prod<1000){
                  ?> 
                  <div class="container">
                    <div class="form-group pt-3 justify-content-center"> 
                      <button type="submit" name="boton" class="btn btn-secondary">Añadir Punto de venta</button>
                    </div>
                  </div>
                  <?php
                  }

                  ?>
                </table>
              </form>
              
            </div>
      
            


            <?php
                      
                    if($cant_prod<=1000){
                      if($contador>=2){

                      ?>

                        <form action="distancias.php" method="POST">
                          <?php
                          
    
                          ?>
                        <input type="hidden" name="cant_prod" value="<?php echo $cant_prod?>">
                        <input type="hidden" name="centro_dib" value="<?php echo $centro ?>">
                        <input type="submit" class="btn btn-secondary" name="boton3" value="Generar Ruta más eficiente">
                        </form>
                         

                      <?php
                      }
                    }
                    else{

                      if($cant_prod>1000){
                        echo" <script>
                              alert('Error, los productos distribuidos superan los 1000 unidades, los puntos de venta se eliminarán.')
                              </script>
                              ";
                        
                          $_SESSION[$mataaux]=$_SESSION['arreglo'];


                        $sql4="TRUNCATE TABLE PuntosVentas$centro";
                        $conexion->query($sql4);

                        echo '<form action="planificacion.php" method="POST">
                              <input type="hidden" name="cant_producto" value="'.$cant_prod.'">
                              <input type="hidden" name="centro_dib" value="'.$centro.'">
                              <input type="submit" name="boton2" class="btn btn-secondary" value="Refrescar">
                              </form>';
                      }
                      
                  }
                
                ?>
      </div>
    </div>
                  

</html>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c8152ea011.js" crossorigin="anonymous"></script>
        <!-- Script para carrusel -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
</body>