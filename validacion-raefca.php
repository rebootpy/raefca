<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');

$token = "5386820344:AAENa4tIuuou1GKbyElh0w9krqYlxNqaZ1c";
#digitales

$name = $_POST['nombre'];
$Correo = $_POST['mail'];
$Numero = $_POST['numero'];
$cotizacion = $_POST['cotizacion'];

$datos = [
    'chat_id' => '1189170037',
    #'chat_id' => '@el_canal si va dirigido a un canal',
    'text' => "👤NUEVO REGISTRO👤 \n-----------------\n👤Nombre: $name \n📨Correo: $Correo \n📞Telefono: $Numero \n📖Cotización: $cotizacion \n\n ATTE: RAEFCA_BOT",
    'parse_mode' => 'HTML' #formato del mensaje
];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r_array = json_decode(curl_exec($ch), true);

curl_close($ch);
if ($r_array['ok'] == 1) {
    header("Location: exito");
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}
?>