<?php
session_start();
$nombre = $_SESSION['nombre'];
$idioma = $_SESSION['idioma'];

$textos_json = "textos.json";

$titulo = "Página principal";

if (file_exists($textos_json)) {
    $contenido_fichero = file_get_contents($textos_json);
    $arrayText = json_decode($contenido_fichero, true);
    $titulo = $arrayText["$idioma"]['titulo'];
}
?>

<!DOCTYPE html>
<html lang="<?= $idioma ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
</head>
<body>
    <h1>
        <?= $titulo ?>
    </h1>
    <h2>Registro completado correctamente.</h2>
    <p>¡Bienvenido/a a nuestra página, <?= $nombre ?>!</p>

    <p>Gracias por registrarte. Tu información ha sido procesada correctamente.</p>
</body>
</html>