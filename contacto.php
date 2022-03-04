<?php 
	session_start();
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])) {
	include('db_conn.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contacto</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<form action="" method="post">
			<h2>Contacte con nosotros</h2>

			<label>USUARIO</label>
			<p><?php echo $_SESSION['usuario']; ?></p><br>
			<label>EMAIL</label>
			<p><?php echo $_SESSION['email']; ?></p><br>
			<label>MENSAJE</label>
			<p><textarea name="mensaje" cols="45" rows="6" maxlength="255" required ></textarea></p><br><br>
			<input type="submit" name="enviar" />
				<p><a href="homeusuario.php" class="botonazul">Volver</a></p>
		</form>
		
		<br /><br />
		
		<?php
			if(isset($_POST['enviar'])){
				$usuario = $_SESSION['usuario'];
				$email = $_SESSION['email'];
				/*echo htmlspecialchars($_POST['mensaje']);*/
				$mensaje = $_POST['mensaje'];
				
				$insersion = "INSERT INTO contacto (usuario,email,mensaje) VALUES ('$usuario','$email','$mensaje')";
				$resulInsersion = mysqli_query($connection,$insersion);
				
				if($resulInsersion){
					echo "Mensaje enviado exitosamente<br />";
				}else{
					echo "No se ha podido enviar el mensaje<br />";
				}
			}
			mysqli_close($connection); //Cerrar la conexión a la base de datos
			}else{
			header("Location: index.php");
		exit();
	}	
		?>
     
	</body>
</html>