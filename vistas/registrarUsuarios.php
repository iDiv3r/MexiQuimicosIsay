<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Registro</title>
<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="../css/Usuario.css"> </head>
<body>



<div id="contenedor">
<h1 class="titulo">Registro</h1>
    <div id="central">
        <div id="login">
            <form action="../php/controller.php" method="POST">
                <input class="form-control" type="text" name="txtCorreo" placeholder="Usuario" aria-label="default input example" >
                <div style="margin-bottom: 10px;"></div><input class="form-control" type="password" placeholder="Contraseña" name="txtPass" aria-label="default input example" required >                       
                <div style="margin-bottom: 10px;"></div><input class="form-control" type="password" placeholder="Repetir Contraseña" name="txtCpass" aria-label="default input example" required>
                <button type="submit" title="Ingresar" name="btnGuardarUser">Registrar</button>
            </form>
            <div class="pie-form">
                    <a href="../vistas/index.php">Ya tienes cuenta?, Inicia sesión</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>