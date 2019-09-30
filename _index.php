<!DOCTYPE html>
<html>
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="imgs/favicon1.ico">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/estilos.css" rel="stylesheet">
        <link href="css/fontawesome-all.css" rel="stylesheet">
        <link href="css/fuentes.css" rel="stylesheet">
  		<script type="text/javascript" src="js/jquery.min.3.2.1.js"></script>
    	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    	<title>Universo Estudiantil</title>
  	</head>

  	<body>
    	<!-- Barra de navegacion -->
    	<?php
            include('util/util.php');
            $con = conectarse();
            $query = "SELECT numero, publicacion FROM revista ORDER BY numero DESC";  
            $result = mysqli_query($con, $query);
            if(!$result){
                echo "ERROR AL OBTENER DATOS";
                exit(1);
            }
            else{
                $revista = mysqli_fetch_array($result, MYSQLI_NUM);
            }
            crearNavbar(1);
        ?>

    	<!-- Contenido -->
    	<div id="main" class="container-fluid">
      		<div class="row">
                <div class='col-lg-6 col-md-6 col-sm-12 mx-auto mt-3'>
                    <div class="card" id = 'tarjeta-portada'>
                        <div class="card-header">
                            <a class="text-resp" style="font-family: 'Amatic SC';"><strong>En portada</strong></a>
                        </div>
                        <div class="card-body text-center">
                            <img id='portada' class='img-fluid rounded mb-3 mx-auto' src=<?php echo "'pags/".$revista[0]."/1.jpg'"; ?> alt='404'>
                        </div>
                        <div class="card-footer text-center pt-0">
                            <a class="text-resp" style="font-family: 'Amatic SC'; font-size:30px;"><?php echo $revista[1]; ?></a>
                            <br>
                            <a class='btn btn-lg btn-info' href="revista.php">
                                <i class="fab fa-readme"></i>&nbsp <strong>Leer en línea</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-sm-12 col-md-10 text-center mx-auto">
                    <div class="card text-center">
                        <div class="card-img-top">
                            <i class="far fa-handshake fa-9x" style="color: rgb(5, 119, 165);" ></i>
                        </div>
                        <div class="card-body pt-0">
                            <h2 class="text-center" style="font-family: 'Amatic SC'; font-size:40px;"><strong>Nuestros patrocinadores</strong></h2>
                            <div id="carousel" class="carousel slide w-50 mx-auto" data-ride="carousel" data-interval="4000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide1.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide2.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide3.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide4.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide5.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide6.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide7.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide8.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide9.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide10.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide11.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide12.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide13.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide14.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide15.png" alt="404">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid rounded slide" src="imgs/slide16.png" alt="404">
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
                                        <span class="carousel-control-prev-icon" style="color: rgba(5, 119, 165, 0.4);"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                    <div class="card text-center px-2 pt-3 h-100">
                        <div class="card-img-top">
                            <i class="fas fa-users fa-9x mx-auto" style="color: rgb(5, 119, 165);" ></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><strong>Jóvenes</strong></h3>
                            <p class="" style="font-size:18px">
                                <strong>Universo Estudiantil</strong> es un espacio de información hecho para jóvenes por jóvenes.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                    <div class="card text-center px-2 pt-3 h-100">
                        <div class="card-img-top">
                            <i class="fas fa-rocket fa-9x mx-auto" style="color: rgb(5, 119, 165);" ></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><strong>Talento</strong></h3>
                            <p class="" style="font-size:18px">
                                Nuestra revista tiene como objetivo destacar el talento universitario.
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                    <div class="card text-center pt-3 h-100">
                        <div class="card-img-top">
                            <i class="fas fa-university fa-9x mx-auto" style="color: rgb(5, 119, 165);" ></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><strong>Comunidad</strong></h3>
                            <p class="" style="font-size:18px"><strong>Difundimos</strong> entre la comunidad estudiantil temas académicos, deportivos, culturales, sociales y de entretenimiento.</p>
                        </div>
                    </div>
                </div>
            </div>
    	</div>

    	<!-- Footer -->
    	<?php
            crearFooter(false);
        ?>
  	</body>
</html>
