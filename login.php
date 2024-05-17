<?php
include 'conexion/conexion.php';
$db=new Conect_MySql();
if(isset($_POST['registrarse'])){
    
    $sql="INSERT INTO `usuarios`(`usuario`, `email`, `password`, `admin`) VALUES ('".$_POST['usu']."','".$_POST['email']."','".$_POST['pass']."','no')";
    $res = $db->execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img_fem/logo-clima.png" type="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
    <title>SKYBLUE</title>
</head>
<body>
    <!--Video de fondo-->
	<div class="video-container">
        <video autoplay muted loop class="video">
            <source src="video/clima.mp4" type="video/mp4">
        </video>
	</div>
    <div class="login-container">
        <div class="container-form register">
                <div class="information">
                    <div class="info-childs">
                        <h2>Bienvenido</h2>
                        <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus 
                        datos</p>
                        <input type="button" value="Iniciar Sesión" id="sign-in">
                    </div>
                </div>
                <div class="form-information">
                    <div class="form-information-childs">
                        <h2>Crear una cuenta</h2>
                        <div class="icons">
                            <!--<i class='bx bxl-google'></i>
                            <i class='bx bxl-facebook-circle'></i>
                            <i class='bx bxl-github'></i>-->
                        </div>            
                        <p>Usa tu email para registrarte</p>
                        <form class="form" method="post" action=""> 
                            <label>
                                <i class='bx bx-user' ></i>
                                <input name="usu" type="usuario" placeholder="Usuario">
                            </label>
                            <label>
                                <i class='bx bx-envelope' ></i>
                                <input name="email" type="email" placeholder="Correo Electronico">
                            </label>
                            <label>
                                <i class='bx bx-lock-alt' ></i>
                                <input name="pass" type="password" placeholder="Contraseña">
                            </label>
                            <input type="submit" value="Registrarse" name="registrarse">
                        </form>
                    </div>
                </div>
        </div>





        <div class="container-form login hide">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido nuevamente!</h2>
                    <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus 
                    datos</p>
                    <input type="button" value="Registrarse" id="sign-up">
                </div>
            </div>
            <div class="form-information">
                <div class="form information-childs">
                    <h2>Iniciar Sesión</h2>
                    <div class="icons">
                        <!--<i class='bx bxl-google'></i>
                        <i class='bx bxl-facebook-circle'></i>
                        <i class='bx bxl-github'></i>-->
                    </div>
                    <p>Iniciar sesión con una cuenta</p>
                    <form method="post" action="validar.php" class="form">
                        <label>
                        <i class='bx bx-user' ></i>
                            <input name="usu" type="usuario" placeholder="Usuario">
                        </label>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input name="pass" type="password" placeholder="Contraseña">
                        </label>
                        <input type="submit" value="Iniciar Sesión">
                    </d>
                </div>
            </div>
        </div>
    </div>
<script src="script1.js"></script>
</body>
</html>