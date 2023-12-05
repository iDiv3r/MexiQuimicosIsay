        
<?php

require "funcionesbd.php";

//Verificar credenciales de inicio de sesion
if (isset($_POST['btnIng'])) {
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];

    $usuario = validarUser($correo,$pass); 
    
        if ($usuario != 0) {
            
            
            setcookie('usuario', $usuario, time()+ 86400,'/');
            setcookie('psw', $pass, time()+ 86400, '/');

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

    $usuarioAnt = $_COOKIE['usuario'];
            
    if($pass == $passC){

        $status = actualizarUsuario($correo, $pass);
            
        if ($status == 1) {
            echo "<script> alert('Se modificó el usuario correctamente')</script>"; 
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/index.php'>";

        } else {
            echo "<script> alert('Error al guardar los cambios')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/modifUsuarios.php'>";
        }

    } else{
        echo "<script> alert('Las contraseñas no coinciden')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/modifUsuarios.php'>";
    }
}  



// CRUD Quimicos ------------------------------------------------------------------------------------------------------------------------------

// Guardar quimico nuevo en base de datos
if(isset($_POST["btnGuardarQuimico"])) {

    $nombre = $_POST['txtNombreAdd'];    
    $fecha = $_POST['txtFechaAdd'];
    $precio = $_POST['txtPrecioAdd'];
    $costoMay = $_POST['txtCostoMayoreoAdd'];    
    $costoMen = $_POST['txtCostoMenudeoAdd'];
    $cantidad = $_POST['txtCantidadAdd'];
    $medida = $_POST['txtMedidaAdd'];
    
    $status = guardarQuimico($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $medida);

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
    $medida = $_POST['txtMedidaEdit'];

    $status = actualizarQuimico($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $txtIdQuimico,$medida);

    if ($status == 1) {

        echo "<script>alert('Producto actualizado correctamente');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../vistas/inventarioQuimicos.php'>";

    } else {

        echo "<script>alert('Error al actualizar el producto');</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='10; URL=../vistas/inventarioQuimicos.php'>";

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

        $clase = "Quimico";

        $total = ($tipoVenta == "Mayoreo") ? ($costoMay * $cantidadSol) : ($costoMen * $cantidadSol);
        

        if($cantidadSol <= $cantidadDisp){
            $cantidadRestante = ($cantidadDisp - $cantidadSol);

            $status1 = guardarVenta($cliente, $fecha, $tipoVenta, $nombreP, $cantidadSol, $total,$clase);
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
    $medida = $_POST['txtMedidaAdd'];
    
    $status = guardarMaterial($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $medida);

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
    $medida = $_POST['txtMedidaEdit'];

    $status = actualizarMaterial($nombre, $fecha, $precio, $costoMay, $costoMen, $cantidad, $txtIdMaterial, $medida);

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

        $clase = "Material";

        $total = ($tipoVenta == "Mayoreo") ? ($costoMay * $cantidadSol) : ($costoMen * $cantidadSol);
        

        if($cantidadSol <= $cantidadDisp){
            $cantidadRestante = ($cantidadDisp - $cantidadSol);

            $status1 = guardarVenta($cliente, $fecha, $tipoVenta, $nombreP, $cantidadSol, $total, $clase);
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

// Crear reporte general ------------------------------------------------------------------------------------------------------------------------------

function crearReporteGeneral() {

    require('../fpdf/fpdf.php');

    $resultados = consultarExistencias();
    $rutaArchivo = "../reportesGenerales/reporteGeneral-" . date("Y-m-d_H-i-s") . ".pdf";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 9);

    $pdf->Cell(0, 10, 'Listado de productos y materiales existentes', 0, 1, 'C');
    $pdf->Ln();

    $pdf->Cell(10, 10, 'ID' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Nombre' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Fecha' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Precio' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Costo May.' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Costo Men.' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Cantidad' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Clase' , 1, 0, 'C');
    $pdf->Ln();

    foreach ($resultados['quimicos'] as $quimico) {
        $pdf->Cell(10, 10, $quimico['id'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $quimico['nombre'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $quimico['fecha'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $quimico['precio'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $quimico['costomay'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $quimico['costomen'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $quimico['cantidad'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $quimico['clase'] , 1, 0, 'C');
        $pdf->Ln();
    }

    foreach ($resultados['materiales'] as $material) {
        $pdf->Cell(10, 10, $material['id'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $material['nombre'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $material['fecha'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $material['precio'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $material['costomay'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $material['costomen'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $material['cantidad'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $material['clase'] , 1, 0, 'C');
        $pdf->Ln();
    }

    $pdf->Output($rutaArchivo , 'F');
    
    return $rutaArchivo;
}


// Crear ticket ------------------------------------------------------------------------------------------------------------------------------
function crearTicket($id, $cliente, $fecha, $tipo, $producto, $clase, $cantidad, $total, $usuario){

    $rutaTicket = "../tickets/ticket-" . $cliente . "_". date("Y-m-d_H-i-s") . ".pdf";

    $pdf = new FPDF();
    $pdf->AddPage('P', [100, 150]);
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(0, 10, 'Ticket de Compra', 0, 1, 'C');
    $pdf->Ln();

    
    $pdf->Cell(50, 10, 'ID:', 0, 0, 'L');
    $pdf->Cell(140, 10, $id, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Cliente:', 0, 0, 'L');
    $pdf->Cell(140, 10, $cliente, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Fecha:', 0, 0, 'L');
    $pdf->Cell(140, 10, $fecha, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Tipo:', 0, 0, 'L');
    $pdf->Cell(140, 10, $tipo, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Producto:', 0, 0, 'L');
    $pdf->Cell(140, 10, $producto, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Clase:', 0, 0, 'L');
    $pdf->Cell(140, 10, $clase, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Cantidad:', 0, 0, 'L');
    $pdf->Cell(140, 10, $cantidad, 0, 1, 'L');
    $pdf->Cell(50, 10, 'Total:', 0, 0, 'L');
    $pdf->Cell(140, 10, '$' . number_format($total, 2), 0, 1, 'L');
    $pdf->Ln(2);
    $pdf->Cell(30, 10, 'Atendido por:', 0, 0, 'L');
    $pdf->Cell(140, 10, $usuario, 0, 1, 'L');
    
    $pdf->Output($rutaTicket , 'F');

    return $rutaTicket;
}

// Crear Reporte Ventas ------------------------------------------------------------------------------------------------------------------------------

function crearReporteVentas() {

    $resultados = consultarVentas();
    $rutaArchivo = "../reportesVentas/reporteVentas-" . date("Y-m-d_H-i-s") . ".pdf";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 9);

    $pdf->Cell(0, 10, 'Reporte de Ventas', 0, 1, 'C');
    $pdf->Ln();
    $pdf->Cell(15, 10, 'Fecha:', 0, 0, 'L');
    $pdf->Cell(10, 10, date("Y-m-d"), 0, 1, 'L');
    $pdf->Ln(2);

    $pdf->Cell(10, 10, 'ID' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Cliente' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Fecha' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Tipo' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Producto' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Clase' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Cantidad' , 1, 0, 'C');
    $pdf->Cell(25, 10, 'Total' , 1, 0, 'C');
    $pdf->Ln();

    foreach ($resultados as $venta) {
        $pdf->Cell(10, 10, $venta['id'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $venta['cliente'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $venta['fecha'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $venta['tipo'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $venta['producto'] , 1, 0, 'C');
        $pdf->Cell(25, 10,  $venta['clase'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $venta['cantidad'] , 1, 0, 'C');
        $pdf->Cell(25, 10, $venta['total'] , 1, 0, 'C');
        $pdf->Ln();
    }

    $pdf->Output($rutaArchivo , 'F');
    
    return $rutaArchivo;
}

// Crear Realizar búsqueda por nombre ------------------------------------------------------------------------------------------------------------------------------


