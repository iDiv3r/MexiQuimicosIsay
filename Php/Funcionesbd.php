<?php
function conexiónDB(){
  // Variables de Conexión 
  $servidor = "localhost";
  $db = "dbmexiquimicos";
  $servidorPass = "";
  $Usuario = "root";

  $conexión = mysqli_connect($servidor, $Usuario, $servidorPass, $db) or die("No se pudo conectar a la DB");

  return $conexión;
}

function validarUser($correoV, $passV){

  // Conexion y Consulta
  $conex = conexiónDB();
  $consulta = "SELECT pass FROM tbusuarios WHERE correo = '$correoV' ";

  // Ejecutamos y guardamos la consulta
  $rset = mysqli_query($conex, $consulta);
  mysqli_close($conex);
  

  // Extraer pass si hay resultados
  while ($fila = mysqli_fetch_array($rset)) {
    $passBD = $fila['pass'];
  }

  // Comparar la contraseña con la DB
  if ($passV == $passBD){
    
    $status = $correoV;

  } else {

    $status = 0; 

  }

  return $status;

}

// Función para guardar usuarios en la base de datos
function guardarUsuarios($correoF,$passF){
  $conex = conexiónDB();
  $insert = "INSERT into tbusuarios(correo,pass) values(?,?)";

  try{
    $stm = $conex -> prepare($insert);
    $stm -> bind_param('ss', $correoF, $passF);
    $stm -> execute();
    $stm -> close();
    mysqli_close($conex);
    $status = 1;
  }catch(Exception $e){
    echo 'Exception capturada',$e->getMessage();
    $status = 0;
    var_dump($e);
  }

  return $status;

}

// Funcion para actualizar usuario
function actualizarUsuario($correoUp, $pswUp){

  $conex = conexiónDB(); 
  $consulta = "UPDATE tbusuarios SET correo = ?, pass = ? WHERE correo = ?";

  $usuarioAnt = $_COOKIE['usuario'];

  try {
  
    $stm = $conex->prepare($consulta);
    $stm->bind_param('sss', $correoUp, $pswUp, $usuarioAnt); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status; 

  } catch (Exception $e) {

    echo 'Error al modificar el producto: ' . $e->getMessage();

    $status = 0;
    return $status;
  }
}


// CRUD Quimicos ------------------------------------------------------------------------------------------------------------------------------

// Consultar productos químicos 
function consultarQuimicos(){
  $conex = conexiónDB();
  $consulta = "select * from tbquimicos";

  try{
    $rsConsulta = mysqli_query($conex, $consulta);
    mysqli_close($conex);

    return $rsConsulta;

  } catch(Exception $e){

    die('Excepcion capturada: ' . $e->getMessage());

  }
}

// Función para guardar quimicos en la base de datos
function guardarQuimico($nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad,$medida){

  $conex = conexiónDB();
  $insert = "INSERT into tbquimicos(nombre, fecha, precio, costomay, costomen, cantidad, clase,medida) values(?,?,?,?,?,?,?,?)";
  $clase = "Quimico";

  try{

    $stm = $conex -> prepare($insert);
    $stm -> bind_param('ssdddiss', $nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad,$clase,$medida);
    $stm -> execute();
    $stm -> close();
    mysqli_close($conex);
    $status = 1;

  }catch(Exception $e){

    echo 'Exception capturada',$e->getMessage();
    $status = 0;
    var_dump($e);

  }

  return $status;

}

// Función para eliminar Químico de la base de datos
function eliminarQuimico($idQuimico) {

  $conex = conexiónDB(); 
  $consulta = "DELETE FROM tbquimicos WHERE id = ?";

  try {
  
    $stm = $conex->prepare($consulta);
    $stm->bind_param('i', $idQuimico); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status; 

  } catch (Exception $e) {

    echo 'Error al eliminar el producto: ' . $e->getMessage();

    $status = 0;
    return $status;
  }
}

//Función para modificar Quimico de la base de datos
function actualizarQuimico($nombreUp, $fechaUp, $precioUp, $costoMayUp, $costoMenUp, $cantidadUp, $idQuimicoUp, $medidaUp){

  $conex = conexiónDB(); 
  $consulta = "UPDATE tbquimicos SET nombre = ?, fecha = ?, precio = ?, costomay = ?, costomen = ?, cantidad = ?, medida = ? WHERE id = ?";

  try {
  
    $stm = $conex->prepare($consulta);
    $stm->bind_param('ssdddisi', $nombreUp, $fechaUp, $precioUp, $costoMayUp, $costoMenUp, $cantidadUp,$medidaUp, $idQuimicoUp); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status; 

  } catch (Exception $e) {

    echo 'Error al modificar el producto: ' . $e->getMessage();

    $status = 0;
    return $status;
  }
}

// Función para realizar ventas de químicos 
function venderQuimico($restante, $idQuimicoV){
  $conex = conexiónDB(); 
  $consulta = "UPDATE tbquimicos SET cantidad = ? WHERE id = ?";

  try{

    $stm = $conex->prepare($consulta);
    $stm->bind_param('ii', $restante, $idQuimicoV); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status;

  } catch(Exception $e) {

    echo 'Error al realizar la venta: ' . $e->getMessage();

    $status = 0;
    return $status;
  }

}


