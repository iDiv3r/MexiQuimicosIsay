<!doctype html>
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
        
    <?php
    require "Funcionesbd.php";
    if (isset($_POST['btnIng'])) {
        $correo = $_POST['txtCorreo'];
        $pass = $_POST['txtPass'];
        $sta = validarUser($correo,$pass);
        if ($sta == 1) {
            echo "<script> alert('Bienvenido a MEXQUIMICOS')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Inicio.html'>";
        }else{
            echo "<script> alert('Error revisa tus credenciales')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.html'>";
        }
    }
    if(isset($_POST["btnGuardarUser"])) {
        $correo = $_POST['txtCorreo'];
        $pass = $_POST['txtPass'];
        $passC = $_POST['txtCpass'];
        $perfil = $_POST['selPerfil'];

        if($pass != $passC){
            echo "<script> alert('Las contraseñas no coinciden')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=FormUsuario.html'>";
        }else{
            $status = guardarUsuarios($correo,$pass,$perfil);
            if ($status == 1) {
                echo "<script> alert('Usuarios Guardado')</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=FormUsuario.html'>";
            }else{
                echo "<script> alert('Usuario no guardado')</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=FormUsuario.html'>";
            }}}

            
            if (isset($_POST["btnModificarUser"])) {
                $correo = $_POST['txtCorreo'];
                $pass = $_POST['txtPass'];
                $passC = $_POST['txtCpass'];
                $perfil = $_POST['selPerfil'];
            
                $status = ModificarUsers($pass, $perfil, $correo);
            
                if ($status == 1) {
                    echo "<script> alert('Se guardaron los cambios')</script>"; 
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ModUsuarios.html'>";
                } else {
                    echo "<script> alert('NO pudo guardar los cambios')</script>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ModUsuarios.html'>";
                }}  
    ?>    
    </body>
</html>


