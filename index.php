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
</head>
<body>
    <form action="#" name="formulario" method = "post" >
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="telefono" placeholder="telefono">
        <input type="email" name="correo" placeholder="correo">
        <input type="text" name="experiencia_laboral" placeholder="experiencia_laboral">
        <input type="text" name="formacion" placeholder="formacion">
        <input type="text" name="idiomas" placeholder="idiomas">
        <input type="text" name="habilidades" placeholder="habilidades">

        <input type="submit" name="registro">
        <input type="reset" >

    </form>
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