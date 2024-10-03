<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "formulario";

$enlace = mysqli_connect($servidor, $usuario, $clave, $base_de_datos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($enlace, $_GET['id']);
    $consulta = "SELECT * FROM datos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
} else {
    die("No se proporcionó ID");
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Currículum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 900px;
            background-color: rgb(255, 255, 255);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; 
        }

        .header {
            display: flex;
            align-items: center;
            background-color: #414141;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%; 
        }

        .profile-pic {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .title {
            flex: 1;
            text-align: center;
        }

        .title h1 {
            font-size: 24px;
            color: white;
            margin-bottom: 5px;
        }

        .title p {
            font-size: 18px;
            color: #ccc;
        }

        .content {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }

        .sidebar {
            width: 250px;
        }

        .sidebar section {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-left: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .main-content {
            width: calc(100% - 270px);
            padding-left: 20px;
            border-left: 2px solid #e0e0e0;
        }

        .main-content h2, .sidebar h2 {
            font-size: 20px;
            margin-bottom: 10px;
            border-bottom: 4px solid #000;
            padding-bottom: 5px;
        }

        .main-content p, .sidebar p, .sidebar ul {
            font-size: 16px;
            line-height: 1.6;
        }

        .main-content ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .sidebar section, .main-content section {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="profile-pic">
               
            </div>
            <div class="title">
                <h1><?php echo htmlspecialchars($fila['nombre']); ?></h1>

            </div>
        </header>
        <div class="content">
            <div class="sidebar">
                <section>
                    <h2>Datos de Contacto</h2>
                    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($fila['telefono']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($fila['correo']); ?></p>
                </section>
                <section>
                    <h2>Idiomas</h2>
                    <p><?php echo htmlspecialchars($fila['idiomas']); ?></p>
                </section>
                <section>
                    <h2>Habilidades</h2>
                    <p><?php echo htmlspecialchars($fila['habilidades']); ?></p>
                </section>
            </div>
            <div class="main-content">
                <section>
                    <h2>Experiencia Laboral</h2>
                    <p><?php echo nl2br(htmlspecialchars($fila['experiencia_laboral'])); ?></p>
                </section>
                <section>
                    <h2>Formación</h2>
                    <p><?php echo nl2br(htmlspecialchars($fila['formacion'])); ?></p>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
