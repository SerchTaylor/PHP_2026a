<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Si registro.php detecta que se le ha enviado algo por POST
    // entra aquí

    $errores = [];

    // SANEADO DE LOS DATOS RECIBIDOS

    $email_raw = trim($_POST['email']);
    $email_saneado = filter_var($email_raw, FILTER_SANITIZE_EMAIL);

    $password_raw = $_POST['password'];
    $password_saneada = $password_raw;


    // VALIDACIÓN 
    $patternEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (empty($email_saneado) || !preg_match($patternEmail, $email_saneado)) {
        $errores[] = "El correo electrónico no tiene un formato válido";
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

    $error = false;
    $archivo_usuarios = "datos.json";

    if (file_exists($archivo_usuarios)) {
        $stringDatos = file_get_contents($archivo_usuarios);
        $arrayDatos = json_decode($stringDatos, true);

        foreach ($arrayDatos as $usuario) {
            if ($usuario['email'] == $email_saneado) {

                if (password_verify($password_saneada, $usuario['password'])) {

                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['idioma'] = $usuario['idioma'];

                header("Location: main.php");
                exit();
                }

                
            }
        }
    }

    header("Location: login.html?error=login");
    exit();
} else {
    // Si no hay datos envíados por el formulario
    header("Location: login.html"); // redirigimos al formulario inicial
    exit();
}
