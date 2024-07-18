<?php
//Variables mandadas por el formulario

$nombre=$_POST['nombre'];
$apellidoP=$_POST['apellidoP'];
$apellidoM=$_POST['apellidoM'];
$correo=$_POST['correo'];
$salario=$_POST['salario'];
$telefono=$_POST['telefono'];
$idEmpleado =$_POST['idEmpleado'];

//Variables para la conexion a la base de datos
$servername = "localhost";
$database = "aqua";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

//Insruccion para consultar
// $consultar=mysqli_query($conn,"SELECT Usuario, Contraseña FROM usuario WHERE Usuario='$nombre' and Contraseña='$contra'");
$insertar="INSERT INTO empleado (Clave,Nombre,ApellidoP, ApellidoM, Telefono, Salario, Correo) VALUES ('$idEmpleado','$nombre','$apellidoP','$apellidoM','$telefono','$salario','$correo')";
    //Estructura de control para comprobar si se agrega o no
if (mysqli_query($conn, $insertar)) {
      echo "<script>alert('El registro hecho correctamente');</script>";
      header("Location: http://localhost/IC31M_AquaShine/Vista/lista_empleado.php");
} else { //Si algo falla nos mandara este mensaje
      echo "<script>alert('Error: Intenta de nuevo');</script>".mysqli_error($conn);
      header("Location: http://localhost/IC31M_AquaShine/Vista/agregarEmpleado.html");
}
//Terminar consulta
// mysqli_free_result($consultar);

//Cierre de la conexion
mysqli_close($conn);
?>