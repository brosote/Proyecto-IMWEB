<?php 
	session_start();
	include('db_conn.php');
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])&& isset($_SESSION['tipoUsuario'])) {
?>

<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="estilos.css">
        <meta charset="UTF-8">
        <title>
			Cambio de contraseña
		</title>
        <style type="text/css">
            table, tr, td {
                border: solid 1px;
            }
            table {
                width: 80%;
            }
            .etiqueta p {
                text-align: right;
            }
            td.campo {
                width: 500px; background-color: #FCE4CA;
            }
        </style>
    </head>
    <body>
        <h2>FORMULARIO DE CAMBIO DE CONTRASEÑA</h2>
        <h3>Introduzca los datos que se piden para ingregarlos a la base de datos</h3>
        <form action="" method="post">
            <table>
               <tr>
					<td class="etiqueta">
						<p style="text-align:center">email</p>
					</td>
					<td class="campo">
						<input type="text" name="email" required />
					</td>
                </tr>
				<tr>
					<td class="etiqueta">
						<p style="text-align:center">Contraseña</p>
					</td>
					<td class="campo">
						<input type="password" name="password" required />
					</td>
                </tr>
			</table>
            <br>
            <input type="submit" value="Cambiar contraseña" name="enviar">			
        </form>
		
		<br /><br />
		
		<?php
			if(isset($_POST['enviar'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				$consulta = "SELECT email FROM usuarios WHERE email = '$email'";
				$resulConsulta = mysqli_query($connection,$consulta);
				$comprobar = mysqli_fetch_array($resulConsulta);
				
				if (@$comprobar[0] == $email){				
					$cambio = "UPDATE usuarios SET password = '$password' WHERE email = '$email'";
					$resulcambio = mysqli_query($connection,$cambio);
					echo "La contraseña se ha cambiado";
				}else{
					echo "No se ha podido cambiar la contraseña, ¿Existe el email del usuario?";
				}
			}
			
			mysqli_close($connection); //Cerrar la conexión a la base de datos
			}else{
				header("Location: index.php");
				exit();
			}
		?>
		
		<p><a href="homeAdmin.php" class="botonazul">Volver</a></p>
     </body>
</html>
