<!DOCTYPE html>
<html>
    <head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css"></head>
    <body>
        <?php
			$user= "root";
			$pass = "";
			$host= "localhost";
			$db_nombre = "web";

			$connection = @mysqli_connect($host, $user, $pass, $db_nombre);

	if (!$connection) {
		echo "Connection failed!";
	}else{
			
				$usuario = $_POST['usuario'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$fechaNacimiento = $_POST['fechaNacimiento'];
				
				$insercion = "INSERT INTO usuarios (usuario,email,password,fechaNacimiento) VALUES ('$usuario','$email','$password'," . ($fechaNacimiento==NULL ? "NULL" : "'$fechaNacimiento'") . ")";
				$resulInsertar = mysqli_query($connection,$insercion);
				
				if($resulInsertar){
					echo "Haga clic en el siguiente botón para volver atrás";
					echo "<p><a href=\"index.php\" class=\"botonazul\">Usuario registrado con éxito</a></p>";
				}else{
					echo "Haga clic en el siguiente botón para volver atrás";
					echo "<p><a href=\"index.php\" class=\"botonazul\">No se ha podido registrar</a></p>";
				}
	}
			mysqli_close($connection); //Cerrar la conexión a la base de datos
			/*if(isset($_POST['submit'])){
				header('Location: bbdd.php');
			}*/
		?>
     </body>
</html>
