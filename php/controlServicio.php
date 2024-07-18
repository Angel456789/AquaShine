<?php
include 'conexion.php';
//Variables mandadas por el formulario

$nombre=$_POST['nombreServicio'];
$precio=$_POST['precio'];
$desc=$_POST['desc'];
$id = 0;
if ($_POST['id']) {
    $id = $_POST['id'];
}

$delete_id = 0;
if (isset($_REQUEST['eliminar'])) {
    $delete_id = $_GET['eliminar'];
}
//Variables para la conexion a la base de datos
$conn=conectar();

if ($id == 0 && $delete_id == 0) {
      insertar($conn,$nombre,$desc,$precio);
}
 else if($id != 0 && $delete_id == 0) {agregar($conn,$nombre,$desc,$precio,$id);} 

else{
      eliminar($conn,$delete_id);
}
  function agregar($conn,$nombre,$desc,$precio,$id){

  
      $sql = "UPDATE servicio SET 
      nombre = '$nombre',
      descripcion= '$desc', precio= $precio
      WHERE id = $id";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('El registro hecho correctamente');</script>";
            header("Location: http://localhost/IC31M_AquaShine/Vista/lista_servicio.php");
      } else { //Si algo falla nos mandara este mensaje
            echo "<script>alert('Error: Intenta de nuevo');</script>".mysqli_error($conn);
            header("Location: http://localhost/IC31M_AquaShine/Vista/agregarServicio.html");
      }
  }
  function insertar($conn,$nombre,$desc,$precio){

      $sql="INSERT INTO servicio (nombre,descripcion,precio) VALUES ('$nombre','$desc','$precio')";
          //Estructura de control para comprobar si se agrega o no
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('El registro hecho correctamente');</script>";
            header("Location: http://localhost/IC31M_AquaShine/Vista/lista_servicio.php");
      } else { //Si algo falla nos mandara este mensaje
            echo "<script>alert('Error: Intenta de nuevo');</script>".mysqli_error($conn);
            header("Location: http://localhost/IC31M_AquaShine/Vista/agregarServicio.html");
      }
      }
     function eliminar($conn,$delete_id){
            $sql = "DELETE FROM servicio WHERE id = $delete_id";
            if (mysqli_query($conn, $sql)) {
                  echo "<script>alert('El registro hecho correctamente');</script>";
                  header("Location: http://localhost/IC31M_AquaShine/Vista/lista_servicio.php");
            } else { //Si algo falla nos mandara este mensaje
                  echo "<script>alert('Error: Intenta de nuevo');</script>".mysqli_error($conn);
                  header("Location: http://localhost/IC31M_AquaShine/Vista/agregarServicio.html");
            }}
      


//Cierre de la conexion
mysqli_close($conn);
?>