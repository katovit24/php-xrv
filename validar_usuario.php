<?php
include 'conexion.php';

$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$sentencia = $mysql->prepare("SELECT * FROM usuarios WHERE email=?");
$sentencia->bind_param('s', $email);
$sentencia->execute();
$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
    // Verificar la contraseña utilizando password_verify
    if (password_verify($contrasena, $fila['contrasena'])) {
        // Credenciales válidas
        $usuarios = array($fila);
        echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
    } else {
        // Contraseña incorrecta
        echo json_encode(array("mensaje" => "Usuario o contraseña incorrectos"), JSON_UNESCAPED_UNICODE);
    }
} else {
    // Usuario no encontrado
    echo json_encode(array("mensaje" => "Usuario o contraseña incorrectos"), JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$mysql->close();
?>