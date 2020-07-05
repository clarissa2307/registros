<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/estilos.css">
	<title>Iniciar Sesión</title>
</head>
<body>
<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		<hr class="border">
		
        <form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>
            
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
                <i class="submit-btn fa fa-user" onclick="login.submit()"></i>
            </div>
            <?php if(!empty($errores)): ?> 
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <p class="texto-registrate">
            ¿ Aun no tienes cuenta ? 
            <a href="registrate.php">Registrate</a>
        </p>
	</div>
</body>
</html>


