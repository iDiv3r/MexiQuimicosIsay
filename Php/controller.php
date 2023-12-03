        
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



// CRUD Quimicos ------------------------------------------------------------------------------------------------------------------------------

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

//Eliminar quimico de la base de datos
if (isset($_POST['btnEliminarQuimico'])) {

    $txtIdQuimico = $_POST['txtIdQuimico'];

    $status = eliminarQuimico($txtIdQuimico); 

    if ($status == 1) {

        echo "<script>alert('Producto eliminado correctamente');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    } else {

        echo "<script>alert('Error al eliminar el producto');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    }
    
}

//Actualizar quimico de la base de datos
if(isset($_POST['btnActualizarQuimico'])){

    $txtIdQuimico = $_POST['txtIdQuimico'];

    $nombre = $_POST['txtNombreEdit'];   
    $fecha = $_POST['txtFechaEdit'];
    $precio = $_POST['txtPrecioEdit'];
    $costoMay = $_POST['txtCostoMayEdit'];
    $costoMen = $_POST['txtCostoMenEdit'];
    $cantidad = $_POST['txtCantidadEdit'];

    $status = actualizarQuimico($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $txtIdQuimico);

    if ($status == 1) {

        echo "<script>alert('Producto actualizado correctamente');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    } else {

        echo "<script>alert('Error al actualizar el producto');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    }

}

// Vender quimico
if(isset($_POST['btnVenderQuimico'])){

    if($_POST['txtCliente'] && $_POST['txtCantidadVt'] && $_POST['selTipoVt'] && $_POST['txtFechaVt']){

        $cantidadSol = $_POST['txtCantidadVt'];
        $cantidadDisp = $_POST['txtCantidadDisp'];

        $tipoVenta = $_POST['selTipoVt'];
        
        $costoMay = $_POST['txtCostoMayVt'];
        $costoMen = $_POST['txtCostoMenVt'];

        $nombreP = $_POST['txtNombreVt'];
        $cliente = $_POST['txtCliente'];
        $fecha = $_POST['txtFechaVt'];
        $id = $_POST['txtIdQuimico'];

        $total = ($tipoVenta == "Mayoreo") ? ($costoMay * $cantidadSol) : ($costoMen * $cantidadSol);
        

        if($cantidadSol <= $cantidadDisp){
            $cantidadRestante = ($cantidadDisp - $cantidadSol);

            $status1 = guardarVenta($cliente, $fecha, $tipoVenta, $nombreP, $cantidadSol, $total);
            $status2 = venderQuimico($cantidadRestante, $id);

            if($status1 == 1){
                if($status2 == 1){

                    echo "<script>alert('La venta se realizó correctamente');</script>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

                } else {
                    echo "<script>alert('Error al realizar la venta');</script>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";
                }

            } else {
                echo "<script>alert('Error al guardar la venta en BD');</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='10; URL=../vistas/inventarioQuimicos.php'>";
            }


        } else {
            echo "<script>alert('No puede vender una cantidad mayor a la disponible');</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";
        }
        
    } else {

        echo "<script>alert('Por favor, llena todos los campos');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    }

}

// CRUD Materiales ------------------------------------------------------------------------------------------------------------------------------

// Guardar material nuevo en base de datos
if(isset($_POST["btnGuardarMaterial"])) {

    $nombre = $_POST['txtNombreAdd'];    
    $fecha = $_POST['txtFechaAdd'];
    $precio = $_POST['txtPrecioAdd'];
    $costoMay = $_POST['txtCostoMayoreoAdd'];    
    $costoMen = $_POST['txtCostoMenudeoAdd'];
    $cantidad = $_POST['txtCantidadAdd'];
    
    $status = guardarMaterial($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad);

    if ($status == 1) {

        echo "<script> alert('Material guardado correctamente')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";
    }
    else{

        echo "<script> alert('Error al guardar material')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    }
    
} 

//Eliminar material de la base de datos
if (isset($_POST['btnEliminarMaterial'])) {

    $txtIdMaterial = $_POST['txtIdMaterial'];

    $status = eliminarMaterial($txtIdMaterial); 

    if ($status == 1) {

        echo "<script>alert('Material eliminado correctamente');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    } else {

        echo "<script>alert('Error al eliminar el producto');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    }
    
}

//Actualizar material de la base de datos
if(isset($_POST['btnActualizarMaterial'])){

    $txtIdMaterial = $_POST['txtIdMaterial'];

    $nombre = $_POST['txtNombreEdit'];   
    $fecha = $_POST['txtFechaEdit'];
    $precio = $_POST['txtPrecioEdit'];
    $costoMay = $_POST['txtCostoMayEdit'];
    $costoMen = $_POST['txtCostoMenEdit'];
    $cantidad = $_POST['txtCantidadEdit'];

    $status = actualizarMaterial($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $txtIdMaterial);

    if ($status == 1) {

        echo "<script>alert('Material actualizado correctamente');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    } else {

        echo "<script>alert('Error al actualizar el material');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    }

}

// Vender material
if(isset($_POST['btnVenderMaterial'])){

    if($_POST['txtCliente'] && $_POST['txtCantidadVt'] && $_POST['selTipoVt'] && $_POST['txtFechaVt']){

        $cantidadSol = $_POST['txtCantidadVt'];
        $cantidadDisp = $_POST['txtCantidadDisp'];

        $tipoVenta = $_POST['selTipoVt'];
        
        $costoMay = $_POST['txtCostoMayVt'];
        $costoMen = $_POST['txtCostoMenVt'];

        $nombreP = $_POST['txtNombreVt'];
        $cliente = $_POST['txtCliente'];
        $fecha = $_POST['txtFechaVt'];
        $id = $_POST['txtIdMaterial'];

        $total = ($tipoVenta == "Mayoreo") ? ($costoMay * $cantidadSol) : ($costoMen * $cantidadSol);
        

        if($cantidadSol <= $cantidadDisp){
            $cantidadRestante = ($cantidadDisp - $cantidadSol);

            $status1 = guardarVenta($cliente, $fecha, $tipoVenta, $nombreP, $cantidadSol, $total);
            $status2 = venderMaterial($cantidadRestante, $id);

            if($status1 == 1){
                if($status2 == 1){

                    echo "<script>alert('La venta se realizó correctamente');</script>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

                } else {
                    echo "<script>alert('Error al realizar la venta');</script>";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";
                }

            } else {
                echo "<script>alert('Error al guardar la venta en BD');</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='10; URL=../vistas/inventarioMateriales.php'>";
            }


        } else {
            echo "<script>alert('No puede vender una cantidad mayor a la disponible');</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";
        }
        
    } else {

        echo "<script>alert('Por favor, llena todos los campos');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioMateriales.php'>";

    }

}