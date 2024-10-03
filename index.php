<?php 

$server= "localhost";
$usuario = "root";
$clave = "";
$base_de_datos= "formulario";

$enlace = mysqli_connect ($server,$usuario,$clave,$base_de_datos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="title">
            <input type="text" name="nombre" placeholder="nombre">
                <h1>Curriculum Vitae</h1>
                <p>Puesto Ocupado / Buscado</p>
            </div>
        </header>

        <div class="content">
            <div class="sidebar">
                <section class="contacto">
                    <h2>CONTACTO</h2>
                    <form action="index.php" name="formulario" method="post">
                        
                        <input type="text" name="telefono" placeholder="telefono">
                        <input type="email" name="correo" placeholder="correo">
                        
                        
                        <input type="text" name="idiomas" placeholder="idiomas">
                        <input type="text" name="habilidades" placeholder="habilidades">
                        <input type="submit" name="registro" value="Registrar">
                        <input type="reset">
                    </form>
                </section>
            </div>
            <div class="main-content">
                <section class="experiencia">
                    <h2>EXPERIENCIA LABORAL</h2>
                    <input type="text" name="experiencia_laboral" placeholder="experiencia laboral">
                </section>
                <section class="formacion">
                    <h2>FORMACIÓN</h2>
                    <input type="text" name="formacion" placeholder="formación">
                </section>
            </div>
        </div>
    </div>
</body>
</html>


<?php
    if(isset($_POST['registro'])){
        $nombre= $_POST ['nombre'];
        $telefono= $_POST ['telefono'];
        $correo= $_POST ['correo'];
        $experiencia_laboral= $_POST ['experiencia_laboral'];
        $formacion= $_POST ['formacion'];
        $idiomas= $_POST ['idiomas'];
        $habilidades= $_POST ['habilidades'];

        $insetardatos= "INSERT INTO datos VALUES('$nombre','$telefono','$correo','$experiencia_laboral','$formacion','$idiomas','$habilidades','')";

        $ejecutarinsertar= mysqli_query ($enlace,$insetardatos);
    }
?>