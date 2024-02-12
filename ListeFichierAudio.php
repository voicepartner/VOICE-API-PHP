<?php

// L'URL de l'API où vous voulez envoyer la requête
$url = 'http://api.voicepartner.fr/v1/audios/YOUR_API_KEY';

// Initialisation de cURL
$curl = curl_init($url);

// Configuration des options de cURL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Cache-Control: no-cache'
]);

// Exécution de la requête cURL et enregistrement de la réponse
$response = curl_exec($curl);

// Vérification s'il y a eu des erreurs pendant l'exécution de la requête
if ($response === false) {
    // Gérer l'erreur ici
    $error = curl_error($curl);
    curl_close($curl);
    die("Erreur cURL: $error");
}

// Fermeture de la session cURL
curl_close($curl);

// Affichage de la réponse
echo $response;