<?php

$servername = "localhost";
$database = "aqua";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Conexion fallida:" . mysqli_connect_error());
}


$consulta = mysqli_query($conn, "SELECT * FROM cita");
//nr es una variable para verificar el numero de filas que tengan coincidencia con la tabla de la BD
//mysqli_num_rows función para obtener el numero de filas
$nr = mysqli_num_rows($consulta);
//Estructura de control para verificar la coincidencia de los datos de la tabla
$i=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34b8a911c2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listaestilos.css">
    <title>Nascar</title>
</head>
<body>
    <!--Encabezado de la interfaz  -->
    <!-- Navegador -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" ><img src="img/logo.jpeg" alt="" id="imgLogo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="perfilAdmin.html">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_servicio.php">
                            <i class="fa-solid fa-truck-fast"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_empleado.php">
                            <i class="fa-solid fa-user"></i> Empleados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_cita.php">
                            <i class="fa-regular fa-calendar-days"></i> Citas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_comentarios.html">
                            <i class="fa-solid fa-pencil"></i> Comentarios 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_cliente.php">
                            <i class="fa-solid fa-user"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="index.html">
                            <i class="fa-solid fa-power-off"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- tabla -->
    <div class="container-fluid">
        <div class="nov">
            <h2>Cita</h2>
            <h3>Nueva cita</h3><br>
            <a href="agregarCita.html" style="left: 150px;">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="listado">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Horario</th>
                        <th>Fecha cita</th>
                        <th>Estatus</th>
                        <th colspan="2">Operacion</th>
                    </tr>
                </thead>
                <?php
                    while ($nr = mysqli_fetch_assoc($consulta)) :
                ?>
                <tbody class="table-group-divider">
                    <tr>
                        <td><?= $nr['idCita']; ?></td>
                        <td><?= $nr['Horario']; ?></td>
                        <td><?= $nr['Fecha']; ?></td>
                        <td><?= $nr['Estado']; ?></td>
                        <td><?= $nr['Servicio']; ?></td>
                        <td><a href="formCitaEditar.html"><i class="fa-solid fa-pencil"></i></a></td>
                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php
                        $i++;
                        if ($i == 2) {
                        echo "</div> ";
                        $i = 1;
                        }
                    ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--pie de pagina-->
    <footer  class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center text-md-left">
                    <p><i class="fa-solid fa-user-tie"></i>Nascar</p>
                    <p><i class="fa-solid fa-location-dot"></i>AV. Organizacion popular 91, Arteanos 56334 Chimalhuacan</p>
                    <p><i class="fa-solid fa-phone"></i>Telefono: 5588016312</p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right">
                    <p>&#169; <i class="fa-regular fa-user"></i>System OFF</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/botones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 