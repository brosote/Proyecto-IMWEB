<?php 
	session_start();
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])) {
		if($_SESSION['tipoUsuario'] == "administrador"){
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Buenas, <?php echo $_SESSION['usuario']; ?> , ¿Qué desea hacer?</h1>
		
		<p><a href="bbdd.php" class="botonazul">Ver la base de datos</a></p>
		<p><a href="FormularioRegistro.php" class="botonazul">Insertar datos en la base de datos</a></p>
		<p><a href="CambioContraseña.php" class="botonazul">Cambiar contraseña</a></p>
		<p><a href="FormularioBorrado.php" class="botonazul">Eliminar datos de la base de datos</a></p>
		
		<p><a href="logout.php" class="botonrojo">Cerrar sesión</a></p>
	</body>
</html>

<?php 
	}else{
		header("Location: index.php");
		exit();
	}
	}else{
		header("Location: index.php");
	}
 ?>