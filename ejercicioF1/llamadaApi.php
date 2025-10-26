<?php
// Inicia una sesión cURL
$curl = curl_init();

// Configuración de la solicitud
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.openf1.org/v1/drivers?&session_key=9158", // API pública
    CURLOPT_RETURNTRANSFER => true, // Devuelve la respuesta como string
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 5,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

// Ejecuta la solicitud
$response = curl_exec($curl);
$error = curl_error($curl);

// Cierra la sesión cURL
curl_close($curl);

// Muestra el resultado
if ($error) {
    echo "Error cURL: " . $error;
} else {
    $drivers = [16, 44];
    foreach ($drivers as $num) {
        $url = "https://api.openf1.org/v1/drivers?driver_number=$num&session_key=9158";
        $response = file_get_contents($url);
        echo "<h3>Piloto $num</h3><pre>" . htmlspecialchars($response) . "</pre>";
}

}



?>
