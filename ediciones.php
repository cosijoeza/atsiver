<!DOCTYPE html>
<html class="h-100">
 	<head>
      <title>Universo Estudiantil</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fontawesome-all.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
  		<link rel="icon" href="imgs/favicon1.ico">
        <script src="js/jquery.min.3.2.1.js"></script>
    	<script src="js/bootstrap.bundle.min.js"></script>
  	</head>

  	<body class="bg4 h-100">
        <?php
            include('util/util.php');
            crearNavbar(3);
            $con = conectarse();
        ?>

    	<!-- Contenido -->
    	<div id="main" class="container-fluid h-100">
        	<!-- Peliculas -->
            <div class="row px-4 pt-4 justify-content-around">
            	<?php    
                    $query = "SELECT numero, publicacion, total_pags FROM revista ORDER BY numero";
                    $result = mysqli_query($con, $query);
                    if(!$result){
                        echo "ERROR AL OBTENER DATOS";
                    }
                    else{             
                        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                            echo 
                            "<div class='col-10 col-md-6 col-lg-4 pb-4'>
                                <div class='card card-shadow'>
                                    <a href='revista.php?rev=".$row[0]."&pags=".$row[2]."'><img class='card-img-top' src='pags/".$row[0]."/1.jpg' alt='404' ></a>
                                    <div class='card-footer'>
                                        <h5 class='mb-0 text-center'><a class='text-dark text-uppercase' href='revista.php?rev=".$row[0]."&pags=".$row[2]."'>".$row[1]."</a></h5>
                                    </div>    
                                </div>
                            </div>";
                        }
                    }
                    $con->close();
                ?>
      		</div>
    	</div>

        <!-- Footer -->
    	<?php
            crearFooter(false);
        ?>
  	</body>
</html>
