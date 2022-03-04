<!DOCTYPE html>
<html>
	<head>
		<title>Inicio de sesión</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<form action="login.php" method="post">
			<h2>LOGIN</h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<label>Nombre de usuario</label>
			<input type="text" name="usuario"><br>
			<label>Contraseña</label>
			<input type="password" name="password"><br> 
			<a href="FormularioRegistro.php" class="botonazul">Registrarse</a>
			<button type="submit">Iniciar sesión</button>
		</form>
	</body>
</html>