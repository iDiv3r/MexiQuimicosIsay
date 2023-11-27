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
