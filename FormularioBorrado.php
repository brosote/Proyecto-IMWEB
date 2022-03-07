<?php
	session_start();
	include('db_conn.php');
	if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])) {
		if($_SESSION['tipoUsuario'] == "administrador"){
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="estilos.css">
        <meta charset="UTF-8">
        <title>Formulario de borrado</title>
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
        <h2>FORMULARIO DE BORRADO</h2>
        <h3>Introduzca el EMAIL del usuario a borrar de la base de datos</h3>
        <form action="" method="post">
            <table>
                <tr>
				<td class="etiqueta" width="300px">
					<p style="text-align:center">usuario</p>
				</td>
                <td class="campo">
                <input type="text" name="usuario" required />
                </td>
                </tr>
				<tr>
				<td class="etiqueta" width="300px">
					<p style="text-align:center">Email</p>
				</td>
                <td class="campo">
                <input type="text" name="email" required />
                </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Borrar" name="borrar" />			
        </form>
		<br /><br />
		
		<?php
			if(isset($_POST['borrar'])){
				$usuario = $_POST['usuario'];
				$email = $_POST['email'];
				
				$consulta = "SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' AND email = '$email'";
				$resulConsulta = mysqli_query($connection,$consulta);
				$comprobar = mysqli_fetch_array($resulConsulta);
				
				if (@$comprobar[0] == $email){			
					$borrado = "DELETE FROM usuarios WHERE usuario = '$usuario' AND email = '$email'";
					$resulBorrado = mysqli_query($connection,$borrado);
					echo "El usuario ha sido eliminado exitosamente";
				}else{
					echo "El usuario no se puede borrar. ¿Existe?";
				}
			}
			
			mysqli_close($connection); //Cerrar la conexión a la base de datos
			}else{
				header("Location: index.php");
				exit();
			}
			}else{
				header("Location: index.php");
			}
		?>
		<p><a href="homeAdmin.php" class="botonazul">Volver</a></p>
     </body>
</html>