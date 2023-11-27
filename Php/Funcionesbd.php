<?php
function conexiónDB(){
  // Variables de Conexión 
  $servidor = "localhost";
  $db = "dbmancoanonimo";
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

  // Verificamos si se obtuvieron resultados
  if (!$rset) {
    die("Error en la consulta: " . mysqli_error($conex));
  }

  // Extraer pass si hay resultados
  $passBD = null;
  while ($fila = mysqli_fetch_array($rset)) {
    $passBD = $fila['pass'];
  }

  // Comparar la contraseña con la DB
  if ($passBD !== null && $passV == $passBD) {
    $status = 1; // Tiene acceso
  } else {
    $status = 0; // No tiene acceso
  }

  mysqli_close($conex);
  return $status;
}

function guardarUsuarios($correoF,$passF,$perfilF){
  $conex = conexiónDB();
  $Insert = "insert into tbusuarios(correo,pass,perfil) values(?,?,?)";

  try{
    $stm = $conex -> prepare($Insert);
    $stm -> bind_param('sss', $correoF, $passF, $perfilF);
    $stm -> execute();
    $stm -> close();
    mysqli_close($conex);
    $status = 1;
  }catch(Exception $e){
    $status = 0;
    echo 'Exception capturada',$e->getMessage();
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
