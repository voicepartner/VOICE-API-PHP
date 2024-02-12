<?php

// URL de l'API à laquelle effectuer la requête POST
$url = 'https://api.voicepartner.fr/v1/campaign/send';

// Les données à envoyer en JSON
$data = [
    'apiKey'            => 'YOUR_API_KEY', // Remplacez par votre clé API réelle
    'tokenAudio'        => 'TOKEN_AUDIO',  // Remplacez par le token audio réel
    'emailForNotification' => 'email@example.com', // Remplacez par l'email de notification souhaité
    'phoneNumbers'      => '06xxxxxxxx',   // Remplacez par le(s) numéro(s) de téléphone réel(s), séparés par des virgules si besoin
    // Ajoutez les autres paramètres optionnels si nécessaire
    // 'sender'         => 'VotreNuméro', // Optionnel
    // 'scheduledDate'  => 'YYYY-mm-dd H:i:s', // Optionnel
    // 'notifyUrl'      => 'https://your.notify.url', // Optionnel
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