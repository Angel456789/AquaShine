
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34b8a911c2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos_EditEmpleados.css">
    <title>Nascar</title>
</head>
<body>
    <!--Encabezado de la interfaz  -->
    <!-- Navegador -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" ><img src="img/logo.jpeg" alt="" id="imgLogo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-grip-lines"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="perfilAdmin.html">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_servicio.html">
                            <i class="fa-solid fa-truck-fast"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_empleado.html">
                            <i class="fa-solid fa-user"></i> Empleados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_cita.html">
                            <i class="fa-regular fa-calendar-days"></i> Citas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_comentarios.html">
                            <i class="fa-solid fa-pencil"></i> Comentarios 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link enlace" aria-current="page" href="lista_cliente.html">
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

    <?php
    if (isset($_GET['id'])) {
        $servername = "localhost";
        $database = "aqua";
        $username = "root";
        $password = "";
        
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if (!$conn) {
          die("Conexion fallida:" . mysqli_connect_error());
        }


        $idservicio = $_GET['id'];
        $sql = "SELECT * FROM servicio WHERE id = $idservicio";

        // Ejecutamos la consulta
        $idservicio = $conn->query($sql);

        $idservicio = (mysqli_fetch_object($idservicio));
    }
    ?>
    <!-- Formulario -->
    <div class="contenedor">
        <h1><?= !isset($idservicio) ? 'Agregrar servicio' : 'Editar un servicio' ?></h1>
       
    </div>
    <div class="contenedor">
        <div class="formulario">
            <form action="php/controlServicio.php" method="post" >
               
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="hidden"   id="id" name="id" value="<?= isset($idservicio) ? $idservicio->id : '' ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Nombre del Servicio" id="nombreServicio" name="nombreServicio" required value="<?= isset($idservicio) ? $idservicio->nombre : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="number" class="form-control" placeholder="Precio" id="precio" name="precio" required value="<?= isset($idservicio) ? $idservicio->precio : '' ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Descripcion" id="desc" name="desc" required value="<?= isset($idservicio) ? $idservicio->descripcion : '' ?>">
                    </div>
                </div>
                <input type="submit" value="Aceptar" id="enviar">
            </form>
        </div>
    </div>
    <!-- Pie de pagina -->
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>