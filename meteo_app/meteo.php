<?php
// Desactivar los mensajes de warning
error_reporting(0);

// Obtener la clave de acceso a OpenWeatherMap
require_once "KEY.php"; // la clave está en $API_KEY

$city = "Barcelona";
$countryCode = "ES";
$units = "units=metric";
$lang = "lang=ES";

if ($_GET) {
    // print_r($_GET);
    // Datos de prueba de la URL
    $city = $_GET['city'];
    $countryCode = $_GET['countryCode'];
}
$cityURL = urlencode($city);
// $cityArrayOri = explode(' ', $city);
// $cityArrayNew = [];
// foreach ($cityArrayOri as $word) {
//     $cityArrayNew[] = trim($word);
// }
// $cityURL = implode("%20", $cityArrayNew);
// $cityNameCorrected = implode(" ", $cityArrayNew);
// echo "Ciutat : " . $city;

$URL_base = "https://api.openweathermap.org/data/2.5/";
$URL_weather = "weather?";
$URL_forecast = "forecast?";
$URL_params = "q=$cityURL,$countryCode&$units&$lang&appid=$API_KEY";
$URL_actual = $URL_base.$URL_weather.$URL_params;
echo "<br><br>";
echo "URL : " . $URL_actual;
echo "<br><br>";

// URL pronostico cada 3 horas

$URL_pronostic = $URL_base.$URL_forecast.$URL_params;

    echo "<br>".$URL_pronostic."<br>";



$file = file_get_contents($URL_actual);
echo "<br><br>";
// echo "FILE : " . $file;
echo "<br><br>";

if ($file === false) {
    echo "Error al obtener los datos de OpenWeather";
    exit();
}

$json_meteo = json_decode($file, true);

if ($json_meteo === null) {
    echo "Error al descodificar los datos de la URL";
    exit();
}






?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My meteo</title>
    <style>
        img {
            width: 100px;
        }
    </style>
</head>

<body>



    <form method="get">
        <label for="city">Ciudad</label>
        <input type="text" id="city" name="city" minlength="2" maxlength="100">
        <label for="countryCode">Código de país</label>
        <input type="text" id="countryCode" name="countryCode" minlength="2" maxlength="2">
        <button type="submit">Buscar</button>

        <?php
        $error = false;
        if ($json_meteo['cod'] == 200) {
            $description = $json_meteo["weather"][0]['description'];
            $icon = $json_meteo["weather"][0]['icon'];
            $temp = round($json_meteo['main']['temp'], 0);
            $feels_like = $json_meteo['main']['feels_like'];
            $temp_min = $json_meteo['main']['temp_min'];
            $temp_max = $json_meteo['main']['temp_max'];
            $humidity = $json_meteo['main']['humidity'];
            $wind = $json_meteo['wind']['speed'];
            $rutaIcono = "https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/$icon.svg";


            $dt = $json_meteo['dt'];
            $timezone = $json_meteo['timezone'];
            $sunrise = $json_meteo['sys']['sunrise'];
            $sunset = $json_meteo['sys']['sunset'];

            // Hora actual en la ciudad consultada
            $hora_consulta = formatearFecha($dt, $timezone);
            $sortida_sol = formatearFecha($sunrise, $timezone);
            $posta_sol = formatearFecha($sunset, $timezone);

        ?>
            <p><?= $city ?></p>
            <p><?= $temp ?></p>
            <p><?= $icon ?></p>
            <img src="<?= $rutaIcono ?>" alt="<?= $description ?>">
            <p><?= $hora_consulta ?></p>
            <p><?= $sortida_sol ?></p>
            <p><?= $posta_sol ?></p>


        <?php
        } else {
            $error = true;
            $messageError = "Nombre de ciudad no encontrado. ¿Hay algún error en la escritura?";
        }
        ?>
    </form>


</body>

</html>

<?php

function formatearFecha($timestamp, $timezone)
{

    $temps_corregit = $timestamp + $timezone;

    $date = new DateTime("@" . $temps_corregit);

    return $date->format('H:i:s');
}
