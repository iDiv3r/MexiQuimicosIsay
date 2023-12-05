<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Login MEXQUIMICOS</title>     
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/index.css"> 
    </head>
    <body>
        <div id="contenedor">
            <h1 class="titulo">MEXQUIMICOS</h1>
            <img src="../img/L1.png" alt="logo" class="logo">
            <div id="central">
                <div id="login">
                    <form action="../php/controller.php" method="post">
                        <input type="text" name="txtCorreo" placeholder="Usuario" required>
                        <input type="password" placeholder="Contraseña" name="txtPass" required>
                        <button type="submit" title="Ingresar" name="btnIng">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="../vistas/registrarUsuarios.php">¿No tienes cuenta?, Registrate</a>
                    </div>
                </div>
            </div>
            <img src="../img/L2.png" alt="logo" class="logo">
        </div>     
    </body>
</html>


