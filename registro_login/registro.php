<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Si registro.php detecta que se le ha enviado algo por POST
    // entra aquí

    $errores = [];

    // SANEADO DE LOS DATOS RECIBIDOS
    $nombre_raw = trim($_POST['nombre']);
    // echo $nombre_raw;
    $nombre_saneado = htmlspecialchars(strip_tags($nombre_raw), ENT_QUOTES, "UTF-8");
    // echo $nombre_saneado;

    $email_raw = trim($_POST['email']);
    $email_saneado = filter_var($email_raw, FILTER_SANITIZE_EMAIL);

    $password_raw = $_POST['password'];
    $password_saneada = $password_raw;

    $edad_raw = $_POST['edad'];
    $edad_saneada = filter_var($edad_raw, FILTER_SANITIZE_NUMBER_INT);

    $idioma_raw = $_POST['idioma'];
    $idioma_saneado = htmlspecialchars(strip_tags($idioma_raw), ENT_QUOTES, "UTF-8");

    // VALIDACIÓN 
    $patternNombre = "/^[a-zA-ZáéíóúàèìòùüÁÉÍÓÚÀÈÌÒÙñÑçÇ\s]{2,}$/";
    if (empty($nombre_saneado) || !preg_match($patternNombre, $nombre_saneado)) {
        $errores[] = "El nombre no es válido. Solo se permiten letras y espacios";
    }
    $patternEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (empty($email_saneado) || !preg_match($patternEmail, $email_saneado)) {
        $errores[] = "El correo electrónico no tiene un formato válido";
    }

    // Comprobación de la edad
    if (empty($edad_saneada) || intval($edad_saneada) < 18) {
        $errores[] = "Debes ser mayor de edad";
    }

    // Comprobación de la contraseña
    $patternPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8}$/";
    if (empty($password_saneada) || !preg_match($patternPassword, $password_saneada)) {
        $errores[] = "La contraseña no cumple los requisitos.";
    }

    // print_r($errores);
    if (count($errores) > 0) {
        header("Location: registro.html");
        exit();
    }





    // Encriptar la contraseña
    $password_encriptada = password_hash($password_saneada, PASSWORD_DEFAULT);

    // Array asociativo con los datos del formulario
    $nuevo_usuario = [
        "nombre" => $nombre_saneado,
        "email" => $email_saneado,
        "password" => $password_encriptada,
        "edad" => $edad_saneada,
        "idioma" => $idioma_saneado
    ];

    // variables para guardar los datos en un fichero externo en formato JSON
    $archivo_json = "datos.json";
    $usuarios_existentes = [];

    if (file_exists($archivo_json)) {
        $contenido_json = file_get_contents($archivo_json);
        $usuarios_existentes = json_decode($contenido_json, true) ?? [];

        foreach($usuarios_existentes as $usuario) {
            if ($usuario['email'] == $email_saneado) {
                header("Location: registro.html?error=email_duplicado");
                exit();
            }
        }
    }

    $usuarios_existentes[] = $nuevo_usuario;
    $usuariosEncode = json_encode($usuarios_existentes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    try {
        file_put_contents($archivo_json, $usuariosEncode);
    } catch (Error $e) {
        echo $e->getMessage();
    }

    $_SESSION['nombre'] = $nombre_saneado;
    $_SESSION['idioma'] = $idioma_saneado;
    header("Location: main.php");

} else {
    // Si no hay datos envíados por el formulario
    header("Location: registro.html"); // redirigimos al formulario inicial
    exit();
}
