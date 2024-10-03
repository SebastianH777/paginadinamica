<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "formulario";

$enlace = mysqli_connect($servidor, $usuario, $clave, $base_de_datos);

if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['registro'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST['nombre']);
    $telefono = mysqli_real_escape_string($enlace, $_POST['telefono']);
    $correo = mysqli_real_escape_string($enlace, $_POST['correo']);
    $experiencia_laboral = mysqli_real_escape_string($enlace, $_POST['experiencia_laboral']);
    $formacion = mysqli_real_escape_string($enlace, $_POST['formacion']);
    $idiomas = mysqli_real_escape_string($enlace, $_POST['idiomas']);
    $habilidades = mysqli_real_escape_string($enlace, $_POST['habilidades']);

    $insertardatos = "INSERT INTO datos (nombre, telefono, correo, experiencia_laboral, formacion, idiomas, habilidades) 
                      VALUES ('$nombre', '$telefono', '$correo', '$experiencia_laboral', '$formacion', '$idiomas', '$habilidades')";

    if (mysqli_query($enlace, $insertardatos)) {
        // Redirigir a la página de resultados
        $id = mysqli_insert_id($enlace);
        header("Location: resultados.php?id=$id");
        exit();
    } else {
        echo "Error: " . $insertardatos . "<br>" . mysqli_error($enlace);
    }
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #414141;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"],
        input[type="reset"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #414141;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #333;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h2 {
            margin-bottom: 10px;
            color: #414141;
            font-size: 20px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulario de Registro</h1>
        <form action="" method="post">
            <div class="form-section">
                <h2>Información Personal</h2>
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="email" name="correo" placeholder="Correo" required>
            </div>
            <div class="form-section">
                <h2>Experiencia y Formación</h2>
                <input type="text" name="experiencia_laboral" placeholder="Experiencia laboral" required>
                <input type="text" name="formacion" placeholder="Formación" required>
            </div>
            <div class="form-section">
                <h2>Idiomas y Habilidades</h2>
                <input type="text" name="idiomas" placeholder="Idiomas" required>
                <input type="text" name="habilidades" placeholder="Habilidades" required>
            </div>
            <input type="submit" name="registro" value="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </div>
</body>
</html>
