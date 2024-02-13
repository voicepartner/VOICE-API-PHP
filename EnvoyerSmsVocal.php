<?php

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// L'URL de l'API pour envoyer le message vocal
$url = 'http://api.voicepartner.fr/v1/tts/send';

// Les données à envoyer en JSON
$data = [
    'apiKey' => 'YOUR_API_KEY',         // Remplacez par votre clé API réelle
    'phoneNumbers' => '06XXXXXXXX',     // Remplacez par le(s) numéro(s) de téléphone réel(s)
    'text' => 'Mon premier test',       // Remplacez par le texte que vous souhaitez convertir en parole
    'lang' => 'fr',                     // Remplacez par le code de langue souhaité
    // 'speed' => '1',                  // Optionnel: Vitesse de la parole
    // 'notifyUrl' => 'http://...',     // Optionnel: URL de notification
    // 'scheduledDate' => 'YYYY-mm-dd H:i:00', // Optionnel: Date prévue pour l'envoi
];

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


