<?php
    include('util/util.php');
    if(isset($_POST['num'])){
    	$conn = conectarse();
    	mysqli_query($conn,"INSERT INTO revista(numero, publicacion, total_pags) VALUES(".$_POST['num'].",'".$_POST['pub']."',".$_POST['tp'].")");
    	mysqli_query($conn,"INSERT INTO contador(revista, meGusta, noMeGusta) VALUES(".$_POST['num'].",0,0)");
		$conn->close();
		header("location: .");	
    }
    
    if(!isset($_GET['p']) || $_GET['p']!="ue-2018"){	
    	header("location: .");
    }
    crearNavbar(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nueva edición</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
	<link rel="icon" href="imgs/favicon.png">
    <script src="js/jquery.min.3.2.1.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div id="main" class="container-fluid h-100">
		<div class="row">
			<div class="col-2 mx-auto mt-4">
				<form method="post">
					<div class="form-group">
						<label class="text-light" for="num">Numero</label>
						<input class="form-control" name="num" required>
					</div>
					<div class="form-group">
						<label class="text-light" for="pub">Publicación</label>
						<input class="form-control" name="pub" required>
					</div>
					<div class="form-group">
						<label class="text-light" for="tp">Páginas</label>
						<input class="form-control" name="tp" required>
					</div>  
			  		<button type="submit" class="btn btn-primary">OK</button>
				</form>
			</div>
		</div>
	</div>
	<?php
		crearFooter(false);
	?>
</body>
</html>