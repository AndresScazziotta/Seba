<?php

session_start();
if(isset($_SESSION["user_data"]))
{
	header("location:./dashboard/admin/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <title>Login de usuario</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
      
        <div class="fadeIn first">
        <img src="img/logo2.png" id="icon" alt="User Icon" />
        <h1>Gimnasio Yupanqui</h1>
        </div>
      
        <!-- Login Form -->
        <form id="frmLogin" method="POST" action="secure_login.php">
            <input type="text" id="login" class="fadeIn second" name="user_id_auth" placeholder="Usuario" required>
            <input type="text" id="password" class="fadeIn third" name="pass_key" placeholder="Contraseña" required>
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>

        <!--Remid Password-->
        <div id="formFooter">
        <a class="underlineHover" href="#" data-toggle="modal" data-target="#modalContacto">Contactar con el administrador</a>
        </div>      
    </div>
</div>


<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
          Ante cualquier consulta comunicarse al 0800-888-8080
    </div>
    </div>
</div>
</div>

    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap/popper.min.js"></script>
    <script src="public/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/usuarios/login.js"></script>    
</body>
</html>