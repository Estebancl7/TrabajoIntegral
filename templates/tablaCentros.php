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

  
  
      <h2 class="text-center display-4 pt-5">Informaci&oacuten de la Base de Datos</h2>
    
      <div class="container">
      <h1 class="divider"></h1>
        <div class="col-md-12 pl-2 mt-0">

        <table class="table table-bordered bg-white"> <caption> </caption>
            <thead class="thead-dark">
                <tr class="text-center">
                    <th id="Centros" class="">Centros de Distribuci&oacuten</th>
                    <th id="Identificador" class="">N&uacutemero de centro</th>
                    <th id="Camiones" class="">Cami&oacuten</th>
                </tr>
              </thead>
                <?php


                session_start();
                include "conexion.php";

              
                $sql2 ="SELECT * from datoslocales where TipoLocal='P'";
                $result=mysqli_query($conexion,$sql2);

                $num='NumeroIdentificador';
                $arre='arreglo';

                if($_SESSION['cant_pv']==0)
                {
                  while($mostrar2=mysqli_fetch_array($result))
                  {
                    array_push($_SESSION[$arre],$mostrar2[$num]);
                  }
                  $_SESSION['mataaux']=$_SESSION[$arre];
                  $_SESSION['cant_pv']=count($_SESSION[$arre]);
                }

                $sql ="SELECT * from datoslocales where TipoLocal='C'";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    
                ?>
                    
                    <tbody>
                    
                    <tr class="text-center">
                        <td><?php echo $mostrar['TipoLocal']?></td>
                        <td><?php echo $mostrar[$num]?></td>
                        
                        <td>

                        <form action="planificacion.php" method="POST">
                        
                        <?php
                          
                          echo "<input type='hidden' name='cant_pv' value='".count($_SESSION[$arre])."'>";


                          for($a=0;$a<count($_SESSION[$arre]);$a++)
                          {
                            if(isset($_SESSION[$arre][$a]))
                            {
                              echo "<input type='hidden' name='pto_venta".$a."' value='".$_SESSION[$arre][$a]."'>";
                            }
                          }



                        ?>
                        <input type="hidden" name="centro_dib" value="<?php echo $mostrar[$num]?>">
                        <input type="submit" class="btn btn-secondary" value="Crear Ruta" > Para el cami&oacuten N° <?php echo $mostrar[$num] ?>
                        
                        </td>
                        
                      </form>
                    </tr>
                    <?php
                }
              
                ?>

                  <br><br>
                          
            </tbody>
        </table>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <table class="table table-striped table-bordered bg-white table-sm"> <caption> </caption>
            <thead class="thead-dark">
                  <tr class="text-center">
                    <th id="puntos">Puntos de venta</th>
                    <th id="identificador">N&uacutemero del Punto</th>

                   </tr>
                  <?php
                    $sql2 ="SELECT * from datoslocales where TipoLocal='P'";
                    $result=mysqli_query($conexion,$sql2);
                    while($mostrar2=mysqli_fetch_array($result)){
                      $num_camion=1;

                    ?>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td><?php echo $mostrar2['TipoLocal']?></td>
                        <td><?php

                        
                        echo $mostrar2[$num];

                       
                  
                        ?></td>
                    </tr>
                    <?php
                    }

                  ?>
            </tbody>
          </table>
        </div>
        <div class="col-4"></div>
      </div>
    </div>

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