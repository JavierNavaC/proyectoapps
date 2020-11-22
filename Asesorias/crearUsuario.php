<?php
	$usuario1 = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "asesorapp";

	$nombre = $_POST['nombre'];
	$apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $pass = $_POST['pass'];
	$correo = $_POST['correo'];

	$conexion = mysqli_connect( $servidor, $usuario1, $password) or die ("No se ha
	podido conectar al servidor de Base de datos");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    $sql = "INSERT INTO usuarios (correo,nombre, apellidop, apellidom, pass)".
	"VALUES ('$correo','$nombre', '$apellidop', '$apellidom', '$pass')";
	if(mysqli_query($conexion, $sql)){
		session_start();
	    $_SESSION["usuario"] = $correo;
	    header("Location: bienvenida.html");
		echo "Se creó satisfactoriamente";
	}
	else{
		echo "La neta la estás cagando" .mysqli_error($conexion);
	}
//	if (mysqli_query($conexion, $sql)) {
//	    echo "New cliente created successfully";
//		    session_start();
//		    $_SESSION["usuario"] = $usuario;
//			header("Location: views/cliente/Cliente.php");
//	    } else {
//			echo "Error1: " . mysqli_error($conexion);
//	}
//    $id= $id+1;
    mysqli_close($conexion);
?>
