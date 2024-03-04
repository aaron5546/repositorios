<?php

//insertado de usuarios

$Nombre=$_POST['Nombre'];
$Apellido_paterno=$_POST['Apellido_paterno'];
$Apellido_materno=$_POST['Apellido_materno'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$crea_usuario=$_POST['crea_usuario'];
$password=$_POST['password'];

$servidor = "localhost";
$usuario = "root";
$password = "1234567";
$bdd = "registro";

echo "Usuario registrado con exito";
echo "<br>";
echo "bienvenido" ."$Nombre";

$conn = new mysqli($servidor,$usuario,$password,$bdd);
if($conn -> connect_error) {
    die ("la conexi&oacute;n ha fallado: ". $conn -> connect_error);
}

$sql = "insert into registros_usuarios(id_registros,Nombre,Apellido_paterno,Apellido_materno,telefono,correo,crea_usuario,password)";
$sql = "INSERT INTO registros_usuarios Values(NULL,'$Nombre','$Apellido_paterno','$Apellido_materno','$telefono','$correo','$crea_usuario','$password')";

$result = $conn -> query ($sql) or die ("error al insertar");
$conn->close();

?>