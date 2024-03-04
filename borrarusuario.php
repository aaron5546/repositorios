<?php
echo "<body bgcolor ='pink'>";
$servidor = "localhost";
$usuario = "root";
$password = "1234567";
$bdd = "registro";
//conexion
$id = $_POST['id_registros'];
$conn = new mysqli($servidor,$usuario,$password,$bdd);
$sql = "delete from registros_usuarios where id_registros=".$id;

$result  = $conn ->query($sql);

if($result == true && $conn -> affected_rows > 0){
    echo "id eliminada";}
    else {
        echo "ya ha sido eliminada";
    }

        // cerrar conexion
        $conn->close();
?>