<?php 
	session_start();
	include "db_conn.php";
?>

<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="estilos.css">
        <meta charset="UTF-8">
        <title>
			Formulario de registro
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
        <h2>FORMULARIO DE REGISTRO</h2>
        <h3>Introduzca los datos que se piden para ingregarlos a la base de datos</h3>
        <form action="registrar.php" method="post">
            <table>
                <tr>
					<td class="etiqueta" width="300px"> 
						<p style="text-align:center">Usuario</p>
					</td>
					<td class="campo">
						<input type="text" name="usuario" required />
					</td>
                </tr>
                
				<tr>
					<td class="etiqueta">
						<p style="text-align:center">Email</p>
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
				<tr>
					<td class="etiqueta">
						<p style="text-align:center">Fecha de Nacimiento</p>
					</td>
					<td class="campo">
						<input type="date" name="fechaNacimiento" />
					</td>
                </tr>
			</table>
            <br>
            <input type="submit" value="enviar" name="submit">			
        </form>
		<p><a href="homeAdmin.php" class="botonazul">Volver</a></p>
     </body>
</html>
