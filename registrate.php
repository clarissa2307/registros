<?php session_start();
if (isset($_SERVER['usuario'])) {
    header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var (strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    
    $errores = "";

    if (empty($usuario) or empty($password) or empty($password)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=logit', 'root', '');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $statemet = $conexion->prepare('SELECT * FROM  usuarios WHERE usuario = :usuario LIMIT 1');
        $statemet->execute(array(':usuario' => $usuario));
        $resultado = $statemet->fetch();
        
        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }
        
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);
        
       if ($password != $password2) {
           $errores .= '<li>Las contraseñas no son iguales</li>';
       }

    }
    if ($errores == '') {
        $statemet = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statemet->execute(array(
            ':usuario' => $usuario,
            ':pass' => $password
        ));
        header('Location: login.php');

    }

}

require 'views/registrate.view.php';
?>