<!DOCTYPE html>
<html>
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="imgs/favicon.ico">

    	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <link href="css/fontawesome-all.css" rel="stylesheet">
        <link href="css/fuentes.css" rel="stylesheet">
        
        <script type="text/javascript" src="js/jquery.min.3.2.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script src="js/popper.min.js"></script>
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
            <!--IMAGEN PRINCIPAL-->
      		<div class="row">
                <div class='col-lg-6 col-md-6 col-sm-12 mx-auto mt-3'>
                    <div class="card" id = 'tarjeta-portada'>
                        <div class="card-header main-card">
                            <a class="text-resp" style="font-family: 'Montserrat Medium';text-transform: uppercase;"><b><?php echo $revista[1]; ?></b></a>
                        </div>
                        <div class="card-body text-center">
                            <a href="revista.php">
                                <img id='portada' class='img-fluid rounded mb-3 mx-auto' src=<?php echo "'pags/".$revista[0]."/1.jpg'"; ?> alt='404'>
                            </a>
                        </div>
                        <div class="card-footer main-card text-center pt-0"></div>
                    </div>
                </div>
            </div>
            <!--CARRUSEL-->
            <div class="row" name = "nosotros" id="nosotros">
                <div id="carouselExampleFade" class="carousel slide carousel-fade banners" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="imgs/Banner_1.png" class="d-block w-100 banners" alt="...">
                        <div class = "text-banner b1"><p class="pad-90 letters-bann-1"><b>UNIVERSO ESTUDIANTIL</b><br />Es un espacio de información<br />hecho para jóvenes por jóvenes</p></div>
                        </div>
                        <div class="carousel-item">
                        <img src="imgs/Banner_2.png" class="d-block w-100 banners" alt="...">
                        <div class = "text-banner b2"><p class = "letters-bann-2">Nuestra revista tiene<br />como objetivo destacar<br />el <b>talento universitario</b><br />del <b>SUNEO</b></p></div>
                        </div>
                        <div class="carousel-item">
                        <img src="imgs/Banner_3.png" class="d-block w-100 banners" alt="...">
                        <div class = "text-banner b3"><p class = "letters-bann-3"><b>Difundimos</b> entre la<br />comunidad estudiantil<br />temas académicos,<br />deportivos, culturales,<br /> sociales y de<br />entretenimiento</p></div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
<!--PATROCINADORES-->
<div class="row my-4 pad-90">
                <div class="col-sm-12 col-md-10 text-center mx-auto">
                    <div class="card text-center">
                        <div class="card-body pt-0">
                            <h2 class="text-center" style="font-size:40px;padding-top:21px;padding-bottom:37px;"><strong>NUESTROS PATROCINADORES</strong></h2>
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
            <!--CONTACTO-->
            <div class="container" id="contacto">
                <h2 style="font-size:40px;padding-top:21px;padding-bottom:37px;text-align:center;"><strong>CONTACTO / VENTAS</strong></h2>
                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2 contact-item"><i class="fas fa-envelope"></i></div>
                            <div class="col-10 contact-text"><a href="mailto:universo.utm@gmail.com"><p>universo.utm@gmail.com</p></a></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2 contact-item"><i class="fab fa-whatsapp"></i></div>
                            <div class="col-10 contact-text"><a href="tel:+529531234567"><p>+529531234567</p></a></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2 contact-item"><a href="https://www.facebook.com/UniversoEstudiantilUTM/"><i class="fab fa-facebook-square"></i></a></div>
                            <div class="col-10 contact-text"><a href="https://www.facebook.com/UniversoEstudiantilUTM/"><p class="text-center">Universo Estudiantil Revista</p></a></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2 contact-item"><i class="fab fa-instagram"></i></div>
                            <div class="col-10 contact-text"><a href="https://www.instagram.com/universoestudiantil/"><p>universoestudiantil</p></a></div>
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