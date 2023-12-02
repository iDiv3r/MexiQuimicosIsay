        
<?php

require "funcionesbd.php";

//Verificar credenciales de inicio de sesion
if (isset($_POST['btnIng'])) {
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];
    $sta = validarUser($correo,$pass);
        if ($sta == 1) {
            echo "<script> alert('Bienvenido a MEXQUIMICOS')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/menuPrincipal.php'>";
        } else{
            echo "<script> alert('Error revisa tus credenciales')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/index.php'>";
    }
}


//Guardar nuevo usuario en la base de datos
if(isset($_POST["btnGuardarUser"])) {
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];
    $passC = $_POST['txtCpass'];
    
    if($pass != $passC){
            echo "<script> alert('Las contraseñas no coinciden')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/registrarUsuarios.php'>";
    }  
    else {

        $status = guardarUsuarios($correo,$pass);

        if ($status == 1) {
            echo "<script> alert('Usuarios Guardado')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/registrarUsuarios.php'>";
        }
        else{
            echo "<script> alert('Error al guardar usuario')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/registrarUsuarios.php'>";

        }
    }
}     

// Modificar usuario de la base de datos
if (isset($_POST["btnModificarUser"])) {
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];
    $passC = $_POST['txtCpass'];
    $perfil = $_POST['selPerfil'];
            
    $status = ModificarUsers($pass, $perfil, $correo);
            
    if ($status == 1) {
        echo "<script> alert('Se guardaron los cambios')</script>"; 
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=modifUsuarios.php'>";
    } else {
        echo "<script> alert('NO pudo guardar los cambios')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=modifUsuarios.php'>";
    }}  



// Guardar quimico nuevo en base de datos
if(isset($_POST["btnGuardarQuimico"])) {

    $nombre = $_POST['txtNombreAdd'];    
    $fecha = $_POST['txtFechaAdd'];
    $precio = $_POST['txtPrecioAdd'];
    $costoMay = $_POST['txtCostoMayoreoAdd'];    
    $costoMen = $_POST['txtCostoMenudeoAdd'];
    $cantidad = $_POST['txtCantidadAdd'];
    
    $status = guardarQuimico($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad);

    if ($status == 1) {

        echo "<script> alert('Producto químico guardado correctamente')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";
    }
    else{

        echo "<script> alert('Error al guardar producto')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    }
    
} 