// CRUD Materiales ------------------------------------------------------------------------------------------------------------------------------

// Consultar productos materiales 
function consultarMateriales(){
  $conex = conexiónDB();
  $consulta = "SELECT * from tbmateriales";

  try{
    $rsConsulta = mysqli_query($conex, $consulta);
    mysqli_close($conex);

    return $rsConsulta;

  } catch(Exception $e){

    die('Excepcion capturada: ' . $e->getMessage());

  }
}

// Función para guardar materiales en la base de datos
function guardarMaterial($nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad,$medida){

  $conex = conexiónDB();
  $insert = "INSERT into tbmateriales(nombre, fecha, precio, costomay, costomen, cantidad, clase, medida) values(?,?,?,?,?,?,?,?)";
  $clase = "Material";

  try{

    $stm = $conex -> prepare($insert);
    $stm -> bind_param('ssdddiss', $nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad,$clase,$medida);
    $stm -> execute();
    $stm -> close();
    mysqli_close($conex);
    $status = 1;

  }catch(Exception $e){

    echo 'Exception capturada',$e->getMessage();
    $status = 0;
    var_dump($e);

  }

  return $status;

}

// Función para eliminar Químico de la base de datos
function eliminarMaterial($idMaterial) {

  $conex = conexiónDB(); 
  $consulta = "DELETE FROM tbmateriales WHERE id = ?";

  try {
  
    $stm = $conex->prepare($consulta);
    $stm->bind_param('i', $idMaterial); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status; 

  } catch (Exception $e) {

    echo 'Error al eliminar el material: ' . $e->getMessage();

    $status = 0;
    return $status;
  }
}

//Función para modificar material de la base de datos
function actualizarMaterial($nombreUp, $fechaUp, $precioUp, $costoMayUp, $costoMenUp, $cantidadUp, $idMaterialUp, $medidaUp){

  $conex = conexiónDB(); 
  $consulta = "UPDATE tbmateriales SET nombre = ?, fecha = ?, precio = ?, costomay = ?, costomen = ?, cantidad = ?, medida = ? WHERE id = ?";

  try {
  
    $stm = $conex->prepare($consulta);
    $stm->bind_param('ssdddisi', $nombreUp, $fechaUp, $precioUp, $costoMayUp, $costoMenUp, $cantidadUp,$medidaUp, $idMaterialUp); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status; 

  } catch (Exception $e) {

    echo 'Error al modificar el producto: ' . $e->getMessage();

    $status = 0;
    return $status;
  }
}

// Función para realizar ventas de materiales 
function venderMaterial($restante, $idMaterialV){
  $conex = conexiónDB(); 
  $consulta = "UPDATE tbmateriales SET cantidad = ? WHERE id = ?";

  try{

    $stm = $conex->prepare($consulta);
    $stm->bind_param('ii', $restante, $idMaterialV); 
    $stm->execute();
    $stm->close();
    mysqli_close($conex);

    $status = 1;
    return $status;

  } catch(Exception $e) {

    echo 'Error al realizar la venta: ' . $e->getMessage();

    $status = 0;
    return $status;
  }

}

//  Ventas ------------------------------------------------------------------------------------------------------------------------------

function consultarVentas(){

  $conex = conexiónDB();
  $consulta = "SELECT * from tbventas";

  try{
    $rsConsulta = mysqli_query($conex, $consulta);
    mysqli_close($conex);

    return $rsConsulta;

  } catch(Exception $e){

    die('Excepcion capturada: ' . $e->getMessage());

  }

}

function guardarVenta($clienteV,$fechaV,$tipoV, $productoV,$cantidadV,$totalV,$clase){

  $conex = conexiónDB();
  $insert = "INSERT into tbventas(cliente, fecha, tipo, producto, cantidad, total,clase) values(?,?,?,?,?,?,?)";

  try{

    $stm = $conex -> prepare($insert);
    $stm -> bind_param('ssssids', $clienteV, $fechaV, $tipoV, $productoV, $cantidadV, $totalV,$clase);
    $stm -> execute();
    $stm -> close();
    mysqli_close($conex);
    $status = 1;

  }catch(Exception $e){

    echo 'Exception capturada',$e->getMessage();
    $status = 0;
    var_dump($e);

  }

  return $status;

}

// Crear reporte general ------------------------------------------------------------------------------------------------------------------------------

function consultarExistencias(){
  $conex = conexiónDB();
  $consultaQuimicos = "SELECT * FROM tbquimicos";
  $consultaMateriales = "SELECT * FROM tbmateriales";

  try {
      $rsConsultaQuimicos = mysqli_query($conex, $consultaQuimicos);
      $rsConsultaMateriales = mysqli_query($conex, $consultaMateriales);

      $resultadosQuimicos = mysqli_fetch_all($rsConsultaQuimicos, MYSQLI_ASSOC);
      $resultadosMateriales = mysqli_fetch_all($rsConsultaMateriales, MYSQLI_ASSOC);

      mysqli_close($conex);

      $resultados = array(
          'quimicos' => $resultadosQuimicos,
          'materiales' => $resultadosMateriales
      );

      return $resultados;

  } catch(Exception $e){
      die('Excepcion capturada: ' . $e->getMessage());
  }
}

// Realizar búsqueda por nombre ------------------------------------------------------------------------------------------------------------------------------

