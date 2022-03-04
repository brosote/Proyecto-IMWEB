<?php 
	session_start();
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Buenas, <?php echo $_SESSION['usuario']; ?> , ¿Qué desea hacer?</h1>
		<p><a href="contacto.php" class="botonazul">Contacto</a></p>
		<p><a href="logout.php" class="botonrojo">Cerrar sesión</a></p>
	</body>
</html>

<?php 
	}else{
		header("Location: index.php");
		exit();
	}
 ?>