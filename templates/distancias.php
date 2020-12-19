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

              include "conexion.php";
              session_start();


              if(isset($_POST['boton3'])){
                $_SESSION['arreglo']=$_SESSION['mataaux'];
              }


              $C=$_POST['centro_dib'];
              $matriz=array();
              $puntosventas= array();
              $arrayX=array();
              $arrayY=array();
            ?>

            <h2 class="">Hoja de ruta para el camión N°<?php echo $C ?></h2>
            <h1 class="divider mx-5 mb-3"></h1>
            <?php

          
                $sql3= "SELECT X from locales WHERE NumeroIdentificador=$C ";
                $sql4= "SELECT Y from locales WHERE NumeroIdentificador=$C ";

                $result1C=mysqli_query($conexion,$sql3);
                $result2C=mysqli_query($conexion,$sql4);
                
                while($mostrar=mysqli_fetch_array($result1C))
                {
                    if($mostrar2=mysqli_fetch_array($result2C))
                    {
                      

                        array_push($arrayX,$mostrar['X']);
                        array_push($arrayY,$mostrar2['Y']);
                    }
                }

                array_push($arrayX,0);
                array_push($arrayY,0);
              



                $sql="SELECT NumeroIdentificador FROM PuntosVentas$C";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result))
                {
                    array_push($puntosventas,$mostrar['NumeroIdentificador']);
                }


                $cant_PV=count($puntosventas) + 2;
              
                for($a=0;$a<count($puntosventas);$a++)
                {   
                    $num=$puntosventas[$a];
                    
                    $sql1= "SELECT X from locales WHERE NumeroIdentificador=$num ";
                    $sql2= "SELECT Y from locales WHERE NumeroIdentificador=$num ";

                    $Xp=mysqli_query($conexion,$sql1);
                    $Yp=mysqli_query($conexion,$sql2);


                    while($mostrar3=mysqli_fetch_array($Xp))
                    {
                        if($mostrar4=mysqli_fetch_array($Yp))
                        {               
                            array_push($arrayX,$mostrar3['X']);
                            array_push($arrayY,$mostrar4['Y']);
                        }
                    }                    
                }

                for($a=0;$a<$cant_PV;$a++)
                {
                    for($b=0;$b<$cant_PV;$b++)
                    {
                        if($a==$b)
                        {
                            $matriz[$a][$b]= 0 ;
                        }
                        else{
                            $var= distancia($arrayX[$a],$arrayY[$a],$arrayX[$b],$arrayY[$b]);
                            $matriz[$a][$b]=$var;
                        }
                    }
                }

                $aux=array ();
                array_push($aux,$C);
                array_push($aux,0);

                for($a=0;$a<count($puntosventas);$a++)
                {
                  array_push($aux,$puntosventas[$a]);
                }

                function distancia($ix,$iy,$fx,$fy)
                {
                    $iniciox = $ix;
                    $inicioy = $iy;
                    $finalx = $fx;
                    $finaly = $fy;
                    $cuadradox = pow($finalx - $iniciox,2);
                    $cuadradoy = pow($finaly - $inicioy,2);
                    
                    return number_format(sqrt($cuadradox+$cuadradoy), 5, '.', '');
                }
                for($m=0;$m<count($aux);$m++){
                    array_unshift($matriz[$m],$aux[$m]);
                }
                $ruta=rutas($matriz);
                echo "<h4>Distancia estimada a recorrer: $ruta[1] [Km]</h4>";
                
      
                function rutas($matriz)
                {
                  $pa=1;
                  $i=array($matriz[0][0],$matriz[1][0]);
                  $k=2*($matriz[0][2]);
                  while(compruebas($matriz,$i)){
                      $dm=99999;
                      for($m=3;$m<count($matriz[$pa-1]);$m++){
                          if($dm>$matriz[$pa-1][$m] && $matriz[$pa-1][$m]!=0 && !in_array($matriz[$m-1][0],$i)){
                              $dm=$matriz[$pa-1][$m];
                              $pa1=$m;
                          }
                      }
                      $pa=$pa1;
                      $coef=9999;
                      for($c=0;$c<count($i);$c++){
                          $coefa=$matriz[buscapos($i[$c],$matriz)][$pa]+
                                  $matriz[buscapos($i[$c+1],$matriz)][$pa]-
                                  $matriz[buscapos($i[$c],$matriz)][buscapos($i[$c+1],$matriz)+1];
                          if($coef>$coefa){
                              $coef=$coefa;
                              $pos=$c+1;
                          }
                          if($c+2==count($i)){
                              break;
                          }
                      }
                      $k+=$coef;
                      $aux=0;
                      $iaux=array();
                      for($w=0;$w<=count($i);$w++){
                          if($pos==$w){
                              array_push($iaux,$matriz[$pa-1][0]);
                          }
                          else{
                              array_push($iaux,$i[$aux]);
                              $aux++;
                          }
                      }
                      $i=$iaux;
                  }
                  array_unshift($i,$i[count($i)-1]);
                  return array($i,$k);
                }

                function compruebas($matriz,$i){
                    for($m=0;$m<count($matriz);$m++){
                        if(!in_array($matriz[$m][0],$i)){
                          return true;
                        }
                    }
                    return false;
                }
                function buscapos($a,$matriz){
                    for($i=0;$i<count($matriz);$i++){
                        if($matriz[$i][0]==$a){
                            return $i;
                        }
                    }
                }
            ?> 
            
            <br><table class="table table-striped table-bordered bg-white table-sm"> <caption>  </caption>
              <thead class="thead-dark">
                <tr>
                  <th id="Secuencia" class="text-center pl-2 pr-3">Instrucci&oacuten</th>
                  <th id="tipo" class="text-center pl-2 pr-3">Tipo Local</th>
                  <th id="Identificador" class="text-center pl-2 pr-3">Número Identificador</th>
                  <th id="Accion" class="text-center pl-2 pr-3">Acción</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>D </td>
                  <td>0</td>
                  <td>Se lleva cami&oacuten a zona de carga</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>C</td>
                  <td><?php echo $C?></td>
                  <td>Se carga con <?php echo $_POST['cant_prod']?> productos</td>
                </tr>
                <?php
                $sql2 ="SELECT * from PuntosVentas$C ";
                        $result=mysqli_query($conexion,$sql2);
                        $cont=2;
                        while($mostrar2=mysqli_fetch_array($result)){
                              
                        ?>
                        </thead>
                        <tbody>
                        <tr> 
                          <td><?php echo$cont +1; ?></td>
                            <td>P</td>
                            <td><?php echo $ruta[0][$cont]?></td>
                            <td>Deja <?php echo $mostrar2['Cant_prod']?> productos</td>
                            
                  
                        </tr>
                  <?php
                        $cont++;
                        }
                  ?>  
                  <tr>
                    <td><?php echo $cont+1; ?></td>
                    <td>D</td>
                    <td>0</td>
                    <td>Se estaciona el camión</td>
                  </tr>
              </tbody>
              
            </table>

            <?php
              echo '<div class="container">
              
                
                  <h6 class="text-center"><strong>Importante!</strong></br> Recuerda que debes seguir la ruta tal cual sale en la planilla para as&iacute trabajar sobre la ruta m&aacutes corta</h6>
                
              
              </div>';
            ?> 

            
            <form action="futurapag.php">
              <input type="submit" class="btn btn-secondary" value="Crea otra ruta para un camión diferente">
              </form>
        
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