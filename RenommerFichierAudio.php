<?php

// L'URL de l'API où vous voulez envoyer la requête
$url = 'https://api.voicepartner.fr/v1/audio-file/rename';

// Les données que vous souhaitez envoyer en JSON
$data = array(
    'apiKey' => 'YOUR_API_KEY',
    'tokenAudio' => 'TOKEN_DU_FICHIER_AUDIO',
    'filename' => 'Nom du fichier'
);

// Encodage des données en JSON
$data_json = json_encode($data);

// Initialisation de cURL
$curl = curl_init($url);

// Configuration des options de cURL pour envoyer du JSON
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_json)
));

// Exécution de la requête cURL et enregistrement de la réponse
$response = curl_exec($curl);

// Fermeture de la session cURL
curl_close($curl);

// Affichage de la réponse
echo $response;