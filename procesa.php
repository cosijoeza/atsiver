<?php
	include('util/util.php');
	$con = conectarse();
	switch($_GET["op"]) {
		//Me gusta
		case 1:
			mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);
			mysqli_query($con, "UPDATE contador SET meGusta = meGusta + 1 WHERE revista = ".$_GET['rev']);
			mysqli_commit($con);
			break;
		//No me gusta
		case 2:
			mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);
			mysqli_query($con, "UPDATE contador SET noMeGusta = noMeGusta + 1 WHERE revista = ".$_GET['rev']);
			mysqli_commit($con);
			break;
		//Comentario
		case 3:
			date_default_timezone_set('America/Mexico_City');
			$fecha = Date("Y/m/d H:i:s");
			$query = "INSERT INTO comentario(usuario,contenido,fecha,revista) VALUES('".$_GET['nombre']."','".$_GET['texto']."','".$fecha."',".$_GET['rev'].")";
			echo $query;
			mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);
			mysqli_query($con, $query);
			mysqli_commit($con);
			break;
		//Alumno
		case 4:
			mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);
			mysqli_query($con, "UPDATE alumnos SET alumnos = alumnos + 1 WHERE revista = 1");
			mysqli_commit($con);
			break;
		default:
			echo "DEFAULT";
			break;
	}
	mysqli_close($con);
?>
