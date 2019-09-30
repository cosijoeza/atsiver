<!doctype html>
<html>
<head>
	<title>Universo Estudiantil</title>
	<meta name="viewport" content="width = 1050, user-scalable = no" />
	<link rel="icon" href="imgs/favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<script type="text/javascript" src="js/controlador.js"></script>
	<!--<script type="text/javascript" src="js/jquery.min.3.2.1.js"></script>-->
	<script type="text/javascript" src="js/jquery.min.1.7.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
	<script type="text/javascript" src="js/lib/hash.js"></script>
</head>
<body>
	<!-- Barra de navegacion -->
    <?php
        include('util/util.php');
        $con = conectarse();
        if(!isset($_GET['rev'])){
        	$query = "SELECT numero, total_pags FROM revista ORDER BY numero DESC";  
			$result = mysqli_query($con, $query);
			if(!$result){
    			echo "ERROR AL OBTENER DATOS";
			}	
			else{
				$row = mysqli_fetch_array($result, MYSQLI_NUM);
				header("Location: revista.php?rev=".$row[0]."&pags=".$row[1]);
			}
        }
        crearNavbar(2);
    ?>

	<div class="">
		<div id="canvas" class="main">
			<div class="magazine-viewport" id='revista-contenedor'>
				<div class="container">
					<div class="magazine"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="divCom" class="container-fluid py-3">
		<div class='row justify-content-center'>
			<?php
  				$query = "SELECT meGusta, noMeGusta FROM contador WHERE revista = ".$_GET['rev'];  
  				$result = mysqli_query($con, $query);
    			if(!$result){
        			echo "ERROR AL OBTENER DATOS";
    			}	
    			else{
    				$row = mysqli_fetch_array($result, MYSQLI_NUM);
    				echo 
					"<div class='col-6 col-sm-4 col-md-3 text-center'>
						<a id='contMG' class='text-bold mr-1' style='font-size: 30px'>".$row[0]."</a>
						<button id='btnMG' type='button' class='btn btn-lg btn-success ml-1 mr-2' onclick='meGusta()''>
							<i class='fas fa-thumbs-up'></i>
						</button>
					</div>";
					echo
					"<div class='col-6 col-sm-4 col-md-3 text-center'>
						<a id='contNMG' class='text-bold mr-1' style='font-size: 30px'>".$row[1]."</a>
						<button id='btnNMG' type='button' class='btn btn-lg btn-danger ml-1 mr-1' onclick='noMeGusta()'>
							<i class='fas fa-thumbs-down'></i>
						</button>
					</div>";
				}
			?>
		</div>
		 
		<div id='comentario' class='row justify-content-center pt-3'>
			<div class='col-12 col-sm-8 col-md-5'>
				<div class="form-group">
					<label for='inputNombre' class='text-dark'><strong>Nombre</strong></label>
					<input id="nombre" type="text" class="form-control" name="inputNombre">
				</div>
				<div class='form-group'>
					<label for='inputComentario' class='text-dark'><strong>Comentario</strong></label>
					<textarea id="inputComentario" name='inputOpinion' class='form-control' rows='5' required></textarea>
				</div>
				<div class='form-group'>
					<button class='btn btn-sm btn-success' onclick="comentar()">OK</button>
				</div>
			</div>
		</div>
		<div class='row'>
			<div id='comentarios' class="col-12">
				<?php
	  				$queryComs = "SELECT usuario, contenido, fecha FROM comentario WHERE revista = ".$_GET['rev']." ORDER BY fecha DESC;";  
	  				$result = mysqli_query($con, $queryComs);
	    			if(!$result){
	        			echo "ERROR AL OBTENER DATOS";
	    			}
	    			else{                
	       				while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
							$fecha = date_create($row[2]);
							//date_add($fecha, date_interval_create_from_date_string('2 hours'));
	       					echo
	       					"<div class='row pt-4'> 
		       					<div class='col-12 col-md-5 mx-auto'>
									<div class='card'>
									  	<h5 class='card-header'>".$row[0]."</h5>
									  	<div class='card-body'>
									    	<p class='card-text'>".$row[1]."</p>
									  	</div>
									  	<div class='card-footer text-muted text-right'>"
	    									.date_format($fecha,'d/m/Y H:i').
	  									"</div>
									</div>
								</div>
							</div>";
	       				}
	       			}
	       			mysqli_close($con);
	  			?>
  			</div>
  		</div>
	</div>
	<div class='modal fade' id='pregunta' tabindex='-1' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'></h5>
                    <br>
                </div>
                <div class='modal-body'>
                    <div class='col-lg-12 h-100'>
                        <p>¿Eres alumno de la Universidad Tecnológica de la Mixteca?</p>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn btn-primary' onclick='setEstudiante(true)' data-dismiss='modal'>Sí</button>
                    <button class='btn btn-secondary' onclick='setEstudiante(false)' data-dismiss='modal'>No</buttons>
                </div>
            </div>
        </div>
    </div>
	<div class="row fixed-bottom pb-3 pr-3">
		<div class="col text-right">
			<a class="btn btn-info btn-md text-light btn-shadow" href="#comentario">Comentar</a>
		</div>
	</div>
	<?php
        crearFooter(false);
    ?>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    	//if(sessionStorage['utm'] == undefined){}
    		//$("#pregunta").modal('show');
	});
</script>
<script type="text/javascript" src="js/app.js"></script>
</html>