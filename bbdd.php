<!-- SIEMPRE QUE EN UN ARCHIVO HTML EXISTA CODIGO PHP, SU EXTENSIÓN DEBE SER .PHP -->
<?php
	session_start();
	include("db_conn.php");
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])) {
	$usuarios = "SELECT * FROM usuarios";
	
	if(isset($_POST['submit'])){	
	
	// Campos de la tabla
		$usuario = $_POST['usuario'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fechaNacimiento = $_POST['fechaNacimiento'];
		
	// Variable que inserta datos
		$insercion = "INSERT INTO usuarios (usuario,email,password,fechaNacimiento) VALUES ('$usuario','$email','$password','$fechaNacimiento')";
		$resulInsertar = mysqli_query($connection,$insercion);
		
	// Borrado de la variable submit
		unset($_POST['submit']);
	
	// Nos situamos en el header de Index.php
		header('Location: bbdd.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Datos de la tabla users</title>
        <meta  name="viewport" 
            content-width=device-width, 
            user-scalable=no, 
            initial-scale=1.0, 
            maximun-scale=1.0, 
            minimun-scale=1.0">
        <link rel="stylesheet" href="estilos.css">
	</head>
	<body>
		<div class="container-table">
			<div class="table__title"> Datos de usuario </div>
			<div class="table__header">Usuario</div>
			<div class="table__header">Email</div>
			<div class="table__header">Contraseña</div>
			<div class="table__header">Tipo de usuario</div>
			<div class="table__header">Fecha de nacimiento</div>
        
			<?php 
			
				$resultado = mysqli_query($connection, $usuarios);
				
				while($row=mysqli_fetch_assoc($resultado)){ // Recoge las filas de la tabla en la base de datos seleccionada
			?>

			<div class="table__item"><?php echo $row["usuario"];?> </div>
			<div class="table__item"><?php echo $row["email"];?></div>
			<div class="table__item"><?php echo $row["password"];?></div>
			<div class="table__item"><?php echo $row["tipoUsuario"];?></div>
			<div class="table__item"><?php echo $row["fechaNacimiento"];?></div>
			
			<?php } mysqli_free_result($resultado);?> <!-- Limpiar la variable resultado que tiene el query (línea 31) -->
		</div>
	</body>
	<?php
		mysqli_close($connection); //Cerrar la conexión a la base de datos
	}else{
		header("Location: index.php");
		exit();
	}
	?>
	<p><a href="homeAdmin.php" class="botonazul">Volver</a></p>
	
</html>