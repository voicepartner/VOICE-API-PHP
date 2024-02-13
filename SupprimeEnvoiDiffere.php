<?php

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// L'URL de l'API pour annuler la campagne
$apiKey = 'YOUR_API_KEY'; // Remplacez par votre clé API réelle
$campaignId = 'CAMPAIGN_ID'; // Remplacez par l'ID de campagne réel

// Construction de l'URL avec la clé API et l'ID de campagne
$url = "https://api.voicepartner.fr/v1/campaign/cancel/$apiKey/$campaignId";

// Initialisation de cURL
$curl = curl_init($url);

// Configuration des options de cURL pour une requête DELETE
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Cache-Control: no-cache'
));

// Exécution de la requête cURL et enregistrement de la réponse
$response = curl_exec($curl);

// Vérification s'il y a eu des erreurs pendant l'exécution de la requête
if (curl_errno($curl)) {
    echo 'Erreur cURL : ' . curl_error($curl);
} else {
    // Affichage de la réponse
    echo 'Réponse : ' . $response;
}

// Fermeture de la session cURL
curl_close($curl);