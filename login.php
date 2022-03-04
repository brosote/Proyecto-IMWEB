<?php 
	session_start();
	include "db_conn.php";

	if (isset($_POST['usuario']) && isset($_POST['password'])) {
		function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }

    $usuario = validate($_POST['usuario']);
    $pass = validate($_POST['password']);

    if (empty($usuario)) {
        header("Location: index.php?error=Se requiere un nombre de usuario"); /*Si no se especifica un usuario, volvemos al header y damos este aviso*/
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=La contraseña es obligatoria"); /*Lo mismo que lo anterior pero para la contraseña*/
        exit();
    }else{
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['usuario'] === $usuario && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['tipoUsuario'] = $row['tipoUsuario'];
            if($_SESSION['tipoUsuario']=="administrador"){
				header("Location: homeAdmin.php"); 
			} else{
				header("Location: homeUsuario.php"); 
			}
            }else{
                header("Location: index.php?error=Nombre de usuario o contraseña incorrecta");
                exit();
            }
        }else{
            header("Location: index.php?error=Nombre de usuario o contraseña incorrecta");
            exit();
        }
    }
	}else{
    header("Location: index.php");
    exit();
}
?>