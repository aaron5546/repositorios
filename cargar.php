<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width,user-scalable=yes, initial-scale 1.0 maximum-scale 3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
    <link rel="stylesheet" href="estilo1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilo2.css">
    </head>
<body>
<header>
        <div class="logo">
            <img src="logo.png" alt="logo de la compañia">
            <h2 class="nombreempresa">DENT APP</h2>
        </div>
        <nav>
            <a href="login1.html" class="nav'link">iniciar session</a>
            <a href="curricukum.html" class="nav'link">sobre nosotros</a>
            <a href="descargas2.html" class="nav'link">Descargas</a>
           
        </nav>
    </header>

<?php

$bid =$_POST['id_registros'];
$servidor = "localhost";
$usuario = "root";
$password = "1234567";
$bdd = "registro";

$conn = new mysqli($servidor,$usuario,$password,$bdd);
if($conn -> connect_error) {
    die ("la conexi&oacute;n ha fallado: ". $conn ->connect_error);
}

$sql="select * from registros_usuarios where id_registros=".$bid;
$result  = $conn ->query($sql);

if($result -> num_rows >0) {
    //output data of each row 
    while ($row = $result -> fetch_assoc()) {
$id=$row['id_registros'];
$n=$row['Nombre'];
$app=$row['Apellido_paterno'];
$apm=$row['Apellido_materno'];
$tel=$row['telefono'];
$correo=$row['correo'];
$usuario=$row['crea_usuario'];
$pass=$row['password'];

    }
}
// codigo formulario

echo"<!DOCTYPE html>";
echo "<div class='formulario'>";
echo "<h1>informaci&oacute;n de $n</h1>";
echo "<form action='actualizarusua.php' method='POST'>";

echo " <div class='contenedor'>";
echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='bid' value ='$id' reandonly>"; 
echo "</div>";

echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='Nombre' value ='$n'  placeholder='Nombre'>"; 
echo "</div>";

echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='Apellido_paterno' value ='$app' placeholder='Apellido Paterno'>"; 
echo "</div>";
           
echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='Apellido_materno' value ='$apm' placeholder='Apellido Materno'>"; 
echo "</div>";
           
echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='telefono' value ='$tel' placeholder='telefono'>"; 
echo "</div>";

echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='correo' value ='$correo' placeholder='correo electronico'>"; 
echo "</div>";
    
echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='crea_usuario' value ='$usuario' placeholder='usuario'>"; 
echo "</div>";
    
echo "<div class='input-contenedor'>";
echo "<i class='fas fa-user'></i>"; 
echo "<input type='text'name='password' value ='$pass' placeholder='contraseña'>"; 
echo "</div>";

echo "<button type='submit'>Actualizar</button>"; 
echo "<p>Al registrarte, aceptas nuestras condiciones de uso y política de privacidad.</p>";
echo  "<p>¿Ya tienes cuenta? <a class='link' href='login1.html'>Iniciar sesión</a></p>";
echo "</div>";
echo "</form>";
echo "</div>";

$conn->close();
?>

<footer class="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-links">
                    <h4>compañia</h4>
                    <ul>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Nuestros servicios</a></li>
                        <li><a href="#">politica de privacidad</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>ayuda</h4>
                    <ul>
                        <li><a href="#">preguntas</a></li>
                        <li><a href="#">estatus de citas</a></li>
                        <li><a href="#">pagos</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Siguenos</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>

                    </div>
                </div>
                

            

            </div>

        </div>

    </footer>

</body>
</html>