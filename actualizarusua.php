<?php
$id = $_POST['bid'];
$servidor = "localhost";
$usuario = "root";
$password = "1234567";
$bdd = "registro";

$conn = new mysqli($servidor, $usuario, $password, $bdd);
if ($conn->connect_error) {
    die ("La conexión ha fallado: " . $conn->connect_error);
}


$n = $_POST['Nombre'];
$app = $_POST['Apellido_paterno'];
$apm = $_POST['Apellido_materno'];
$tel = $_POST['telefono'];
$correo = $_POST['correo'];
$usuario = $_POST['crea_usuario'];
$pass = $_POST['password'];

$sql = "UPDATE registros_usuarios SET Nombre='$n', Apellido_paterno='$app', Apellido_materno='$apm', telefono='$tel', correo='$correo', crea_usuario='$usuario', password='$pass' WHERE id_registros='$id'";

$result = $conn->query($sql);

if (!$result) {
    echo "Error al actualizar";
} else {
    echo "Datos actualizados";
}
$conn->close();
?>
