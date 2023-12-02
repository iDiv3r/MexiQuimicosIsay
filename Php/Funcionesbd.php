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
    
    $status = 1; // Tiene acceso

  } else {

    $status = 0; // No tiene acceso

  }

  return $status;

}

// Función para guardar usuarios en la base de datos
function guardarUsuarios($correoF,$passF){
  $conex = conexiónDB();
  $insert = "insert into tbusuarios(correo,pass) values(?,?)";

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


function ModificarUsers($correoF, $passF = null, $perfilF = null) {
  /**
 * Actualiza los datos de un usuario en la base de datos.
 * @param string|null $passF La nueva contraseña del usuario. Si es null, no se actualiza.
 * @param string|null $perfilF El nuevo perfil del usuario. Si es null, no se actualiza.
 * @param string $correoF El correo del usuario a actualizar.
 * @return int El estado de la operación. 1 si se actualizó correctamente, 0 si ocurrió un error.
 */
  $conex = conexiónDB();
  $update = "update tbusuarios set";
  $params = array();
  if ($passF !== null) {
      $update .= " pass = ?,";
      $params[] = $passF;
  }

  if ($perfilF !== null) {
      $update .= " perfil = ?,";
      $params[] = $perfilF;
  }
  if (!empty($params)) {
      $update = rtrim($update, ",");
  } else {
      mysqli_close($conex);
      return 0;
  }
  $update .= " where correo = ?";
  $params[] = $correoF;
  try {
      $stm = $conex->prepare($update);
      $types = str_repeat('s', count($params));
      $stm->bind_param($types, ...$params);
      $stm->execute();
      $stm->close();
      mysqli_close($conex);
      $status = 1;
  } catch (Exception $e) {
      $status = 0;
      echo 'Exception capturada', $e->getMessage();
  }
  return $status;
}

 

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
function guardarQuimico($nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad){

  $conex = conexiónDB();
  $insert = "insert into tbquimicos(nombre, fecha, precio, costomay, costomen, cantidad) values(?,?,?,?,?,?)";

  try{

    $stm = $conex -> prepare($insert);
    $stm -> bind_param('ssdddi', $nombreR,$fechaR,$precioR,$costoMay,$costoMen,$cantidad);
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