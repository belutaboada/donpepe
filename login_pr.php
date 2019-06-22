<?php
	// login_pr.php
	
	//0.Conseguir los datos
	$usuario = $_POST['usuario'];
	//Comparo encriptado con encriptado
	$clave = md5($_POST['clave']);

	//1.Conectarme a la BD
	include("conexion.php");

	//2.Creamos la query
	$buscar = "SELECT * FROM usuarios
				WHERE
					usuario = '$usuario'
					AND
					clave ='$clave'";

	//3.Ejecutar
	$buscar_ej = mysqli_query(
				$conexion,
				$buscar
				);

	//4.Pregunto si No funcionó
	if ($buscar_ej === false) {
		echo "Error, ver SQL: $buscar";
	} else {
		// echo "Vas bien!";

		$cant = mysqli_num_rows($buscar_ej);
		if ($cant === 0) {
		echo "Datos incorrectos";
		} else {
		// echo "Datos correctos!!";
	
	$reg = mysqli_fetch_array($buscar_ej);
	// echo $reg['id_usuario'];

	session_start();
	//guardo el ID del usuario logueado
	$_SESSION['id'] = $reg['id_usuario'];

	// echo $_SESSION['id'];
	header("location: interno.php");


	// ----------------------- DANGER ZONE --------------------
		}

	}
?>