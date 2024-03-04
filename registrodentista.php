<?php
//insertado de datos al registrodentista
$Nombre=$_POST['Nombre'];
$Apellido_app=$_POST['Apellido_app'];
$Apellido_apm=$_POST['Apellido_apm'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$experiencia=$_POST['experiencia'];
$titulos_certificaciones=$_POST['titulos_certificaciones'];
$referencia_profecional=$_POST['referencia_profecional'];
$crea_usuario=$_POST['crea_usuario'];
$password=$_POST['password'];

$servidor = "localhost";
$usuario = "root";
$password = "1234567";
$bdd = "registro";

echo "$Nombre";

$conn = new mysqli($servidor,$usuario,$password,$bdd);
if($conn -> connect_error) {
    die ("la conexi&oacute;n ha fallado: ". $conn -> connect_error);
}
$sql= "insert into registros_dentistas(id_registros_dent,Nombre,Apellido_app,Apellido_apm,telefono,correo,experiencia,titulos_certificaciones,referencia_profecional,crea_usuario,password)";
$sql = "INSERT INTO registros_dentistas VALUES (NULL,'$Nombre','$Apellido_app','$Apellido_apm','$telefono','$correo','$experiencia','$titulos_certificaciones','$referencia_profecional','$crea_usuario','$password')";

$result = $conn -> query ($sql) or die ("error al insertar");
$conn->close();
?>